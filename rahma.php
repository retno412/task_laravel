<?php

// NIM   : 2209744
// Nama  : Rahma Maulida 
// Kelas : 3A PSTI
// _______________________________________________________________

// Catatan mengenai Migration, Seeder dan MVC Laravel Framework

// 1. MIGRATION

//      Definisi:
//  Migration adalah sebuah fitur pada laravel, 
// migration yaitu Control Version System untuk database, dengan menggunakan migration laravel dapat memudahkan kita untuk mengelola data base dan membuat table data 
// Setiap Migration pada Laravel disimpan pada direktori database/migrations. 

//      Migration biasanya memiliki dua method utama, yaitu:
// 1 Method up digunakan untuk mendefinisikan perubahan yang akan dilakukan pada skema database. 
// 2 Method down digunakan untuk mendefinisikan pembatalan perubahan yang akan dilakukan pada skema database
//      Contoh :  
    // public function up(): void
    // {
    //     Schema::create('students', function (Blueprint $table) {
    //         $table->id(); 
    //         $table->string('name'); 
    //         $table->integer('score');
    //         $table->timestamps();

    //     });
    // }

    // public function down()
    // {
    //     Schema::dropIfExists('students');
    // }

//      contoh perintah migration pada terminal :
// Membuat migrasi baru: `php artisan make:migration create_example_table`
// Menjalankan migrasi: `php artisan migrate`
// Membatalkan migrasi terakhir: `php artisan migrate:rollback`

//      Langkah - Langkah :
//     1. Buka terminal
//     2. Buat file migrasi baru untuk tabel student: 'php artisan make:migration create_student_table'
//     file tersebut disimpan di direktori database/migrations. 
//     3. Jalankan dengan menggunakan perintah pada terminal: 'php artisan migrate'
//     4. Jika ingin membatalkan migrasi terakhir gunakan: 'php artisan migrate:rollback'

//      fungsi migration :
// untuk memastikan bahwa semua data yang terkait dengan table yang akan dibuat tidak hilang, 
// maka dapat dilakukan dengan cara membuat migration


// 2. SEEDER

//      Definisi:
// Seeder dalam Laravel adalah komponen yang memungkinkan kita untuk mengisi basis data dengan data secara otomatis. 
// Seeder biasanya digunakan untuk mengisi data awal seperti daftar negara, jenis kelamin, status pengguna, 
// atau data lain yang diperlukan dalam aplikasi. 
// Dengan menggunakan seeder, dapat mengefesienkan waktu dan menghindari berisiko kesalahan.

// contoh code pada seeder:
    // public function run()
    //     {
    //         $data = [
    //             ['id' => 1, 'name' => 'Rahma', 'score' => 88],
    //             ['id' => 2, 'name' => 'Maulida', 'score' => 95],
    //             ['id' => 3, 'name' => 'Dilan', 'score' => 90],
    //         ];
           
    //         DB::table('students')->insert($data);
    //     }

//      Fungsi:
// Seeder digunakan untuk memberikan data ke database, 
// contohnya jika ingin menyiapkan data ke database maka bisa dengan cara membuat seeder

//      Langkah-langkah umum menggunakan seeder dalam Laravel:
// 1. Membuat Seeder: Gunakan perintah "php artisan make:seeder SeederName" untuk membuat seeder baru. 
//    Seeder baru akan dihasilkan di direktori database/seeders.
// 2. Mengisi Data: Buka file seeder yang baru saja dibuat dan gunakan metode run() untuk menulis logika pengisian data. 
//    Dapat menggunakan model Eloquent untuk membuat dan menyimpan data baru.
// 3. Menjalankan Seeder: Gunakan perintah php artisan db:seed --class=SeederName untuk menjalankan seeder yang telah dibuat. 
//    Jika Anda ingin menjalankan semua seeder, gunakan perintah php artisan db:seed.
// 4. Rollback Seeder: Jika Anda perlu menghapus data yang telah diisi oleh seeder,  
// dapat menggunakan perintah php artisan migrate:refresh --seed untuk menggulirkan kembali semua migrasi dan menjalankan kembali seeder.



// 3. MVC (Model-View-Controller)

//      Definisi:
// Model-View-Controller (MVC) merupakan suatu paradigma pengembangan perangkat lunak yang bertujuan untuk menyisihkan logika aplikasi dari aspek presentasinya.
// Dalam kerangka MVC, aplikasi dibedakan berdasarkan komponen-komponennya, termasuk manipulasi data, pengontrolan, dan antarmuka pengguna.


//      Fungsi MVC (Model-View-Controller)
// Model digunakan untuk melakukan query pada database, controller digunakan untuk mengatur 
// data yang masuk ke view, view digunakan untuk menampilkan hasil dari model dan controller

//      Langkah - langkah:
//     1. Model
//         model baru: 'php artisan make:model nama_model'
//         1. Bukalah terminal
//         2. Ketikkan perintah di terminal : 'php artisan make:model NamaModel' untuk membuat file baru
//         Lalu dalam file bisa menuliskan kode sesuai kebutuhan, contoh:

//                     namespace App\Models;

//                     use Illuminate\Database\Eloquent\Factories\HasFactory;
//                     use Illuminate\Database\Eloquent\Model;

//                     class Student extends Model
//                     {
//                     use HasFactory;
//                     }               

//         3. Gunakan routes pada web.php untuk menanggapi permintaan http tertentu dari pengguna.
//            Contoh : 

//                     use Illuminate\Support\Facades\Route;
//                     use App\Http\Controllers\StudentController;
//                     Route::get('/', function () {
//                      return view('welcome');
//                         });
//                     Route::get('/greeting', function () {
//                     return 'Hello World';
//                         });

//         4. Jalankan server dengan menggunakan perintah: 'php artisan serve'
//            kemudian akan keluar 'Server running on[http://127.0.0.1:8000].
//             dan Kita dapat mengcopy URLnya/linknya, lalu paste di browser.
//             Gunakan URL tersebut pada rutes seperti '/' dan '/greeting' setelah tulisan terakhir pada URL.
//             Contoh: 'http://127.0.0.1:8000/greeting' 

//         5. Untuk menghentikan server Menggunakan perintah: 'Ctrl+C'
//             note:
//             - Ketika nanti pengguna mengakses URL '/', server akan membalas malalui teks 'welcome' sebagai halaman web.
//             - ketika nanti pengguna mengakses URL dengan '/greeting', server akan membalas dengan mengirimkan teks "Hello World" sebagai halaman web.


//     2. View
//         Untuk Membuat file baru di views dengan menggunakan ekstensi: '.blade.php'
//         1. Ketikkan perintah di terminal : 'example.blade.php' untuk membuat file baru
//         Setelah itu di dalam file dapat mengetikkan kode sesuai kebutuhan, 
//      contoh:
//                // <!DOCTYPE html>
//                // <html lang="en">
//                // <head>
//                // <meta charset="UTF-8">
//                // <meta name="viewport" content="with=evice-with, initial-scale=1.0">
//                // <title>Document</title>
//                // </head>
//                // <body>
//                //   <p>Hello World</p>
//                // </body>
//                // </html>

//         2. Gunakan routes pada web.php untuk merespons permintaan http tertentu dari pengguna.
//         Contoh : 


//            use Illuminate\Support\Facades\Route;
//            use App\Http\Controllers\StudentController;
//            Route::get('/greeting', function () {
//            return view('example');
//            });

//      3. Controller
//           Membuat file baru dengan perintah: 'php artisan make:controller nama_file'
//           1. Buka terminal
//           2. Buatlah file baru dengan nama "StudentController"
//               dengan menjalankan perintah: 'php artisan make:controller StudentController'
//                 Lalu di dalam file bisa menuliskan kode sesuai kebutuhan kita, misal:
//               namespace App\Http\Controllers;

//               use Illuminate\Http\Request;
//               use App\Models\Student;

//               class StudentController extends Controller
//               {
//                //ktik masing masing
//                public function show($id){
//                $name = Student::find($id)->name;
//                return view('example', ['name'=> $name]);
//                }
//                }
//            3. Bukalah 'example.blade.php' pada views
//                Lalu di dalam file tersebut kita bisa menuliskan kode sesuai kebutuhan, contoh:

//                // <!DOCTYPE html>
//                // <html lang="en">
//                // <head>
//                // <meta charset="UTF-8">
//                // <meta name="viewport" content="width=device-width, initial-scale=1.0">
//                // <title>Document</title>
//                // </head>
//                // <body>
//                // <!-- <p>Hello World</p> -->
//                // <p>Hi, {{ $name }} !</p>
//                // </body>
//                // </html>          
//         Pesan:code program Di atas, kita menggunakan variabel Blade {{ $name }} untuk memasukkan nilai variabel ke dalam HTML.

//             4. Gunakan routes pada web.php untuk merespons permintaan http tertentu dari sipengguna.
//               Contoh: 

//               use Illuminate\Support\Facades\Route;
//               use App\Http\Controllers\StudentController;
//               Route::get('/greeting/{id}', [StudentController::class, 'show']);

//           5. Jalankan server dengan menggunakan perintah: 'php artisan serve'
//              lalu nanti pada terminal akan keluar respon 'Server running on [http://127.0.0.1:8000].
//               dan Kita dapat mengcopy URL/linknya, lalu paste di browser.
//               Gunakan URL pada routes seperti '/' dan '/greeting' setelah tulisan terakhir pada URL.
//                Contoh: 'http://127.0.0.1:8000/greeting{1}' 
//             6. Untuk menghentikan server gunakan perintah: 'Ctrl+C'

// _______________________________________________________________


?>