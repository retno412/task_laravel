<?php

/**
 * Nama: Sri Rahayu
 * NIM: 2204184
 * Kelas: 3B PSTI
 * Mata Kuliah: Pemograman Internet
 * 
 * Rangkuman tentang Migration, Seeder, dan MVC.
 * 
 * 1. Migration
 * Migration merupakan proses mengelola perubahan struktur atau skema database.
 * Dengan migration kita dapat membuat, memodifikasi, atau menghapus tabel, kolom atau indeks dalam sebuah database.
 * 
 * Langkah-langkah:
 * 1.) Open terminal
 * 2.) Buat file migrasi baru untuk tabel teacher: 'php artisan make:migration create_teacher_table'
 *     Laravel akan membuat file migrasi baru seperti '2023_11_29_000000_create_teacher_table.php' di direktori database/migrations.
 * 3.) Jalankan dengan menggunakan: 'php artisan migrate'
 * 4.) Jika ingin membatalkan migrasi terakhir gunakan: 'php artisan:rollback'
 * 
 * 
 * 2. Seeder
 * Seeder dogunakan untuk mengisi database dengan data awal atau data dummy yang diperlukan untuk pengembangan atau testing.
 * Seeder memungkinkan pengisian data secara otomatis ke dalam tabel-tabel tertentu di dalam database, sehingga memudahkan dalam melakukan pengujian atau pengembangan sistem.
 * 
 * Langkah-langkah:
 * 1.) Open terminal
 * 2.) Buatlah Seeder baru: 'php artisan make:seeder NamaSeeder'
 * 3.) Tentukan data yang ingin di-generate atau diisi.
 *     Contoh: 
 *     $data = [
 *     ['id' => 1, 'nama', => 'sri', 'score' => 88]
 *     ['id' => 2, 'name' => 'rahayu', 'score' => 89],
 *     ['id' => 3, 'name' => 'irs', 'score' => 90],
 * ];
 *          DB::table('teachers')->insert($data);
 * 
 * 4.) Jalankan seeder: 'php artisan db:seed --class=NamaSeeder'
 * 
 *
 * 3. MVC (Model-View-Controller)
 * MVC adalah pola desain yang terdiri dari tiga komponen utama: Mode;, View, dan Controller.
 * Pola desain ini digunakan untuk memisahkan logika bisnis dari tampilan pengguna dan cara pengguna berinteraksi dengan sistem.
 * 
 * a.) Model: Merepresentasikan data atau logika. Ini bertanggung jawab untuk mengelola data, mengakses atau memanipulasi database, dan melakukan validasi. Biasanya terdapat di dalam direktori app/Models. 
 *     Langkah-langkah:
 *     1.) Open terminal pada 'app\Http\Models'.
 *     2.) Buat Model Baru: bash php artisan make:model NamaModel.
 *     3.) Tentukan kode yang akan di-generete atau diperlukan.
 *     Contoh: 
 *     namespace App\Models;
 *         use Illuminate\Database\Eloquent\Factories\HasFactory;
 *         use Illuminate\Database\Eloquent\Model;
 *             class Student extends Model
 *             {
 *                use HasFactory;
 *             }
 * 
 *      4.) Gunakan routes pada web.php untuk menanggapi permintaan http tertentu dari pengguna.
 *      Contoh:
 *      use Illuminate\Support\Facades\Route; 
 *      use App\Http\Controllers\StudentController;
 *            Route::get('/', function () {
 *              return view('welcome');
 *            });
 *            Route::get('/greeting', function () {
 *              return 'Hi! Hello!';
 *            });
 * 
 *     5.) Jalankan server dengan menggunakan perintah: 'php artisan serve'
 *     6.) Hentikan server menggunakan perintah:'Ctrl+c'
 *  
 * b.) View: Mengatur tampilan atau antarmuka pengguna yang digunakan untuk menampilkan data atau informasi kepada pengguna. Terletak di dalam direktori resources/views.
 *     Langkah-langkah:
 *     1.) Buat View Baru: Buat file .blade.php di dalam direktori resources/views.
 *     2.) Edit View: Gunakan Blade, templating engine Laravel, untuk menyusun tampilan. Tambahkan HTML, CSS, dan elemen-elemen tampilan.
 *     Contoh:
 *     <html>
 *     <head>
 *          <title>Contoh View</title>
 *     </head>
 *     <body>
 *          <h1>Contoh Data</h1>
 *          @foreach($data as $item)
 *          <p>{{ $item->name }}</p>
 *          @endforeach
 *     </body>
 *     </html>
 * 
 *     3.) Buka direktori routes\web.php, gunakan routes untuk menanggapi permintaan HTTP dari pengguna.
 *     Contoh:
 *     use Illuminate\Support\Facades\Route;
 *     use App\Http\Controllers\StudentController;
 *     Route::get('/greeting', function () {
 *     return view('example');
 * 
 *     4.) Jika tidak menghentikan server sebelumnya, hanya perlu kembali ke browser. Jika sempat dihentikan, ketik perintah 'php artisan serve' untuk mendapatkan URL nya.
 * 
 * c.) Controller: Bertindak sebagai penghubung antara Model dan View. Menerima input dari pengguna, memprosesnya menggunakan Model, dan kemudian memperbarui tampilan (View) sesuai dengan hasil proses. Terletak di dalam direktori app/Http/Controllers.
 *     Langkah-langkah:
 *     1.) Open terminal
 *     2.) Buat Controller Baru: bash php artisan make:controller NamaController.
 *     3.) Tambahkan fungsi-fungsi (metode) yang akan menangani logika aplikasi.
 *     Contoh:
 *     namespace App\Http\Controllers;
 *     use Illuminate\Http\Request;
 *     use App\Models\Example;
 *     class ExampleController extends Controller
 *         {
 *           public function index()
 *          {
 *         $data = Example::all();
 *          return view('example.index', ['data' => $data]);
 *           }
 *          }
 * 
 *    4.) Buka direktrori routes\web.php, lalu masukkan kode seperti:
 *        'use Illuminate\Support\Facades\Route;
 *         use App\Http\Controllers\StudentController
 *         Route::get('/greeting/{id}', [StudentController::class, 'show']);'
 * 
 *    5.) Jalankan server dengan perintah 'php artisan serve', lalu copy URL dan paste pada browser.
 * 
 * 
 */