<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Produk;
use App\Models\Transaksi;

class PaymentController extends Controller
{
    public function createInvoice(Request $request)
{
    $produk = Produk::find($request->produk_id);

    if (!$produk) {
        return response()->json(['message' => 'Produk tidak ditemukan'], 404);
    }

    $apiKey = config('services.xendit.key');

    $externalId = 'invoice-' . time();

    $response = Http::withBasicAuth($apiKey, '')
        ->post('https://api.xendit.co/v2/invoices', [
            'external_id' => $externalId,
            'amount' => $produk->harga,
            'payer_email' => $request->email,
            'description' => 'Pembayaran ' . $produk->nama_produk
        ]);

    $data = $response->json();

    Transaksi::create([
        'produk_id' => $produk->id,
        'invoice_id' => $externalId,
        'amount' => $produk->harga,
        'status' => $data['status']
    ]);

    return response()->json($data);
    }
    public function webhook(Request $request)
    {
        $data = $request->all();

        // 🔥 ambil ID dari berbagai kemungkinan
        $externalId = $data['external_id']
            ?? $data['data']['reference_id']
            ?? $data['id']
            ?? null;

        if (!$externalId) {
            return response()->json([
                'message' => 'ID tidak ditemukan',
                'data' => $data
            ], 400);
        }

        // 🔥 tentukan status
        if (isset($data['status'])) {
            $status = $data['status'];
        } elseif (isset($data['data']['status'])) {
            $status = $data['data']['status'];
        } else {
            // khusus FVA → anggap PAID
            $status = 'PAID';
        }

        $transaksi = \App\Models\Transaksi::where('invoice_id', $externalId)->first();

        if ($transaksi) {
            $transaksi->update([
                'status' => $status
            ]);
        }

        return response()->json([
            'message' => 'Webhook berhasil',
            'status' => $status
        ]);
    }
    public function createPayment(Request $request)
    {
        $produk = Produk::find($request->produk_id);

        if (!$produk) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        $apiKey = config('services.xendit.key');

        $referenceId = 'trx-' . time();

        $response = Http::withBasicAuth($apiKey, '')
        ->withHeaders([
            'API-Version' => '2024-11-11'
        ])
        ->post('https://api.xendit.co/v3/payment_requests', [
            "reference_id" => $referenceId,
            "currency" => "IDR",
            "amount" => $produk->harga,
            "country" => "ID",
            "type" => "PAY",
            "channel_code" => "ID_OVO",

            "channel_properties" => [
                "success_return_url" => "https://google.com/success",
                "failure_return_url" => "https://google.com/failure"
            ]
        ]);

        $data = $response->json();

        // 🔥 simpan ke DB
        Transaksi::create([
            'produk_id' => $produk->id,
            'invoice_id' => $referenceId,
            'amount' => $produk->harga,
            'status' => $data['status'] ?? 'PENDING'
        ]);

        return response()->json($data);
    }
        }