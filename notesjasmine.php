<?php
    // Nama: Jasmine Lidwina Hanny Hedyana Putri
    // NIM: 2203680
    // Kelas: PSTI 3B
    // Matakuliah: Pemrograman Internet

    // Notes Migration, Seeder, and MVC Laravel Framework 
    
    /**
     * 1. Migration dalam Laravel:
     *    - Migration memungkinkan pembuatan dan modifikasi tabel-tabel database menggunakan kode PHP.
     *    - Kode PHP dalam migration menggantikan penggunaan perintah SQL manual untuk mendeskripsikan struktur tabel.
     *    - Migration membantu mengelola versi skema database sesuai perkembangan aplikasi web.
     *    - Membuat migration dengan perintah 'php artisan make:migration nama_migration' di terminal.
     *    - Mengubah konfigurasi .env untuk mencocokkan nama database yang digunakan, contohnya seperti beikut:
     *      DB_CONNECTION=mysql
     *      DB_HOST=127.0.0.1
     *      DB_PORT=3306
     *      DB_DATABASE=laravel_jasmine
     *      DB_USERNAME=root
     *      DB_PASSWORD=
     *    - Menjalankan migration dengan perintah 'php artisan migrate' di terminal.
     */
    
    /**
     * 2. Seeder dalam Laravel:
     *    - Seeder digunakan untuk mengisi tabel-tabel database dengan data palsu.
     *    - Memungkinkan pembuatan data beragam untuk menguji fitur-fitur aplikasi web.
     *    - Model factory digunakan untuk membuat data otomatis dan acak sesuai aturan yang ditentukan.
     *    - Membuat seeder dengan perintah 'php artisan make:seeder nama_seeder' di terminal.
     *    - Menulis kode PHP dalam seeder untuk mengisi data ke tabel di database. Contohnya seperti:
     *      <?php
     *      namespace Database\Seeders;
     *      use Illuminate\Database\Console\Seeds\WithoutModelEvents;
     *      use Illuminate\Database\Seeder;
     *      use Illuminate\Support\Facades\DB;
     *      use Faker\Factory as Faker;
     * 
     *      class StudentSeeder extends Seeder
     *      {
     *      Run the database seeds.
     *      public function run(): void
     *          {
     *          $faker = Faker::create();
     *          $data = [];
     *          for ($i = 0; $i < 55; $i++) {
     *              $data[] = [
     *              'name'  => $faker->name,
     *              'score' => rand(70, 100),
     *              ];
     *              }
     *          DB::table('student')->insert($data);
     *          }
     *      }
     *    - Menjalankan seeder dengan perintah 'php artisan db:seed' di terminal.
     */
    
    /**
     * 3. MVC (Model-View-Controller) dalam Laravel:
     *    a) Model:
     *       - Mengelola data dan logika aplikasi web.
     *       - Menggunakan Eloquent ORM untuk berinteraksi dengan database.
     *       - Membuat model dengan perintah 'php artisan make:model nama_model' di terminal.
     *       - Menulis kode PHP dalam model untuk mendefinisikan atribut, relasi, dan perilaku model. Contohnya:
     *         <?php
     *          namespace App\Models;
     *          use Illuminate\Database\Eloquent\Factories\HasFactory;
     *          use Illuminate\Database\Eloquent\Model;
     *          class Student extends Model
     *          {
     *              use HasFactory;
     *          }
     *       - Menghubungkan model dengan URL dalam file routes/web.php. Sebagai berikut:
     *         <?php
     *          use Illuminate\Support\Facades\Route;
     *          use App\Http\Controllers\StudentController;
     *          Route::get('/', function () {
     *              return view('welcome');
     *              });
     *          Route::get('/greeting', function(){
     *              return 'Hello World';
     *              });
     *
     *    b) View:
     *       - Menampilkan data dan antarmuka pengguna.
     *       - Menggunakan template engine Blade untuk menyederhanakan dan memperkuat kode HTML.
     *       - Membuat file view dengan ekstensi .blade.php di folder resources/views.
     *       - Menulis kode HTML dengan sintaks Blade untuk tampilan dinamis. Contoh codenya:
     *         <!DOCTYPE html>
     *         <html lang="en">
     *         <head>
     *         <meta charset="UTF-8">
     *         <meta name="viewport" content="width=device-width, initial-scale=1.0">
     *         <title>Document</title>
     *         </head>
     *         <body>
     *              <p>Hello World</p>
     *         </body>
     *         </html>
     *      - Tambahkan code pada file web seperti:
     *        Route::get('/greeting', function(){
     *          return view('example');
     *        });
     * 
     *    c) Controller:
     *       - Mengatur alur aplikasi, menghubungkan model dan view.
     *       - Menangani permintaan HTTP dari pengguna dan mengembalikan respons.
     *       - Menggunakan middleware untuk memfilter permintaan sebelum dan sesudah diproses.
     *       - Membuat controller dengan perintah 'php artisan make:controller nama_controller' di terminal.
     *       - Menulis kode PHP dalam controller untuk menangani permintaan HTTP. Contohnya:
     *         <?php
     *         namespace App\Http\Controllers;
     *         use Illuminate\Http\Request;
     *         use App\Models\Student;
     * 
     *         class StudentController extends Controller
     *         {
     *              public function show($id){
     *                  $name = Student::find($id)->name;
     *                  return view('example', ['name' => $name]);
     *              }
     *         }
     *       - Menghubungkan controller dengan URL dalam file routes/web.php. Seperti:
     *         (127.0.0.1:8000/greeting/1).
     */
?>
