<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
=======
# laravel-payment-integration-xendit
REST API built with Laravel for handling payment transactions integrated with Xendit payment gateway.
# Laravel Xendit Payment API

## 📌 Overview

This project is a backend RESTful API built using Laravel that integrates with the Xendit payment gateway to handle online payment transactions.

It demonstrates a complete end-to-end payment processing system, including invoice creation, payment handling, and webhook-based status updates.

---
**🔄 Payment Flow**

Client sends request to create payment invoice
Backend generates invoice via Xendit API
User completes payment through Xendit
Xendit sends webhook callback to backend
Backend updates transaction status in database

---
**🚀 Features**
Create payment invoices via Xendit API
Handle payment callbacks (webhooks)
Store and manage transaction data
RESTful API architecture
Request validation and error handling

---
**💡 Key Highlights**
Integration with third-party payment gateway (Xendit)
Implementation of webhook for real-time payment updates
End-to-end payment workflow
Clean and structured Laravel backend architecture

---
**🛠️ Tech Stack**
Backend: Laravel
Database: MySQL
API Integration: Xendit Payment Gateway
Tools: Postman, Composer

---
**📂 Project Structure**
app/Http/Controllers/Api → API Controllers
app/Models → Database Models
routes/api.php → API Routes
database/migrations → Database schema

---
**⚙️ Installation & Setup**
1. Clone repository
git clone https://github.com/USERNAME/laravel-xendit-payment-api.git
2.  Install dependencies
composer install
3. Copy environment file
cp .env.example .env
4. Generate application key
php artisan key:generate
5. Configure database in .env
6. Run migration
php artisan migrate
7. Run server
php artisan serve

---
**🔐 Environment Variables**

Make sure to configure:

DB_DATABASE
DB_USERNAME
DB_PASSWORD
XENDIT_API_KEY

---
## 🔄 API Endpoints

### 🔹 Create Invoice
POST /api/create-invoice  
Generate payment invoice using Xendit API.

### 🔹 Webhook Callback
POST /api/webhook/xendit  
Handle payment status updates from Xendit.

### 🔹 Get Produk
GET /api/produk  
Retrieve product data from database.

### 🔹 Create Produk
POST /api/produk  
Create new product data.

---
## 📸 API Preview

### 🔹 Webhook Handling (Xendit)
Handles payment status updates from Xendit.
![Webhook](docs/webhook-xendit.png)

---

### 🔹 Get Produk (List Data)
Retrieve all product data from database.
![Get Produk](docs/get-produk.png)

---

### 🔹 Create Produk
Create new product data.
![Create Produk](docs/create-produk.png)
**Example Request**
```json
{
  "nama_produk": "Kemeja_9",
  "nama_bahan": "Oberon",
  "harga": 14750
}


## 👩‍💻 Author

Silvy Putri
