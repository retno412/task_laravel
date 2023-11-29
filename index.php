<?php

// Nama : Azhar Nurulhaifa
// NIM  : 2202521
// Kelas: 3A PSTI 
// Mata Kuliah : Pemrograman Internet 

// RANGKUMAN MIGRATION, SEEDER DAN MVC LARAVEL FRAMEWORK

// 1. MIGRATION 
//    Migration dalam laravel merupakan fitur yang membantu dalam mengelola database dengan menggunakan kode dan berfungsi untuk menjalankan DDL (Data Definition Language). Dengan migration kita bisa membuat (create), mengubah (edit) dan menghapus (delete) struktur dan kolom tabel dalam database dengan cepat dan mudah.
//    Cara menggunakan Migration diantaranya :
//    Create 
//    Dengan create kita bisa membuat tabel dan kolom baru ke dalam database dengan menggunakan kode dengan cara :
//    a. Buka folder laravel
//    b. Samakan data yang ada di .env dengan data database kita
//    c. Masukkan kode [php artisan make:migration create_(nama tabel)] ke dalam terminal
//    d. Nanti akan muncul file baru yang menampung tabel baru untuk database.
//    e. Masukkan struktur tabel apa saja yang ingin dimasukkan ke database dengan contoh kode sebagai berikut :

//    public function up()
//     {
//         Schema::create('students', function (Blueprint $table) {
//             $table->id();
//             $table->string('name');
//             $table->integer('score');
//             $table->timestamps();
//         });
//     }

//     f. Masukkan kode php artisan migrate atau php artisan migrate:fresh untuk update.

// 2. Seeder 
//    Seeder dalam laravel berfungsi untuk menjalankan DML (Data Manipulation Language). Seeder berguna untuk inisiasi data tabel di awal atau bisa juga untuk memperbarui data yang sudah ada atau menghapusnya.
//    Langkah langkah dalam membuat seeder :
//    a. Masukkan kode [php artisan make:seeder (namaseeder)] untuk membuat sebuah file seeder.
//    b. Nanti akan muncul file seeder dalam bentuk php 
//    c. Masukkan kode [php artisan make:seeder (nama tabel)] ke terminal untuk membuat file seeder.
//    d. Masukkan data ke dalam file seeder tersebut
//    Contoh kode :
//    public function run()
//     {
//         $faker = Faker::create();
//         $data = [
//             ['id' => 1, 'name' => 'Azhar', 'score' => 80],
//             ['id'=> 2, 'name'=> 'Nurul', 'score'=> 85],
//             ['id'=> 3, 'name'=> 'Haifa', 'score'=> 90],
//         ];

//         for ($i = 4; $i<= 75; $i++) {
//             $data[] = [
//                 'id' => $i,
//                 'name' => $faker->name,
//                 'score' => $faker ->numberBetween(75, 100)
//             ];
//         }

//         DB::table('students')->insert($data);
//     }
//     e. Jalankan perintah [php artisan db:seed] untuk memasukkan data ke database.

// 3. MVC 
//    MVC memisahkan aplikasi berdasarkan komponen - komponen aplikasi, seperti : manipulasi data, contorller dan user interface.
//    a. Model 
//       Model mewakakili struktur data. Model berisi fungsi fungsi yang membantu dalam pengelolaan basis data seperti memasukkan data ke database, update data dan lain lain.
//    b. View 
//       View adalah bagian yang mengatur tampilan ke pengguna atau berupa halaman web.
//    c. Controller 
//       Controller merupakan bagian yang menjebatani model dan view.
   
//    Langkah langkah dalam menjalankan MVC :
//    a. Model 
//       - Masukkan kode [php artisan make:model (nama tabel)] untuk membuat file model baru.
//     b. Router 
//        - Buka file web.php yang ada dalam folder routes.
//        - Masukkan kode yang ingin ditampilkan dalam web nantinya.
//          Contoh kode :
//          Route::get('/a', function () {
//             return view('welcome');
//         });
//        - Masukkan kode [php artisan serve] di terminal kemudian buka link laravel nya dan ketikan kata yang ada dalam route setelah '/' (di contoh itu /greeting).
//     c. Views 
//        - Tambahkan file baru dalam folder resources kemudian dalam folder views dengan format (nama).blade.php 
//        - Masukkan kode html ke dalam file baru tersebut
//        - Buka file web.php lagi dan masukkan kode route lagi.
//          Contoh kode:
//          Route::get('/greeting', function(){
//             return view('example');
//          });
//        - Jalankan lagi [php artisan serve] dan masukkan kode '/' ke link laravelnya
//     d. Controller 
//        - Membuat file controller baru dengan menggunakan kode [php artisan make:controller (nama)Controller]
//        - Setelah muuncul file baru maka masukkan kode yang akan mengatur apa yang ingin kita tampilkan dalam web nantinya.
//          Contoh kode :
//         use Illuminate\Http\Request;
//         use App\Models\Student;

//         class StudentController extends Controller
//         {
//             public function show($id){
//             $name = Student::find($id)->name;
//             return view('example', ['name'=> $name]);
//             }
//         }
//        - Ubah file html agar bisa memanggir controller, seperti :
//          <p>Hi, {{$name}}!</p>
//        - Buka file web.php dan masukkan  kode :
//         use App\Http\Controllers\StudentController;
//         use Illuminate\Support\Facades\Route;

//         Route::get('/greeting/{id}', [StudentController::class, 'show']);
//         - Jalankan lagi kode [php artisan serve] dan masukkan '/' serta '/' tambahannya, seperti :
//         http://127.0.0.1:8000/greeting/2 (angka dibelakang menunjuk pada id)