<?php

// Nama : Amira
// NIM : 2202598
// Kelas : 3A PSTI

// RANGKUMAN MIGRATION, SEEDER DAN MVC 

// 1. Migration
// Migration dalam Laravel adalah sebuah fungsi yang memungkinkan kita mengontrol struktur database menggunakan kode PHP, sehingga kita tidak perlu bergantung pada skrip SQL. Dengan menggunakan migration, kita dapat dengan cepat membuat, mengubah, atau menghapus tabel dan kolom dalam database.    
// Contoh kode migration:
// - kode membuat tabel
// // Contoh migrasi untuk membuat tabel 'users'
// php artisan make:migration create_users_table
// // Isi dalam file migrasi
// public function up()
// {
//     Schema::create('users', function (Blueprint $table) {
//         $table->id();
//         $table->string('name');
//         $table->string('email')->unique();
//         $table->timestamps();
//     });
// }
// - kode mengubah tabel
// // Contoh migrasi untuk menambahkan kolom 'phone' ke tabel 'users'
// php artisan make:migration add_phone_to_users --table=users
// // Isi dalam file migrasi
// public function up()
// {
//     Schema::table('users', function (Blueprint $table) {
//         $table->string('phone')->after('email');
//     });
// }
// - kode menghapus tabel atau kolom
// // Contoh migrasi untuk menghapus kolom 'phone' dari tabel 'users'
// php artisan make:migration remove_phone_from_users --table=users
// // Isi dalam file migrasi
// public function up()
// {
//     Schema::table('users', function (Blueprint $table) {
//         $table->dropColumn('phone');
//     });
// }

// Setelah menentukan struktur dalam file migrasi, kita dapat menjalankan migrasi menggunakan perintah migrate untuk menerapkan perubahan tersebut ke database:
// kode migrate: php artisan migrate


// 2. Seeder
// Seeder pada Laravel memungkinkan kita untuk memasukkan data awal yang telah ditentukan ke dalam database dengan mudah dan cepat. Fitur ini sangat berguna untuk pengembangan, uji coba, dan pemeliharaan aplikasi.
// Berikut adalah contoh penggunaan seeder pada Laravel: 
// - Membuat Seeder:
// Untuk membuat seeder baru, kita dapat menggunakan perintah 'make:seeder'. Kodenya: php artisan make:seeder UsersTableSeeder
// Setelah itu, buka file seeder yang dihasilkan (biasanya berada di direktori 'database/seeders/') dan tentukan data yang akan dimasukkan.
// kodenya: 
// // Isi dalam file seeder
// public function run()
// {
//     DB::table('users')->insert([
//         'name' => 'John Doe',
//         'email' => 'john@example.com',
//         'password' => bcrypt('secret'),
//     ]);
// }
// - Menjalankan Seeder
// Untuk memasukkan data ke dalam database menggunakan seeder, kita dapat menggunakan perintah 'db:seed'. Kodenya: php artisan db:seed --class=UsersTableSeeder
// Atau untuk menjalankan semua seeder yang ada, Kodenya: php artisan db:seed
 
// Seeder ini sangat berguna ketika kita ingin memiliki data awal untuk tabel pengguna (users dalam contoh ini) sehingga kita dapat menguji fungsionalitas aplikasi dengan dataset yang telah ditentukan.
// Dengan menggunakan seeder, kita dapat membuat data awal untuk tabel-tabel dalam database dengan mudah, memberikan kepraktisan dalam mengelola data uji dan mengisi database dengan data sampel.

// 3. MVC
// Model View Controller atau MVC adalah sebuah pola arsitektur dalam membuat sebuah aplikasi dengan cara memisahkan kode menjadi tiga bagian yang terdiri dari:
// - Model
// Bagian yang bertugas untuk menyiapkan, mengatur, memanipulasi, dan mengorganisasikan data yang ada di database.
// - View
// Bagian yang bertugas untuk menampilkan informasi dalam bentuk Graphical User Interface (GUI).
// - Controller 
// Bagian yang bertugas untuk menghubungkan serta mengatur model dan view agar dapat saling terhubung.

// Contoh sederhana penggunaan MVC dalam konteks web development menggunakan PHP dan Laravel:
// - Model
// // Contoh Model untuk tabel 'users'
// class User extends Model {
//     // Definisi aturan bisnis dan relasi
// }
// - View
// <!-- Contoh View untuk menampilkan daftar pengguna -->
// <ul>
//     @foreach ($users as $user)
//         <li>{{ $user->name }}</li>
//     @endforeach
// </ul>
// - Controller
// // Contoh Controller untuk mengelola pengguna
// class UserController extends Controller {
//     public function index() {
//         $users = User::all();
//         return view('users.index', ['users' => $users]);
//     }
// }

// Dalam contoh ini, Model ('User') bertanggung jawab untuk mengelola data pengguna. View menampilkan daftar pengguna, dan Controller ('UserController') mengelola interaksi pengguna, mengambil data dari Model, dan memperbarui tampilan. Hal ini menciptakan pemisahan tanggung jawab yang jelas antara tiga komponen, memudahkan pemeliharaan dan pengembangan aplikasi.
