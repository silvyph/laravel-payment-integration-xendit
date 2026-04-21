<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index(Request $request)
{
    $query = Produk::query();

    // filter
    if ($request->nama_produk) {
        $query->where('nama_produk', 'like', '%' . $request->nama_produk . '%');
    }

    // 🔥 kondisi pagination
    if ($request->has('page')) {
        return response()->json($query->paginate(3));
    }

    // 🔥 default (tanpa pagination)
    return response()->json($query->get());
}

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'nama_bahan' => 'required',
            'harga' => 'required|numeric'
        ]);

        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'nama_bahan' => $request->nama_bahan,
            'harga' => $request->harga
        ]);

        return response()->json($produk, 201);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $request->validate([
            'nama_produk' => 'required',
            'nama_bahan' => 'required',
            'harga' => 'required|numeric'
        ]);

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'nama_bahan' => $request->nama_bahan,
            'harga' => $request->harga
        ]);

        return response()->json($produk);
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $produk->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
    public function show($id)
{
    $produk = Produk::find($id);

    if (!$produk) {
        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }

    return response()->json($produk);
}
}