<?php

// NIM   : 2202585
// Nama  : Fania Komalasari  
// Kelas : 3A PSTI
// ----------------------------------

// Catatan mengenai Migration, Seeder dan MVC (Model-View-Controller)

// 1. Migration

// Definisi:
//     Migration adalah proses yang memungkinkan pengembang untuk membangun dan mengelola 
//     skema database secara terstruktur. Skema database mencakup tabel, column, index, dan
//     ketergantungan lainnya yang diperlukan untuk menyimpan dan mengambil data. Dengan 
//     migration, pengembang dapat mengelola evolusi struktural database seiring berjalannya
//     waktu.

// Fungsi:
//     Fungsi utama dari Migration dalam Laravel adalah 
//     memudahkan pengembang dalam mengelola perubahan skema database.

// Langkah - Langkah:
//     1. Open terminal
//     2. Membuat file migrasi baru untuk tabel student: 'php artisan make:migration create_student_table'
//     Laravel akan membuat file migrasi baru seperti 
//     '2023_11_27_000000_create_student_table.php' di direktori database/migrations. 
//     3. Jalankan dengan menggunakan: 'php artisan migrate'
//     4. Jika ingin membatalkan migrasi terakhir gunakan: 'php artisan migrate:rollback'


// 2. Seeder

// Definisi:
//     Seeder pada Laravel merupakan merupakan sebuah class yang memungkinkan kita untuk 
//     mengisi database kita dengan data awal atau dummy data yang telah ditentukan secara 
//     otomatis.

// Fungsi:
//     Seeder dalam Laravel digunakan untuk mengisi basis data dengan data dummy atau awal.
//     Fungsi utama dari Seeder adalah memfasilitasi pengembang dalam mengembangkan dan 
//     menguji aplikasi dengan menyediakan data dasar yang diperlukan. 

// Langkah - langkah:
//     1. Bukalah terminal
//     2. Lalu Buatlah file Seeder baru dengan nama "StudentSeeder" 
//     dengan menjalankan perintah: 'php artisan make:seeder StudentSeeder' 
//     3. Dan Jalankan Seeder menggunakan perintah: 'php artisan db:seed --class=StudentSeeder'


// 3. MVC (Model-View-Controller)

// Definisi:
//     MVC adalah pola desain arsitektur perangkat lunak yang membagi aplikasi menjadi 
//     tiga komponen utama: Model, View, dan Controller. Laravel mengikuti pola ini untuk 
//     memisahkan logika bisnis, presentasi, dan pengelolaan input.

// Fungsi:
//     Model:
//     Bertanggung jawab untuk berinteraksi dengan database, melakukan operasi CRUD, dan 
//     mengelola data aplikasi.

//     View:
//     Menangani tampilan atau antarmuka pengguna, menampilkan data dari Model, dan menerima 
//     input dari pengguna.

//     Controller:
//     Mengelola logika bisnis, menerima input dari pengguna melalui View, berinteraksi 
//     dengan Model, dan mengirimkan data ke View.

// Langkah - langkah:

//     1. Model
//         model baru: 'php artisan make:model nama_model'
//         1. Bukalah terminal
//         2. Buatlah model baru dengan nama "Student"
//         dengan menjalankan: 'php artisan make:model Student'
//         Lalu dalam file bisa menuliskan kode sesuai kebutuhan, misal:

//                     namespace App\Models;

//                     use Illuminate\Database\Eloquent\Factories\HasFactory;
//                     use Illuminate\Database\Eloquent\Model;

//                     class Student extends Model
//                     {
//                     use HasFactory;
//                     }               

//         3. Gunakan routes pada web.php untuk menanggapi permintaan http tertentu dari pengguna.
//            Contoh penulisannya: 
 
//                     use Illuminate\Support\Facades\Route;
//                     use App\Http\Controllers\StudentController;
//                     Route::get('/', function () {
//                      return view('welcome');
//                         });
//                     Route::get('/greeting', function () {
//                     return 'Hello World';
//                         });
 
//         4. Jalankan server dengan menggunakan perintah: 'php artisan serve'
//            nantinya akan keluar respon 'Server running on[http://127.0.0.1:8000].
//             dan Kita dapat mengcopy URLnya/linknya, lalu paste di browser.
//             Gunakan URL tersebut pada rutes seperti '/' dan '/greeting' setelah tulisan terakhir pada URL.
//             Contoh: 'http://127.0.0.1:8000/greeting' 
 
//         5. Untuk menghentikan server Menggunakan perintah: 'Ctrl+C'
//             note:
//             - Ketika nanti pengguna mengakses URL '/', server akan membalas malalui teks 'welcome' sebagai halaman web.
//             - ketika nanti pengguna mengakses URL '/greeting', server akan membalas dengan mengirimkan teks "Hello World" sebagai halaman web.


//     2. View
//         Untuk Membuat file baru di views dengan menggunakan ekstensi: '.blade.php'
//         1. Buatlah file baru dengan nama "example"
//         dengan mengetik: 'example.blade.php'
//         Lalu di dalam file bisa menuliskan kode sesuai kebutuhan, misal:
           
   
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
//         Contoh penulisan: 
         
             
//            use Illuminate\Support\Facades\Route;
//            use App\Http\Controllers\StudentController;
//            Route::get('/greeting', function () {
//            return view('example');
//            });
     
   
//         3. Karena sebelumnya kita sudah menjalankan perintah: 'php artisan serve' untuk menjalankan
//             server, jadi kita tidak perlu mengulanginya lagi kecuali kita menghentikan servernya terlebih dahulu. Jika sebelumnya dihentikan maka kita 
//             harus me-restart server dengan perintah ini.  
//             Jadi buat saja browser yang Anda gunakan sebelumnya lalu tambahkan URL ke routes di akhir URL server.
    
//         Pesan: ketika pengguna mengakses URL '/greeting', server akan merespons dengan mengirimkan teks "Hello World" sebagai halaman web.
    
    

// 3. Controller
//     Membuat file baru dengan perintah: 'php artisan make:controller nama_file'
//     1. Bukalah terminal
//     2. Buatlah file baru dengan nama "StudentController"
//         dengan menjalankan perintah: 'php artisan make:controller StudentController'
//         Lalu di dalam file bisa menuliskan kode sesuai kebutuhan kita, misal:
//         namespace App\Http\Controllers;

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
//     3. Bukalah 'example.blade.php' pada views
//         Lalu di dalam file tersebut kita bisa menuliskan kode sesuai kebutuhan, misalkan:

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

//    4. Gunakan routes pada web.php untuk merespons permintaan http tertentu dari sipengguna.
//        Contoh: 

//            use Illuminate\Support\Facades\Route;
//            use App\Http\Controllers\StudentController;
//            Route::get('/greeting/{id}', [StudentController::class, 'show']);
 
//     5. Jalankan server dengan menggunakan perintah: 'php artisan serve'
//      lalu nanti pada terminal akan keluar respon 'Server running on [http://127.0.0.1:8000].
//       dan Kita dapat mengcopy URL/linknya, lalu paste di browser.
//       Gunakan URL pada routes seperti '/' dan '/greeting' setelah tulisan terakhir pada URL.
//          Contoh: 'http://127.0.0.1:8000/greeting{1}' 
//     6. Untuk menghentikan server gunakan perintah: 'Ctrl+C'

// ----------------------------------------
// note:  
// Migrasi disimpan di direktori database/migrations. 
// Seeder disimpan di direktori database/seeders.

?>

