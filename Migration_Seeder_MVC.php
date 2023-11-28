<?php
/**
 * Catatan Koding Laravel
 * ======================
 * File ini berisi catatan mengenai pengkodean dalam kerangka kerja Laravel,
 * terutama pada Migrasi, Seeder, dan MVC (Model-View-Controller).
 *
 * Daftar Isi:
 * 1. Migration
 * 2. Seeder
 * 3. MVC (Model-View-Controller)
 */

/**
 * 1. Migration
 * ------------
 * Migration dalam Laravel adalah proses pengelolaan perubahan skema database
 * seiring waktu. Ini memungkinkan untuk memodifikasi skema database dan menjaga
 * agar tetap selaras dengan kode aplikasi.
 *
 * Contoh:
 * - Membuat migrasi baru: `php artisan make:migration create_example_table`
 * - Menjalankan migrasi: `php artisan migrate`
 * - Membatalkan migrasi terakhir: `php artisan migrate:rollback`
 *
 * Catatan: Migrasi disimpan di direktori database/migrations.
 * 
 * Langkah-Langkah:
 * 1. Open terminal
 * 2. Buat file migrasi baru untuk tabel student: 'php artisan make:migration create_student_table'
 *    Laravel akan membuat file migrasi baru seperti 
 *    '2023_11_27_000000_create_student_table.php' di direktori database/migrations. 
 * 3. Jalankan dengan menggunakan perintah: 'php artisan migrate'
 * 4. Jika ingin membatalkan migrasi terakhir gunakan: 'php artisan migrate:rollback'
 */

/**
 * 2. Seeder
 * ----------
 * Seeder dalam Laravel digunakan untuk mengisi tabel database dengan data sampel
 * untuk pengujian atau tujuan pengembangan. Ini sering digunakan bersamaan
 * dengan migrasi untuk membuat lingkungan pengujian yang konsisten.
 *
 * Contoh:
 * - Membuat seeder baru: `php artisan make:seeder ExampleTableSeeder`
 * - Menjalankan seeder: `php artisan db:seed --class=ExampleTableSeeder`
 *
 * Catatan: Seeder disimpan di direktori database/seeders.
 * 
 * Langkah-Langkah: 
 * 1. Open terminal
 * 2. Buat file Seeder baru dengan nama "StudentSeeder" 
 *    dengan menjalankan perintah: 'php artisan make:seeder StudentSeeder' 
 * 3. Jalankan Seeder menggunakan perintah: 'php artisan db:seed --class=StudentSeeder'
 */

/**
 * 3. MVC (Model-View-Controller)
 * ------------------------------
 * MVC adalah sebuah pendekatan perangkat lunak yang memisahkan aplikasi logika dari presentasi. 
 * MVC memisahkan aplikasi berdasarkan komponen- komponen aplikasi, 
 * seperti : manipulasi data, controller, dan user interface.
 * - Model: Model mewakili struktur data. Biasanya model berisi fungsi-fungsi 
 *          yang membantu seseorang dalam pengelolaan basis data seperti memasukkan data ke basis data, pembaruan data dan lain-lain.
 * - View: Bagian yang mengatur tampilan ke pengguna. Bisa dikatakan berupa halaman web.
 * - Controller: Bagian yang menjembatani model dan view.
 * 
 * Contoh:
 *   Membuat controller baru: `php artisan make:controller ExampleController`
 *   Mendefinisikan rute di web.php untuk menghubungkan controller dengan view.
 *
 * Catatan: Controller disimpan di direktori app/Http/Controllers.
 * 
 * 
 * 1) Model
 * ---------
 * Mmbuat model baru: 'php artisan make:model nama_model'
 *
 * Langkah-Langkah:
 * 1. Open terminal
 * 2. Buat model baru dengan nama "Student"
 *    dengan menjalankan perintah: 'php artisan make:model Student'
 *    Lalu dalam file bisa menuliskan kode sesuai kebutuhan, seperti:
 */                                                    
                                                                namespace App\Models;
            
                                                                use Illuminate\Database\Eloquent\Factories\HasFactory;
                                                                use Illuminate\Database\Eloquent\Model;
            
                                                                class Student extends Model
                                                                {
                                                                use HasFactory;
                                                                }                                               
 /**
 *  3. Gunakan routes pada web.php untuk menanggapi permintaan HTTP tertentu dari pengguna.
 *    Comtoh penulisan: 
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
 *    lalu akan keluar respon 'Server running on[http://127.0.0.1:8000].
 *    Kita dapat menyalin URLnya, lalu paste di browser.
 *    Gunakan URL pada rutes seperti '/' dan '/greeting' setelah tulisan terakhir pada URL.
 *    Contoh: 'http://127.0.0.1:8000/greeting' 
 * 5. Untuk menghentikan server gunakan perintah: 'Ctrl+C'
 *    Catatan:
 *    - Ketika pengguna mengakses URL '/', server akan merespons dengan mengirimkan teks 'welcome' sebagai halaman web.
 *    - ketika pengguna mengakses URL '/greeting', server akan merespons dengan mengirimkan teks "Hello World" sebagai halaman web.
 * 
 * 
 * 2) Views
 * ---------
 * - Membuat file baru di views dengan menggunakan ekstensi: '.blade.php'
 * 
 * - Menggunakan Blade Templates
 * 
 * Langkah-Langkah
 * 1. Buat file baru dengan nama "example"
 *    dengan menuliskan: 'example.blade.php'
 *    Lalu dalam file bisa menuliskan kode sesuai kebutuhan, seperti:
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
 *    Comtoh penulisan: 
 */                  
                        use Illuminate\Support\Facades\Route;
                        use App\Http\Controllers\StudentController;
                        Route::get('/greeting', function () {
                            return view('example');
                        });
 /** 
 * 3. Karena kita sebelumnya sudah menjalankan perintah: 'php artisan serve' untuk menjalankan
 *    server, kita tidak perlu mengulanginya lagi jika tidak menghentikan server sebelumnya. Jika sebelumnya dihentikan makan kita 
 *    perlu menjalankan ulang server dengan perintah tersebut. 
 *    Jadi tinggal bua browser yang tadi telah digunakan lalu tambahkan URL pada routes diakhir URL server.
 * 
 * Catatan: ketika pengguna mengakses URL '/greeting', server akan merespons dengan mengirimkan teks "Hello World" sebagai halaman web.
 *         
 * 
 * 3) Controllers
 * --------------
 * - Membuat file baru: 'php artisan make:controller nama_file'
 *   
 * Langkah-Langkah:
 * 1. Open terminal
 * 2. Buat file baru dengan nama "StudentController"
 *    dengan menjalankan perintah: 'php artisan make:controller StudentController'
 *    Lalu dalam file bisa menuliskan kode sesuai kebutuhan, seperti:
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
 * 3. Buka 'example.blade.php' di views
 *    Lalu dalam file tersebut kita bisa menuliskan kode sesuai kebutuhan, seperti:
 */
                                                                                <!DOCTYPE html>
                                                                                <html lang="en">
                                                                                <head>
                                                                                    <meta charset="UTF-8">
                                                                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                                                                    <title>Document</title>
                                                                                </head>
                                                                                <body>
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
 * 6. Untuk menghentikan server gunakan perintah: 'Ctrl+C'
 *    Catatan:
 *    - ketika pengguna mengakses URL '/greeting{id}', server akan merespons dengan mengirimkan teks "Hi, Ariyanti !" sebagai halaman web.
 *      Nama yang muncul sesuai id yang kita masukkan dan server akan mengakses id yg menghubungkan nama di database yang nantinya akan memunculkan nama seperti "Ariyanti" seperti contoh diatas.              
 */ 
?>