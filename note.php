<?php
/**
 * Catatan coding Laravel
 * Astuti Solihatunnisa
 * =====================
 * Berisi catatan mengenai Migrasi, Seeder, dan MVC (Model-View-Controller).
 *

 * 1. Migration
 * -------------
 * Migration  migrasi adalah cara untuk mendefinisikan dan menerapkan perubahan skema database dengan cara yang terkendali dan terstruktur
 *
 * Contoh:
 * - Membuat migrasi baru: `php artisan make:migration create_example_table`
 * - Untuk menjalankan migrasi: `php artisan migrate`
 *
 * Langkah-Langkah:
 * 1. Open terminal
 * 2. Buat file migrasi baru untuk tabel student dengan: 'php artisan make:migration create_student_table'
 *    Laravel akan membuat file migrasi baru: 
 *    '2023_11_27_000000_create_student_table.php' di direktori database/migrations. 
 * 3. Untuk menjalankan gunakan perintah: 'php artisan migrate'
 */

/**
 * 2. Seeder
 * ----------
 * Seeder sering digunakan bersama dengan fitur Database Seeder. 
 * Seeder dapat digunakan untuk membuat sample data atau dummy data dengan command yang sederhana.
 *
 * Contoh:
 * - Untuk membuat seeder baru: `php artisan make:seeder ExampleTableSeeder`
 * - Untuk menjalankan seeder: `php artisan db:seed --class=ExampleTableSeeder`
 * 
 * Langkah-Langkah: 
 * 1. Open terminal
 * 2. Buat file Seeder baru dengan nama "StudentSeeder" 
 *    dengan perintah: 'php artisan make:seeder StudentSeeder' 
 * 3. Jalankan Seeder menggunakan perintah: 'php artisan db:seed --class=StudentSeeder'
 */

/**
 * 3. MVC (Model-View-Controller)
 * ------------------------------
 * MVC adalah pendekatan pengembangan perangkat lunak yang memisahkan komponen-komponen utama aplikasi, yaitu Model, View, dan Controller. 
 * Model bertanggung jawab atas struktur data dan operasi basis data. 
 * View menangani tampilan yang disajikan kepada pengguna, seperti halaman web. 
 * Controller berperan sebagai perantara antara Model dan View, mengatur alur logika aplikasi. 
 * Dengan memisahkan fungsi-fungsi ini, MVC memungkinkan pengembang untuk lebih mudah mengelola dan memodifikasi bagian-bagian tertentu tanpa memengaruhi yang lain.
 * 
 * Contoh:
 *   Membuat controller baru: `php artisan make:controller ExampleController`
 * 
 * 1) Model
 * ---------
 * Membuat model baru: 'php artisan make:model nama_model'
 *
 * Langkah-Langkah:
 * 1. Open terminal
 * 2. Buat model baru dengan nama "Student"
 *    dengan perintah: 'php artisan make:model Student
 *    Lalu dalam file menuliskan kode sesuai kebutuhan, seperti:
 */                                                    
    // namespace App\Models;
    // use Illuminate\Database\Eloquent\Factories\HasFactory;
    // use Illuminate\Database\Eloquent\Model;

    // class Student extends Model
    //     {
    //         use HasFactory;
    //     }                                               
 /**
 *  3. Gunakan routes pada web.php untuk menanggapi permintaan Http dari pengguna.
 *    Contoh:
 */
        // use Illuminate\Support\Facades\Route;
        // use App\Http\Controllers\StudentController;
        // Route::get('/', function () {
        //     return view('welcome');
        // });
        // Route::get('/greeting', function () {
        //     return 'Hello World';
        // });
 /** 
 * 4. Jalankan server dengan perintah: 'php artisan serve'
 *    lalu keluar respon 'Server running on[http://127.0.0.1:8000].
 *    Pengguna dapat menyalin URL, lalu paste di browser.
 *    Gunakan URL pada rutes seperti '/' dan '/greeting' setelah tulisan terakhir URL.
 *    Contoh: 'http://127.0.0.1:8000/greeting' 
 * 5. Untuk menghentikan server gunakan perintah: 'Ctrl+C'
 * 
 * 2) Views
 * ---------
 * - Membuat file baru di views dengan menggunakan ekstensi: '.blade.php'
 * - Gunakan Blade Templates
 * 
 * Langkah-Langkah
 * 1. Buat file baru dengan nama "example"
 *    contoh penamaan: 'example.blade.php'
 *    Lalu dalam file menuliskan kode sesuai kebutuhan, seperti:
 */                                                     
    // <!DOCTYPE html>
    // <html lang="en">
    // <head>
    // <meta charset="UTF-8">
    // <meta name="viewport" content="with=evice-with, initial-scale=1.0">
    //     <title>Document</title>
    // </head>
    // <body>
    //     <p>Hello World</p>
    // </body>
    // </html>
 /** 
 * 2. Gunakan routes pada web.php untuk permintaan Http dari pengguna.
 *    Contoh: 
 */                  
        // use Illuminate\Support\Facades\Route;
        // use App\Http\Controllers\StudentController;
        // Route::get('/greeting', function () {
        //     return view('example');
        // });
 /** 
 * 3. Karena sebelumnya sudah menjalankan perintah: 'php artisan serve' untuk menjalankan server, 
 *    tidak perlu mengulangi lagi jika tidak menghentikan server sebelumnya. Jika sebelumnya dihentikan maka 
 *    perlu menjalankan ulang server dengan perintah tersebut. 
 *    Jadi, buka browser yang tadi telah digunakan lalu tambahkan URL pada routes diakhir URL server.
 *    Ketika mengakses URL '/greeting', server akan merespon dengan mengirimkan teks "Hello World" sebagai halaman web.    
 * 
 * 3) Controllers
 * --------------
 * - Membuat file baru: 'php artisan make:controller nama_file'
 *   
 * Langkah-Langkah:
 * 1. Open terminal
 * 2. Buat file baru dengan nama "StudentController"
 *    dengan perintah: 'php artisan make:controller StudentController'
 *    Lalu dalam file menuliskan kode sesuai kebutuhan, seperti:
 */
    // namespace App\Http\Controllers;
    // use Illuminate\Http\Request;
    // use App\Models\Student;
    // class StudentController extends Controller
    // {
    //     public function show($id){
    //     $name = Student::find($id)->name;
    //     return view('example', ['name'=> $name]);
    //     }
    // }
 /** 
 * 3. Buka 'example.blade.php' di views
 *    Lalu dalam file menuliskan kode sesuai kebutuhan, seperti:
 */
    // <!DOCTYPE html>
    // <html lang="en">
    // <head>
    // <meta charset="UTF-8">
    // <meta name="viewport" content="width=device-width, initial-scale=1.0">
    //     <title>Document</title>
    // </head>
    // <body>
    //     <p>Hi, {{ $name }} !</p>
    // </body>
    // </html>
 // Catatan: Di atas, menggunakan variabel Blade {{ $name }} untuk menyisipkan nilai variabel ke dalam HTML.
 /** 
 * 4. Gunakan routes pada web.php untuk menanggapi permintaan HTTP tertentu dari pengguna.
 *    Contoh penulisan: 
 */
        // use Illuminate\Support\Facades\Route;
        // use App\Http\Controllers\StudentController;
        // Route::get('/greeting/{id}', [StudentController::class, 'show']);
 /** 
 * 5. Jalankan server dengan perintah: 'php artisan serve'
 *    lalu akan merespon dengan 'Server running on [http://127.0.0.1:8000].
 *    Pengguna dapat menyalin URLnya, lalu paste di browser.
 *    Gunakan URL pada rutes seperti '/' dan '/greeting' setelah tulisan terakhir pada URL.
 *    Contoh: 'http://127.0.0.1:8000/greeting{1}' 
 * 6. Untuk menghentikan server menggunakan perintah: 'Ctrl+C'
 *    Catatan:
 *    - Saat pengguna mengakses URL '/greeting{id}', server akan merespon dengan mengirimkan teks "Hi, Astuti!" atau nama-nama yang sudah tersimpan di database. 
 *      Nama yang muncul sesuai id yang dibuat pada database dimasukkan dan server akan mengakses id yg menghubungkan nama di database yang nantinya akan memunculkan nama "Astuti" seperti contoh diatas.          
 */ 
?>
