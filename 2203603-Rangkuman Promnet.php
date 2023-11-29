<!-- <?php
/**
 * Rangkuman Laravel Framework
 * Muhammad Sulthan Nabil T
 * 2203603
 * 3A PSTI
**/

/**
 * 1. Migration
 * Merupakan proses mengelola perubahan skema database 
 * Migration dapat digunakan untuk mengubah dan menyimpan skema database 
 * agar tetap konsisten dengan kode program.
 *
 * Contoh:
 * - Untuk Membuat migrasi baru: php artisan make:migration create_example_table
 * - Untuk Menjalankan migrasi: php artisan migrate
 * - Untuk Membatalkan migrasi terakhir: php artisan migrate:rollback
**/

/**
 * 2. Seeder
 * Seeder memungkinkan kita untuk membuat data awal yang sama untuk setiap penggunaan dalam pembangunan aplikasi.
 *
 * Contoh:
 * - Membuat seeder baru: php artisan make:seeder ExampleTableSeeder
 * - Menjalankan seeder: php artisan db:seed --class=ExampleTableSeeder
**/

/**
 * 3. MVC (Model-View-Controller)
 * MVC adalah sebuah pola arsitektur dalam membuat sebuah aplikasi dengan cara memisahkan kode menjadi tiga bagian:
 *      -Model
 *       Bagian yang bertugas untuk menyiapkan, mengatur, memanipulasi, dan mengorganisasikan data yang ada di database.
 * 
 *      -View
 *       Menampilkan informasi dalam bentuk GUI.
 * 
 *      -Controller
 *       Menghubungkan dan mengatur model dan view agar dapat saling terhubung.
 * 
 * Contoh:
 *   Untuk Membuat controller baru: php artisan make:controller ExampleController
 *   Untuk Mendefinisikan rute di web.php untuk menghubungkan controller dengan view.
 * 
 * 1) Database
 * Membuat koneksi database yang menghubungkan ke localhost di file .env: 
 */
            // DB_CONNECTION=mysql
            // DB_HOST=127.0.0.1
            // DB_PORT=3307
            // DB_DATABASE=belajar-laravel
            // DB_USERNAME=root
            // DB_PASSWORD=

 // *Membuat database migration dengan menjalankan: 'php artisan make:migration create_student_table'
// * Membuat database seeding dengan menjalankan: 'php artisan make:seeder StudentSeeder'

/* 2) Model
* ---------
* Untuk Membuat model baru: 'php artisan make:model nama_model'
*
* - Langkah-Langkahnya:
* 1. Bukalah terminal
* 2. Buatlah model baru dengan nama "Student"
*    dengan menjalankan: 'php artisan make:model Student'
*    Lalu dalam file bisa menuliskan kode sesuai kebutuhan, misal:
*/
                    // namespace App\Models;

                    // use Illuminate\Database\Eloquent\Factories\HasFactory;
                    // use Illuminate\Database\Eloquent\Model;

                    // class Student extends Model
                    // {
                    // use HasFactory;
                    // }               
 /**
 *3. Gunakan routes pada web.php untuk menanggapi permintaan http tertentu dari pengguna.
 *    Contoh penulisannya: 
 */
                    // use Illuminate\Support\Facades\Route;
                    // use App\Http\Controllers\StudentController;
                    // Route::get('/', function () {
                    //  return view('welcome');
                    //     });
                    // Route::get('/greeting', function () {
                    // return 'Hello World';
                    //     });
/** 
 * 4. Jalankan server dengan menggunakan perintah: 'php artisan serve'
 *    nantinya akan keluar respon 'Server running on[http://127.0.0.1:8000].
 *    dan Kita dapat mengcopy URLnya/linknya, lalu paste di browser.
 *    Gunakan URL tersebut pada rutes seperti '/' dan '/greeting' setelah tulisan terakhir pada URL.
 *    Contoh: 'http://127.0.0.1:8000/greeting' 
 * 
 * 5. Untuk menghentikan server Menggunakan perintah: 'Ctrl+C'
 *    Pesan:
 *    - Ketika nanti pengguna mengakses URL '/', server akan membalas malalui teks 'welcome' sebagai halaman web.
 *    - ketika nanti pengguna mengakses URL '/greeting', server akan membalas dengan mengirimkan teks "Hello World" sebagai halaman web.
 * 
 * * 3) Views
 * - Untuk Membuat file baru di views dengan menggunakan ekstensi: '.blade.php'
 * - Menggunakan Blade Templates
 * 
 * - Langkah-langkah:
 * 1. Buatlah file baru dengan nama "example"
 *    dengan mengetik: 'example.blade.php'
 *    Lalu di dalam file bisa menuliskan kode sesuai kebutuhan, misal:

 */        
 
            // <!DOCTYPE html>
            //<html lang="en">
            //<head>
            //    <meta charset="UTF-8">
            //    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            //    <title>Document</title>
            //</head>
            //<body>
            //    <p> Hi, {{ $name }} !</p>
            //</body>
            //</html>
/** 
 * 
 * 2. Gunakan routes pada web.php untuk merespons permintaan http tertentu dari pengguna.
 *    Contoh penulisan: 
 */       
 /**         
    *<?php

    *use Illuminate\Support\Facades\Route;
    *use App\Http\Controllers\StudentController;

    
    *--------------------------------------------------------------------------
    * Web Routes
    *--------------------------------------------------------------------------
    *
    * Here is where you can register web routes for your application. These
    * routes are loaded by the RouteServiceProvider within a group which
    * contains the "web" middleware group. Now create something great!
    *
*/

    // Route::get('/', function () {
    //     return view('welcome');
    // });
    // Route::get('/greeting', function () {
    //     return 'Hello World' ;
    // ?>
/**
 * 
 * 3. Jika perintah: 'php artisan serve' belum diberhentikan dengan 'Control+C' kita tidak perlu menulis ulang perintah tersebut.
  *    
 * Pesan: ketika pengguna mengakses URL '/greeting', server akan merespons dengan mengirimkan teks "Hello World" sebagai halaman web. 
 *         
 * 4) Controllers
 *
 * Buat file baru dengan perintah: 'php artisan make:controller nama_file'
 *   
 * - Langkah-Langkah:
 * 1. Buka terminal
 * 2. Buat file baru dengan nama "StudentController"
 *    dengan menjalankan perintah: 'php artisan make:controller StudentController'
 *    Lalu di dalam file bisa menuliskan kode sesuai kebutuhan kita, misal:
 */
// namespace App\Http\Controllers;

//                use Illuminate\Http\Request;
//                use App\Models\Student;

//                class StudentController extends Controller
//                {
//                 //ktik masing masing
//                 public function show($id){
//                 $name = Student::find($id)->name;
//                 return view('example', ['name'=> $name]);
//                 }
//                 }

/**
 * 3. Buka 'example.blade.php' pada views
 *    Kemudian di dalam file tersebut kita bisa menuliskan kode sesuai kebutuhan, sebagai contoh:
*/
                // <!DOCTYPE html>
                // <html lang="en">
                // <head>
                // <meta charset="UTF-8">
                // <meta name="viewport" content="width=device-width, initial-scale=1.0">
                // <title>Document</title>
                // </head>
                // <body>
                // <!- <p>Hello World</p> 
                // <p>Hi, {{ $name }} !</p>
                // </body>
                // </html>
 /**    
  * 
  */           
 /** 
  * 4. Gunakan routes pada web.php untuk merespons permintaan http tertentu dari sipengguna.
 *    Contoh: 
*/
            // Route::get('/greeting/{id}', [StudentController::class, 'show']);
/** 
 * 5. Jalankan server dengan menggunakan perintah: 'php artisan serve'
 *    Kemudian akan muncul link server yang bisa dibuka seperti 'Server running on [http://127.0.0.1:8000].
 *    tambahkan slash '/' dan/atau '/greeting' setelah tulisan terakhir pada URL.
 *    Contoh: 'http://127.0.0.1:8000/greeting/0(angka berapa saja)' 
 * 6. Untuk menghentikan server gunakan perintah: 'Ctrl+C'
 * -----------------------------------------------------------------------------------------------
 *    Pesan:
 *    - ketika pengguna mengakses URL '/greeting/0', Maka server akan merespons dengan mengirimkan teks "Hi, (nama di database) !" di web server pengguna.
 *      Nama yang muncul akan sesuai id yang kita masukkan diawal dan server akan mengakses id yg menghubungkan nama di database.
 ->
