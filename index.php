<?php
//     Rangkuman Coding Laravel mengenai Migration, Seeder, dan MVC Laravel Framework
  
// 1. Migration
//     Migration adalah sebuah fitur pada laravel yang memungkinkan developer untuk mengelola struktur 
//     database menjadi lebih mudah seperti membuat tabel baru, menambahkan kolom, mengubah tipe data kolom,
//     atau menghapus tabel menggunakan kode PHP.

//     Berikut adalah langkah-langkahnya:
//     1. Buka terminal di project laravel
//     2. Ketikkan perintah 'php artisan make:migration create_student_table', maka akan muncul pemberitahuan
//        bahwa migration telah dibuat dengan nama  '2023_11_23_000000_create_student_table.php' di direktori
//        database/migrations.
//     3. Jalankan dengan mengetik 'php artisan migrate'

// 2. Seeder
//     Seeder merupakan tools yang memungkinkan pengembang untuk mengisi database dengan data awal yang dibutuhkan
//     sebagai keperluan pengembangan atau pengujian aplikasi dan biasanya tabel database akan diisi secara default.

//     Berikut adalah langkah-langkahnya:
//     1. Buka terminal pada direktori database/seeders
//     2. Buat file Seeder dengan perintah 'php artisan make:seeder StudentSeeder'
//     3. Buka file StudentSeeder lalu tambahkan 'use Illuminate\Support\Facades\DB;'
//     4. Tuliskan kode Seeder untuk memasukkan data ke dalam database, seperti:
//         '$data = [
//             ['id' => 1, name => 'Ikeu', 'Score', => 90],
//             ['id' => 1, name => 'Ikeu', 'Score', => 90],
//         ];
//         DB::table('students')->insert($data);'
//     5. Jalankan Seeder dengan perintah 'php artisan db:seed --class=StudentSeeder'

// 3. MVC Laravel Framework
//     MVC adalah pola desain arsitektur dalam sistem pengembangan website yang terdiri dari tiga bagian, yaitu
//     Model, View, dan Controller untuk memungkinkan pengembangan yang terstruktur, terorganisir, dan mudah
//     dipelihara.
//     Berikut komponen MVC:
//     1. Model
//         Model merupakan bagian yang mengelola dan berhubungan langsung dengan database. Dalam Laravel, Model
//         ini berada dalam direktori 'app\Models' secara default.
//         Berikut langkah-langkahnya:
//         1. Buka terminal pada direktori 'app\Http\Models'
//         2. Buat model baru bernama Student dengan perintah 'php artisan make:model Student'
//         3. Tuliskan kode sesuai kebutuhan pada file Sudent seperti:
//             'namespace App\Models;

//             use Illuminate\Database\Eloquent\Factories\HasFactory;
//             use Illuminate\Database\Eloquent\Model;
            
//             class Student extends Model
//             {
//                 use HasFactory;
//             }'
//         4. Buka direktori routes\web.php, gunakan routes untuk menanggapi permintaan HTTP dari pengguna, seperti:
//             'use Illuminate\Support\Facades\Route;
//             use App\Http\Controllers\StudentController;
//             Route::get('/', function () {
//                 return view('welcome');
//             });
//             Route::get('/greeting', function () {
//                 return 'Hello World';
//             });'
//         5. Buka terminal, lalu jalankan dengan perintah 'php artisan serve'
//         6. Salin URL pada respon 'Server running on [http://127.0.0.1:8000].', kemudian tambahkan '/greeting'
//         7. Untuk menghentikan server, klik 'Ctrl+C'.
    
//     2. Views
//         View mengatur tampilan antarmuka penggunanya. Dalam Laravel, file view berada di direktori 'reseources/view'
//         yang berisi HTML, CSS, atau JavScript.
//         Berikut langkah-langkahnya:
//         1. Buka direktori resources\views, lalu buat file baru bernama example, contohnya 'example.blade.php'.
//         2. Masukkan kode sesuai kebutuhan ke dalam file tersebut, seperti:
//             '<!DOCTYPE html>
//             <html lang="en">
//             <head>
//                 <meta charset="UTF-8">
//                 <meta name="viewport" content="with=evice-with, initial-scale=1.0">
//                 <title>Document</title>
//             </head>
//             <body>
//                 <p>Hello World</p>
//             </body>
//             </html>' 
//         3. Buka direktori routes\web.php, gunakan routes untuk menanggapi permintaan HTTP dari pengguna, seperti:
//             'use Illuminate\Support\Facades\Route;
//             use App\Http\Controllers\StudentController;
//             Route::get('/greeting', function () {
//                 return view('example');
//             });'
//         4. Jika tidak menghentikan server sebelumnya, hanya perlu kembali ke browser. Jika sempat dihentikan,
//            ketik perintah 'php artisan serve' untuk mendapatkan URLnya.
    
//     3. Controllers
//         Controller berperan sebagai peranatara anatar model dengan view. Controller mengatur logika aplikasi,
//         menerima permintaan dari pengguna melalui routes, memproses data dari model, dan mengirim datanya ke view
//         yang sesuai. Biasanya berada dalam direktori app\Http\Controllers.
//         Berikut langkah-langkahnya:
//         1. Buka terminal pada direktori app\Http\Controllers
//         2. Buat file baru bernama StudentController dengan perintah 'php artisan make:controller StudentController'
//         3. Masukkan kode pada file tersebut sesuai kebutuhan, seperti:
//             'namespace App\Http\Controllers;

//             use Illuminate\Http\Request;
//             use App\Models\Student;
            
//             class StudentController extends Controller
//             {
//                 //Ketik masing-masing
//                 public function show($id){
//                     $name = Student::find($id)->name;
//                     return view('example', ['name'=>$name]);
//                 }
//             }'
//         4. Buka direktori resources\views\example.blade.php, lalu masukkan kode sesuai kebutuhan seperti:
//             '<!DOCTYPE html>
//             <html lang="en">
//             <head>
//                 <meta charset="UTF-8">
//                 <meta name="viewport" content="width=device-width, initial-scale=1.0">
//                 <title>Document</title>
//             </head>
//             <body>
//                 <p>Hi, {{ $name }} !</p>
//             </body>
//             </html>'
//         5. Buka direktrori routes\web.php, lalu masukkan kode seperti:
//             'use Illuminate\Support\Facades\Route;
//             use App\Http\Controllers\StudentController;
            
//             Route::get('/greeting/{id}', [StudentController::class, 'show']);'
//         6. Jalankan server dengan perintah 'php artisan serve', lalu copy URL dan paste pada browser,
//            tambahkan /greeting/2.

//            Note:Nama yang muncul akan sesuai dengan id yang dimasukkan
?>