<?php

/**
 *  Nama: Diki Naufal
 *  NIM: 2209334
 *  Kelas: 3A PSTI
 *  Mata Kuliah: Pemrograman Internet
 *  -----------------------------------
 *  Rangkuman Laravel Framework
 * 
 *  Daftar Isi
 *  -----------
 *  1. Migration
 *  2. Seeder
 *  3. MVC (Model View Controller) 
*/

/**
 *  Migration
 *  ----------
 *  Pengertian
 *  Migration adalah proses yang memungkinkan pengembang untuk membangun dan mengelola 
 *  skema database secara terstruktur. Skema database mencakup tabel, column, index, dan
 *  ketergantungan lainnya yang diperlukan untuk menyimpan dan mengambil data. Dengan 
 *  migration, pengembang dapat mengelola evolusi struktural database seiring berjalannya
 *  waktu.
 * 
 *  Fungsi
 *  Fungsi utama dari Migration dalam Laravel adalah memudahkan pengembang dalam mengelola 
 *  perubahan skema database.
 *  
 *  Langkah-langkah 
 *  1. Buka Terminal
 *  2. Membuat file migrasi baru untuk tabel student: 'php artisan make:migration create_student_table'
 *     Laravel akan membuat file migrasi baru seperti '2023_11_27_000000_create_student_table.php' direktori database/migrations. 
 *  3. Jalankan dengan menggunakan: 'php artisan migrate'
 *  4. Jika ingin membatalkan migrasi terakhir gunakan: 'php artisan migrate:rollback'
 */

/**
 *  Seeder 
 *  -------
 *  Pengertian 
 *  Seeder digunakan untuk mengisi tabel database dengan data dummy. Dengan menggunakan seeder, Anda dapat dengan mudah mengisi database 
 *  kita dengan data untuk keperluan pengujian atau pengembangan.
 * 
 *  Fungsi
 *  Seeder dalam Laravel digunakan untuk mengisi basis data dengan data dummy atau awal. Fungsi utama dari Seeder adalah memfasilitasi pengembang 
 *  dalam mengembangkan dan menguji aplikasi dengan menyediakan data dasar yang diperlukan. 
 * 
 *  Langkah-langkah 
 *  1. Buka Terminal
 *  2. Lalu Buatlah file Seeder baru dengan nama "StudentSeeder" dengan menjalankan perintah: 'php artisan make:seeder StudentSeeder' 
 *  3. Jalankan Seeder menggunakan perintah: 'php artisan db:seed --class=StudentSeeder'
*/

/**
 *  MVC (Model View Control)
 *  -------------------------
 *  Pengertian
 *  MVC adalah pola desain arsitektur perangkat lunak yang membagi aplikasi menjadi tiga komponen utama: Model, View, dan Controller. Laravel mengikuti 
 *  pola ini untuk memisahkan logika bisnis, presentasi, dan pengelolaan input.
 *  
 *  Fungsi 
 *  1. Model 
 *  Bertanggung jawab untuk berinteraksi dengan database, melakukan operasi CRUD, dan mengelola data aplikasi
 * 
 *  2. View
 *  Menangani tampilan atau antarmuka pengguna, menampilkan data dari Model, dan menerima input dari pengguna
 * 
 *  3. Controller 
 *  Mengelola logika bisnis, menerima input dari pengguna melalui View, berinteraksi dengan model, dan menerima data ke view
 * 
 *  Langkah-langkah 
 *  1. Model
 *     Model baru: 'php artisan make:model nama_model'
 *      - Buka Terminal
 *      - Buatlah model baru dengan nama "Student" dengan menjalankan: 'php artisan make:model Student' Lalu dalam file bisa menuliskan kode sesuai kebutuhan, misal: 
 *      
 *          namespace App\Models;   
 *          use Illuminate\Database\Eloquent\Factories\HasFactory;
 *          use Illuminate\Database\Eloquent\Model;
 *          
 *          class Student extends Mode {
 *              use HasFactory;
 *          }
 *  
 *      - Gunakan routes pada web.php untuk menanggapi permintaan http tertentu dari pengguna. Contoh penulisannya:
 *          
 *          use Illuminate\Support\Facades\Route;
 *          use App\Http\Controllers\StudentController;
 * 
 *          Route::get('/', function () {
 *              return view('welcome')
 *          }
 *          
 *          Route::get('/greeting', function () {
 *              return 'Hello World';
 *          }
 * 
 *      - Jalankan server dengan menggunakan perintah: 'php artisan serve'  nantinya akan keluar respon 'Server running on[http://127.0.0.1:8000].
 *        dan dapat mengcopy URLnya/linknya, lalu paste di browser. Gunakan URL tersebut pada rutes seperti '/' dan '/greeting' setelah tulisan terakhir 
 *        pada URL. Contoh: 'http://127.0.0.1:8000/greeting' 
 * 
 *      - Untuk menghentikan server Menggunakan perintah: 'Ctrl+C'
 * 
 *  2. View
 *  Untuk Membuat file baru di views dengan menggunakan ekstensi: '.blade.php'
 *      - Buatlah file baru dengan nama "StudentController" dengan menjalankan perintah: 'php artisan make:controller StudentController' Lalu di dalam file 
 *      - Bisa menuliskan kode sesuai kebutuhan kita, misal:
 *          
 *          namespace App\Http\Controllers;
 *          
 *          use Illuminate\Http\Request;
 *          use App\Models\Student;
 * 
 *          class StudentController extends Controller {
 *              public function show($id) {
 *                  $name = Student::find($id)->name;
 *                  return view('example', ['name'=> $name]);
 *              }
 *          }
 * 
 *      - Bukalah 'example.blade.php' pada views Lalu di dalam file tersebut kita bisa menuliskan kode sesuai kebutuhan, misalkan:
 * 
 *          <!DOCTYPE html>
 *          <html lang="en">
 *              <head>
 *                  <meta charset="UTF-8">
 *                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 *                  <title>Document</title>
 *              </head>
 *              <body>
 *                  <p>Hello World</p>
 *                  <p>Hi, {{ $name }} !</p>
 *              </body>
 *          </html>
 * 
 *      - Gunakan routes pada web.php untuk merespons permintaan http tertentu dari pengguna. Contoh: 
 *          
 *          use Illuminate\Support\Facades\Route;
 *          use App\Http\Controllers\StudentController;
 *          Route::get('/greeting/{id}', [StudentController::class, 'show']);
 * 
 *      - Jalankan server dengan menggunakan perintah: 'php artisan serve' lalu nanti pada terminal akan keluar respon 
 *        'Server running on [http://127.0.0.1:8000]. dan Kita dapat mengcopy URL/linknya, lalu paste di browser. 
 *        Gunakan URL pada routes seperti '/' dan '/greeting' setelah tulisan terakhir pada URL. 
 *        Contoh: 'http://127.0.0.1:8000/greeting{1}' 
 *      - Untuk menghentikan server gunakan perintah: 'Ctrl+C'
 *
 */  