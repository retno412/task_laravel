<?php
/**
 * Catatan Laravel Framework
 * Nama : Salsabila Aulia Choirunisa
 * Kelas : 3B PSTI
 * NIM : 2207022


 * 1. Migration
 
 * - Membuat migrasi baru: `php artisan make:migration create_example_table`
 * - Menjalankan migrasi: `php artisan migrate`
 * - Membatalkan migrasi terakhir: `php artisan migrate:rollback` 
 * Langkah-Langkah:
 * 1. Buka terminal
 * 2. Buat file migrasi baru untuk tabel student: 'php artisan make:migration create_student_table'
 *    Laravel akan membuat file migrasi baru seperti'2023_11_27_000000_create_student_table.php' di direktori database/migrations. 
 * 3. Lalu ketik: 'php artisan migrate' untuk menjalankan

 * 2. Seeder
 
 * - Membuat seeder baru: `php artisan make:seeder ExampleTableSeeder`
 * - Menjalankan seeder: `php artisan db:seed --class=ExampleTableSeeder`
 * Langkah-Langkah: 
 * 1. Buka terminal
 * 2. Buat file Seeder baru dengan nama "StudentSeeder" 
 *    dengan menjalankan perintah: 'php artisan make:seeder StudentSeeder' 
 * 3. ketik : 'php artisan db:seed --class=StudentSeeder' untuk menjalankan seeder
 */
/*
 * 3. MVC (Model-View-Controller)
 *   Membuat controller baru: `php artisan make:controller ExampleController`
 *   Mendefinisikan rute di web.php untuk menghubungkan controller dengan view.(Controller disimpan di direktori app/Http/Controllers.)
 * 
 * 1) Database
 * -----------
 * Membuat koneksi database yang menghubungkan ke localhost difile .env: 
 */
DB_CONNECTION = mysql
DB_HOST = 127.0.0.1
DB_PORT=3307
DB_DATABASE=belajar-laravel
DB_USERNAME=root
DB_PASSWORD=

 /* membuat database migration dengan mengetik: 'php artisan make:migration create_student_table'
 * kemudian membuat database seeding dengan menjalankan perintah: 'php artisan make:seeder StudentSeeder'
 
 * 2) Model
 * Membuat model baru: 'php artisan make:model nama_model'
 *
 * Langkah-Langkah:
 * 1. Buka terminal
 * 2. Buat model baru dengan nama "Student"
 *    dengan menjalankan perintah: 'php artisan make:model Student'
 *    Lalu dalam file bisa menuliskan kode sesuai kebutuhan, misal:
 */   namespace App\Models;

      use Illuminate\Database\Eloquent\Factories\HasFactory;
      use Illuminate\Database\Eloquent\Model;

      class Student extends Model
      {
       use HasFactory;}
/*
 *  3. Gunakan routes pada web.php untuk menanggapi permintaan HTTP tertentu dari pengguna.
 *    Contoh penulisan: 
 */
      use Illuminate\Support\Facades\Route;
      use App\Http\Controllers\StudentController;
      Route::get('/', function () {
      return view('welcome');
      });
      Route::get('/greeting', function () {
      return 'Hello World';
      });  
 /** 
 * 4. Jalankan server dengan perintah: 'php artisan serve'
 *    lalu akan muncul'Server running on[http://127.0.0.1:8000].
 *    lalu paste di browser.
 *    Gunakan URL pada rutes seperti '/' dan '/greeting' setelah tulisan terakhir pada URL.
 *    Contoh: 'http://127.0.0.1:8000/greeting' 
 * 5. Untuk menghentikan server gunakan perintah: 'Ctrl+C'
 *    Catatan:
 *    - Ketika pengguna mengakses URL '/', server akan merespons dengan mengirimkan teks 'welcome' sebagai halaman web.
 *    - ketika pengguna mengakses URL '/greeting', server akan merespons dengan mengirimkan teks "Hello World" sebagai halaman web.
 * 
 * 
 * 3) Views
 * - Membuat file baru di views dengan menggunakan ekstensi: '.blade.php'
 * 
 * - Menggunakan Blade Templates
 * 
 * Langkah-Langkah
 * 1. Buat file baru dengan nama "example"
 *    dengan menuliskan: 'example.blade.php'
 *    Lalu ketikan kode
 */    
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="with=evice-with, initial-scale=1.0">
      <title>Document</title>
</head>
<body>
      <p>Hello World</p>
</body>
</html>
 /** 
 * 2. Gunakan routes pada web.php untuk menanggapi permintaan HTTP tertentu dari pengguna.
 *    Contoh penulisan: 
 */                  
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\StudentController;
    Route::get('/greeting', function () {
         return view('example');
    });
 /** 
 * 3. ketika pengguna mengakses URL '/greeting', server akan merespons dengan mengirimkan teks "Hello World" sebagai halaman web.
 *         
 * 
 * 4) Controllers
 * - Membuat file baru: 'php artisan make:controller nama_file'
 *   
 * Langkah-Langkah:
 * 1. buka terminal
 * 2. Buat file baru dengan nama "StudentController"
 *    dengan menjalankan perintah: 'php artisan make:controller StudentController'
 *    Lalu dalam file bisa menuliskan kode sesuai kebutuhan, misal:
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
     //ktik masing masing
    public function show($id){
    $name = Student::find($id)->name;
    return view('example', ['name'=> $name]);}
    }
 /** 
 * 3. Buka 'example.blade.php' di views
 *    Lalu dalam file tersebut kita bisa menuliskan kode sesuai kebutuhan, misal:
 */                                                                             
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <p>Hello World</p> -->
    <p>Hi, {{ $name }} !</p>
</body>
</html>
 // Catatan: Di atas, kita menggunakan variabel Blade {{ $name }} untuk menyisipkan nilai variabel ke dalam HTML.
 /** 
 * 4. Gunakan routes pada web.php untuk menanggapi permintaan HTTP tertentu dari pengguna.
 *    Comtoh penulisan: 
 */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
Route::get('/greeting/{id}', [StudentController::class, 'show']);
/** 
 * 5. Jalankan server dengan perintah: 'php artisan serve'
 *    lalu akan keluar respon 'Server running on [http://127.0.0.1:8000].
 *    Kita dapat menyalin URLnya, lalu paste di browser.
 *    Gunakan URL pada rutes seperti '/' dan '/greeting' setelah tulisan terakhir pada URL.
 *    Contoh: 'http://127.0.0.1:8000/greeting{1}' 
 *    - ketika pengguna mengakses URL '/greeting{id}', server akan merespons dengan mengirimkan teks "Hi, Caca!" sebagai halaman web.
 *      Nama yang muncul sesuai id yang kita masukkan dan server akan mengakses id yg menghubungkan nama di database yang nantinya akan memunculkan nama seperti "ACaca" seperti contoh diatas.              
 */ 
?>
