<?php
//Nama  : Indy Hendiyani
//NIM   : 2202691
//Kelas : 3A PSTI
//_______________________________________________________________

//Rangkuman Laravel mengenai Migration, Seeder dan MVC (Model-View-Controller)

// 1. Migration
//     Migration adalah sebuah fitur di laravel yang dapat bekerja layaknya version control untuk database sehingga dapat mengelola database dengan lebih mudah. 
//     Migration adalah cara lain untuk menjalankan DDL(database definiton language) tanpa perlu mengetikkan syntax sql dari terminal dan editor khusus lainnya. 

// Jenis-Jenis Migration
//     -Storage migration atau migrasi penyimpanan. Dalam jenis ini data akan dipindahkan dari tempat penyimpanan yang lama ke tempat penyimpanan baru yang lebih canggih. yang disimpan juga akan lebih mudah dicadangkan saat terjadi suatu masalah.
//     -Cloud migration adalah pemindahan data, aplikasi, atau elemen bisnis lainnya dari pusat data lokal ke database yang berbasis cloud.
//     -Application migration, Dalam jenis ini terjadi proses pemindahan program aplikasi dari satu lingkungan database ke yang lainnya.
//      Jadi, bisa termasuk pemindahan seluruh aplikasi dari pusat penyimpanan lokal ke cloud, perpindahan antar cloud, atau pemindahan aplikasi data ke bentuk baru lainnya.

// Fungsi perintah pada migration
//     php artisan migrate:rollback : Untuk menghapus migrasi atau tabel paling terakhir.
//     php artisan migrate:rollback --step=5  : Untuk menghapus beberapa migrasi atau tabel terakhir.
//     php artisan migrate:reset  : Menghapus semua migrasi atau tabel.
//     php artisan migrate:refresh : Menghapus semua tabel dan mengembalikannya kembali.

// Langkah-langkah
//     1. Open terminal
//     2. Membuat file migrasi baru untuk tabel student: 'php artisan make:migration create_student_table'
//     Laravel akan membuat file migrasi baru seperti 
//    '2023_11_25_000000_create_student_table.php' di direktori database/migrations. 
//     3. Jalankan dengan menggunakan: 'php artisan migrate'
//     4. Jika ingin membatalkan migrasi terakhir gunakan: 'php artisan migrate:rollback'

// 2. Seeder
//     Seeder merupakan sebuah class untuk mengisi database dengan data awal atau dummy data yang telah ditentukan secara otomatis. 
//     seeder menjadi fitur yang sangat berguna untuk memasukan data awal yang telah ditentukan ke dalam database dengan mudah dan cepat. 

// Langkah menggunakan Seeder pada Laravel:
//     1. Pertama, membuat file Seeder dengan menggunakan command artisan sebagai berikut: php artisan make:seeder UserSeeder
//     2. Kemudian, buka file Seeder yang sudah kita buat sebelumnya. Pada method `run()`
//     use Illuminate\Database\Seeder;
//     use App\User;

//     class UserSeeder extends Seeder
//     {
//         public function run()
//         {
//         User::create([
//             'name' => 'Indy Hendiyani',
//             'email' => 'indyhendiyani@example.com',
//         ]);

//         User::create([
//             'name' => 'Indy Hendiyani',
//             'email' => 'indyhendiyani@example.com',
//             ]);
//          }
//     }
//         3. Terakhir, menjalankan command artisan berikut untuk memasukkan data ke dalam database dengan menggunakan Seeder yang telah kita buat: php artisan db:seed --class=UserSeeder

// 3. MVC (Model-View-Controller)
//     Model View Controller atau yang dapat disingkat MVC adalah sebuah pola arsitektur dalam membuat sebuah aplikasi dengan cara memisahkan kode menjadi tiga bagian yang terdiri dari:

//     a. Model
//     Bagian yang bertugas untuk menyiapkan, mengatur, memanipulasi, dan mengorganisasikan data yang ada di database. Komponen model berhubungan dengan seluruh data logis (data-related logic) yang digunakan pengguna. 
//     Data logis adalah data yang relevan dengan konteks tertentu. Misalnya ketika ingin membuat database pelanggan, maka data yang dikumpulkan berupa nama pelanggan, usia, alamat, nomor kontak, dan riwayat pembelian. 
//     Komponen model dapat mewakili data apa saja yang sedang ditransfer antara komponen view dan controller, atau data logis lainnya. 
   
//         Langkah - langkah:
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



//     b. View
//     Bagian yang bertugas untuk menampilkan informasi dalam bentuk Graphical User Interface (GUI). Komponen view bertanggung jawab untuk membuat tampilan muka (UI/user interface) pada seluruh situs atau aplikasi.
//     Komponen ini dibuat dari data yang dikumpulkan oleh model, dan diberikan kepada view melalui komponen controller. Namun pada beberapa kasus, view bisa berinteraksi langsung dengan model tanpa bantuan controller. 
//         langkah-langkah:
//             Membuat file baru di views dengan menggunakan ekstensi: '.blade.php'
//           1. Ketikkan perintah di terminal : 'example.blade.php' untuk membuat file baru
//           Setelah itu di dalam file dapat mengetikkan kode sesuai kebutuhan, 
//           contoh:
//              <!DOCTYPE html>
//              <html lang="en">
//              <head>
//                  <meta charset="UTF-8">
//                  <meta name="viewport" content="with=evice-with, initial-scale=1.0">
//                  <title>Document</title>
//              </head>
//              <body>
//                  <p>Hello World</p>
//              </body>
//              </html>

//           2. Gunakan routes pada web.php untuk merespons permintaan http tertentu dari pengguna.
//           Contoh : 
//            use Illuminate\Support\Facades\Route;
//            use App\Http\Controllers\StudentController;
//            Route::get('/greeting', function () {
//            return view('example');
//            });

//     c. Controller
//     Bagian yang bertugas untuk menghubungkan serta mengatur model dan view agar dapat saling terhubung. Komponen controller berfungsi sebagai penghubung antara model dengan view. 
//     Tugas controller hanyalah memproses data dan permintaan yang masuk, kemudian memberitahu komponen model apa yang harus dikerjakan, dan hasilnya akan ditampilkan oleh komponen view. 
//         langkah-langkah:
//         Membuat file baru dengan perintah: 'php artisan make:controller nama_file'
//           1. Buka terminal
//           2. Buatlah file baru dengan nama "StudentController"
//               dengan menjalankan perintah: 'php artisan make:controller StudentController'
//                 Lalu di dalam file bisa menuliskan kode sesuai kebutuhan kita, misal:
//               namespace App\Http\Controllers;

//               use Illuminate\Http\Request;
//               use App\Models\Student;

//               class StudentController extends Controller
//               {
//                ktik masing masing
//                public function show($id){
//                $name = Student::find($id)->name;
//                return view('example', ['name'=> $name]);
//                }
//                }
//            3. Bukalah 'example.blade.php' pada views
//                Lalu di dalam file tersebut kita bisa menuliskan kode sesuai kebutuhan, contoh:

//                <!DOCTYPE html>
//                <html lang="en">
//                <head>
//                     <meta charset="UTF-8">
//                     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//                     <title>Document</title>
//                </head>
//                <body>
//                      <!-- <p>Hello World</p> -->
//                      <p>Hi, {{ $name }} !</p>
//                </body>
//                </html>          
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
//             6. Untuk menghentikan server gunakan perintah: 'Ctrl+C' -->
?>