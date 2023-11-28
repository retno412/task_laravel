<?php
/**
 * Rangkuman Laravel Framework
 * Editor by Afifah
 * ======================
 * File ini berisi catatan mengenai pengkodean dalam kerangka kerja Laravel,
 * terutama pada Migrasi, Seeder, dan MVC (Model-View-Controller).
 *
 * Daftar Isi:
 * ----------------------------
 * 1. Migration
 * 2. Seeder
 * 3. MVC (Model-View-Controller)
 */

/**
 * 1. Migration
 * --------------------
 * Migrasi di Laravel adalah proses mengelola perubahan skema database 
 * Seiring dengan waktu. Ini dapat digunakan untuk mengubah dan menyimpan skema database 
 * agar  tetap konsisten dengan kode aplikasi.
 *
 * Contoh:
 * - Untuk Membuat migrasi baru: php artisan make:migration create_example_table
 * - Untuk Menjalankan migrasi: php artisan migrate
 * - Untuk Membatalkan migrasi terakhir: php artisan migrate:rollback
 *
 * Catatan: Migrasi disimpan di direktori database/migrations.
 * 
 * - Langkah-Langkahnya :
 * 1. Open terminal
 * 2. Membuat file migrasi baru untuk tabel student: 'php artisan make:migration create_student_table'
 *    Laravel akan membuat file migrasi baru seperti 
 *    '2023_11_27_000000_create_student_table.php' di direktori database/migrations. 
 * 3. Jalankan dengan menggunakan: 'php artisan migrate'
 * 4. Jika ingin membatalkan migrasi terakhir gunakan: 'php artisan migrate:rollback'
 */

/**
 * 2. Seeder
 * ----------------------
 * Seeder pada Laravel merupakan fitur yang sangat berguna dalam membantu kita untuk memasukkan 
 * data awal yang telah ditentukan ke dalam database dengan mudah dan cepat
 * Ini sering digunakan bersamaan dengan migrasi untuk membuat lingkungan pengujian yang konsisten.
 *
 * Contoh:
 * - Untuk Membuat seeder baru: php artisan make:seeder ExampleTableSeeder
 * - Untuk Menjalankan seeder: php artisan db:seed --class=ExampleTableSeeder
 *
 * Pesan: Seeder disimpan di direktori database/seeders.
 * 
 * - Langkah-Langkahnya: 
 * 1. Bukalah terminal terminal
 * 2. Lalu Buatlah file Seeder baru dengan nama "StudentSeeder" 
 *    dengan menjalankan perintah: 'php artisan make:seeder StudentSeeder' 
 * 3. Dan Jalankan Seeder menggunakan perintah: 'php artisan db:seed --class=StudentSeeder'
 */

/**
 * 3. MVC (Model-View-Controller)
 * ------------------------------
 * MVC adalah sebuah pendekatan perangkat lunak yang memisahkan aplikasi logika dari presentasi.
 * MVC memisahkan aplikasi dengan berdasarkan komponen aplikasinya, 
 * seperti : manipulasi data, controller, dan user interface.
 * - Model: model mewakili struktur data. Biasanya, suatu model berisi fungsi 
 *          yang akan membantu seseorang dalam pengelolaan basis data seperti memasukkan data ke basis data, pembaruan data dan lain-lain.
 * - View: View adalah bagian yang mengatur tampilan ke pengguna. Bisa dikatakan berupa halaman web.
 * - Controller: Bagian/jembatan yang menghubungkan model dan view.
 * 
 * Contoh:
 *   Untuk Membuat controller baru: php artisan make:controller ExampleController
 *   Untuk Mendefinisikan rute di web.php untuk menghubungkan controller dengan view.
 *
 * Pesan: Controller disimpan di direktori app/Http/Controllers.
 * 
 * 
 * 1) Database
 * -----------
 * Membuat koneksi database yang menghubungkan ke localhost difile .env: 
 */
            // DB_CONNECTION=mysql
            // DB_HOST=127.0.0.1
            // DB_PORT=3307
            // DB_DATABASE=belajar-laravel
            // DB_USERNAME=root
            // DB_PASSWORD=

 // * Kemudian membuat database migration dengan menjalankan: 'php artisan make:migration create_student_table'
// * Setelah itu, membuat database seeding dengan menjalankan: 'php artisan make:seeder StudentSeeder'

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
                    namespace App\Models;

                    use Illuminate\Database\Eloquent\Factories\HasFactory;
                    use Illuminate\Database\Eloquent\Model;

                    class Student extends Model
                    {
                    use HasFactory;
                    }               
 /**
 *3. Gunakan routes pada web.php untuk menanggapi permintaan http tertentu dari pengguna.
 *    Contoh penulisannya: 
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
 * --------------
 * - Untuk Membuat file baru di views dengan menggunakan ekstensi: '.blade.php'
 * - Menggunakan Blade Templates
 * 
 * - Langkah-Langkahnya:
 * 1. Buatlah file baru dengan nama "example"
 *    dengan mengetik: 'example.blade.php'
 *    Lalu di dalam file bisa menuliskan kode sesuai kebutuhan, misal:

 */        
 
            // <!DOCTYPE html>
            // <html lang="en">
            // <head>
            // <meta charset="UTF-8">
            // <meta name="viewport" content="with=evice-with, initial-scale=1.0">
            // <title>Document</title>
            // </head>
            // <body>
            //   <p>Hello World</p>
            // </body>
            // </html>
/** 
 * 2. Gunakan routes pada web.php untuk merespons permintaan http tertentu dari pengguna.
 *    Contoh penulisan: 
 */       
 /**         
        use Illuminate\Support\Facades\Route;
        use App\Http\Controllers\StudentController;

        Route::get('/greeting', function () {
        return view('example');
        });
 */ 
/**
 * 3. Karena sebelumnya kita sudah menjalankan perintah: 'php artisan serve' untuk menjalankan
  *    server, jadi kita tidak perlu mengulanginya lagi kecuali kita menghentikan servernya terlebih dahulu. Jika sebelumnya dihentikan makan kita 
  *    - harus me-restart server dengan perintah ini.  
  *    Jadi buat saja browser yang Anda gunakan sebelumnya lalu tambahkan URL ke routes di akhir URL server.
  *
 * Pesan: ketika pengguna mengakses URL '/greeting', server akan merespons dengan mengirimkan teks "Hello World" sebagai halaman web.
 *         
 * 4) Controllers
 * ----------------
 * - Kita perlu Membuat file baru dengan perintah: 'php artisan make:controller nama_file'
 *   
 * - Langkah-Langkahnya:
 * 1. Bukalah terminal
 * 2. Buatlah file baru dengan nama "StudentController"
 *    dengan menjalankan perintah: 'php artisan make:controller StudentController'
 *    Lalu di dalam file bisa menuliskan kode sesuai kebutuhan kita, misal:
 */
namespace App\Http\Controllers;

               use Illuminate\Http\Request;
               use App\Models\Student;

               class StudentController extends Controller
               {
                //ktik masing masing
                public function show($id){
                $name = Student::find($id)->name;
                return view('example', ['name'=> $name]);
                }
                }

/**
 * 3. Bukalah 'example.blade.php' pada views
 *    Lalu di dalam file tersebut kita bisa menuliskan kode sesuai kebutuhan, misalkan:
*/
                // <!DOCTYPE html>
                // <html lang="en">
                // <head>
                // <meta charset="UTF-8">
                // <meta name="viewport" content="width=device-width, initial-scale=1.0">
                // <title>Document</title>
                // </head>
                // <body>
                // <!-- <p>Hello World</p> -->
                // <p>Hi, {{ $name }} !</p>
                // </body>
                // </html>
 /**    
  * 
  */           
// Pesan:code program Di atas, kita menggunakan variabel Blade {{ $name }} untuk memasukkan nilai variabel ke dalam HTML.
 /** 
  * 4. Gunakan routes pada web.php untuk merespons permintaan http tertentu dari sipengguna.
 *    Contoh: 
*/
            use Illuminate\Support\Facades\Route;
            use App\Http\Controllers\StudentController;
            Route::get('/greeting/{id}', [StudentController::class, 'show']);
/** 
 * 5. Jalankan server dengan menggunakan perintah: 'php artisan serve'
 *    lalu nanti pada terminal akan keluar respon 'Server running on [http://127.0.0.1:8000].
 *    dan Kita dapat mengcopy URL/linknya, lalu paste di browser.
 *    Gunakan URL pada routes seperti '/' dan '/greeting' setelah tulisan terakhir pada URL.
 *    Contoh: 'http://127.0.0.1:8000/greeting{1}' 
 * 6. Untuk menghentikan server gunakan perintah: 'Ctrl+C'
 * -----------------------------------------------------------------------------------------------
 *    Pesan:
 *    - ketika nanti pengguna mengakses URL '/greeting{id}', Maka server akan merespons dengan mengirimkan teks "Hi, Afifah !" sebagai halaman web.
 * 
 *    Dan Nama yang muncul akan sesuai id yang kita masukkan diawal dan server akan mengakses id yg menghubungkan nama di database yang nantinya akan memunculkan nama seperti "Afifah" sesuai dengan yang tadi.              
 */ 
?>