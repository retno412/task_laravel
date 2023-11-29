<?php
// Nama : Jasmine Nayla Hafiezh
// NIM  : 2209681
// Kelas: 3A PSTI
// Tugas Rangkuman Pemrograman Internet

// Rangkuman Migration, Seeder dan MVC Laravel Framework 

// 1. Migration
// Migration adalah sebuah fitur dalam Laravel yang merupakan Version System untuk mengelola database dengan lebih mudah.
// Proses pembuatan migration dapat dilakukan menggunakan php artisan seperti yang biasa dilakukan. Php artisan berfungsi sebagai perintah atau kata kunci untuk mengeksekusi berbagai perintah Laravel melalui terminal.
// Selalu pastikan untuk mengonfigurasi database terlebih dahulu di dalam file. env.
// Lalu buatlah database dan atur parameter koneksi database di dalam file .env. Contohnya saya membuat sebuah database dengan nama "belajar-laravel-9" maka koneksi dan parameter di file .env adalah sebagai berikut
    // DB_CONNECTION=mysql
    // DB_HOST=127.0.0.1
    // DB_PORT=3306
    // DB_DATABASE=belajar-laravel-9
    // DB_USERNAME=root
    // DB_PASSWORD=

// Setelah itu kita bisa membuka terminal dan ketik perintah migration yaitu php artisan make:migration create_student_table (nama tabel bisa disesuaikan).
// Perintah php artisan make:migration create_student_table akan dieksekusi dan dijadikan tabel di database yang sudah dibuat tadi.


// 2. Seeder
// Seeder pada Laravel adalah sebuah fitur untuk mengisi data pada database dengan data dummy atau data testing.
// Seeder memiliki peran penting dalam menginisiasi data pada satu atau beberapa tabel ketika aplikasi diatur pertama kali. Selain itu, seeder dapat digunakan untuk memperbarui atau menghapus data yang telah ada secara tidak terlihat. 
// Tahapan untuk melakukan seeding:
// - Buat seeder baru dengan perintah php artisan make:seeder StudentSeeder (nama seeder menyesuaikan).
// - Buka file yang baru dibuat (StudentSeeder.php) dan gunakan method run() untuk menentukan data yang akan diisi ke dalam tabel.

        // namespace Database\Seeders;

        // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
        // use Illuminate\Database\Seeder;
        // use Illuminate\Support\Facades\DB;
        // use Faker\Factory as Faker;

        // class StudentSeeder extends Seeder
        // {
        //     /**
        //      * Run the database seeds.
        //      *
        //      * @return void
        //      */
        //     public function run()
        //     {
        //         $faker = Faker::create();
        //         //ketik masing-masing
        //         $data = [
        //             ['id' => 1, 'name' => 'Jasmine', 'score' => 80],
        //             ['id' => 2, 'name' => 'Nayla', 'score' => 85],
        //             ['id' => 3, 'name' => 'Hafiezh', 'score' => 90],
        //         ];

        //         for ($i = 4 ; $i <= 60; $i++) {
        //             $data[] = [
        //                 'id' => $i,
        //                 'name' => $faker->name,
        //                 'score' => $faker->numberBetween(60, 100),
        //             ];
        //         }
        //         DB::table('students')->insert($data);
        //     }
        // }

// Lalu ketikkan perintah php artisan db:seed --class=StudentSeeder untuk menjalankan seeder.
// Dan data di tabel student akan diperbarui sesuai dengan yang ada di file StudentSeeder.

// 3. MVC (Model, View, Controller)
// MVC adalah sebuah pendekatan perangkat lunak yang memisahkan aplikasi logika dari presentasi. MVC memisahkan aplikasi berdasarkan komponen-komponen aplikasi, seperti: manipulasi data, controller, dan user interface.
// 1.) Model
// Model mewakili struktur data aplikasi. Biasanya, model mencakup fungsi-fungsi yang mendukung pengelolaan basis data, seperti operasi penyisipan, pembaruan, dan fungsi-fungsi lainnya.
// Langkah-langkah membuat model:
// - Gunakan perintah php artisan make:model Student (model baru akan dibuat dalam direktori app)
//   Contoh model Student: 
        // namespace App\Models;

        // use Illuminate\Database\Eloquent\Factories\HasFactory;
        // use Illuminate\Database\Eloquent\Model;

        // class Student extends Model
        // {
        //     use HasFactory;
        // }

// 2.) Routing
// Routing adalah suatu mekanisme dalam pengembangan web yang menghubungkan URL dengan tindakan (action) yang harus diambil oleh aplikasi web.
// Langkah-langkah membuat routing:
// - Buka folder routers
// - Buka file web.php
// - Ketik apa yang akan diubah
//   Contoh: 
        // use Illuminate\Support\Facades\Route;
        // use App\Http\Controllers\StudentController;

        // Route::get('/', function () {
        //     return view('welcome');
        // });

        // Route::get('/greeting/{id}', [StudentController::class, 'show']);

// 3.) View
// View adalah komponen yang mengatur cara data ditampilkan kepada pengguna. Dapat berupa halaman web atau tampilan visual lainnya yang disajikan kepada pengguna.
// Contoh file example.blade.php:
        // <!DOCTYPE html>
        // <html lang="en">
        // <head>
        //     <meta charset="UTF-8">
        //     <meta name="viewport" content="width=device-width, initial-scale=1.0">
        //     <title>Document</title>
        // </head>
        // <body>
        //     <p>Hi, {{ $name }} !</p>
        // </body>
        // </html>

// 4.) Controller 
// Controller berfungsi sebagai penghubung antara model dan view. Controller bertanggung jawab untuk mengatur aliran data antara model dan tampilan, memfasilitasi interaksi antara komponen-komponen MVC.
// Langkah-langkah membuat controller:
// - Buka terminal dan ketikkan perintah php artisan make:controller StudentController (nama controller bisa disesuaikan).
// - Buka folder controllers dan buka file StudentController.php dan edit sesuai yang dibutuhkan, contoh:
        // namespace App\Http\Controllers;

        // use Illuminate\Http\Request;
        // use App\Models\Student;

        // class StudentController extends Controller
        // {
        //     //ketik masing-masing
        //     public function show($id){
        //         $name = Student::find($id)->name;
        //         return view('example', ['name' => $name]);
        //     }
        // }
        
// - Lalu sesuaikan file controller dan routers
// File web.php (routers):
        // use Illuminate\Support\Facades\Route;
        // use App\Http\Controllers\StudentController; 

        // Route::get('/', function () {
        //     return view('welcome');
        // });
        // Route::get('/greeting', function(){
        //     return 'Hello World By Jasmine';
        // })->id('greeting');
        // Route::get('/greeting/{name}', function($name){
        //     return view('example',['name' => $name]);
        // });
        // Route::get('/greeting/{id}', [StudentController::class, 'show']);

// - Buka terminal dan ketik perintah php artisan serve
// - Klik link yang muncul di terminal
?>