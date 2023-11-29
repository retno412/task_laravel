<!-- <?php
// Nama: Meyda Al Zahra
// NIM: 2208981
// Kelas: 3B PSTI
// NOTE LARAVEL

// MIGRATION
//     sebuah fitur yang dapat membantu kita mengelola database secara efisien dengan menggunakan kode. 
// Migration membantu kita dalam membuat (create), mengubah (edit), dan menghapus (delete) struktur tabel dan kolom pada database milik kita dengan cepat dan mudah.
// Dan dapat melakukan perubahan pada struktur database tanpa harus menghapus data yang ada.
// Langkah-langkah:
// 1. Buka file/database saat anda mengunduh laravel
// 2. klik dibagian migration
// 3. jalankan terminal dan tulis php artisan make:migration create_student_table
// 4. lalu pergi kebagian .env untuk konfigurasi database sesuai database yang kita punya
// 5. dan migration pun selesai
// contoh:
// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('students', function (Blueprint $table) {
//             $table->id();
//             $table->string('name');
//             $table->integer('score');
//             $table->timestamps();
//         });
//     }

    /**
     * Reverse the migrations.
     */
//     public function down(): void
//     {
//         Schema::dropIfExists('students');
//     }
// };

// SEEDER
//     Bagian dari fitur Database Seeder pada Laravel yang memungkinkan Anda membuat data awal atau dummy data yang dapat digunakan saat pengembangan, pengujian, atau untuk tujuan lain.
// Digunakan untuk mengisi basis data dengan data uji atau data awal yang diperlukan untuk menguji aplikasi atau memulai pengembangan.
// Langkah-langkah:
// 1. klik seeders dibagian menu
// 2. buka terminal baru dan masukkan php artisan make:seeder StudentSeeder untuk membuat seeder baru
// 3. memasukkan data pada database
// 4. buak terminal kembali masukkan php artisan db:seed --class=StudentSeeder agar perubahan pada database dapat berubah
// 5. database sudah terisi 
// contoh:
// class StudentSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run()
//     {
//         //ketik masing-masing
//         // $data = [
//         //     ['id'=>1, 'name' => 'Meyda', 'score'=> 80],
//         //     ['id'=>2, 'name' => 'Al', 'score'=> 85],
//         //     ['id'=>3, 'name' => 'Zahra', 'score'=> 90],
//         // ];
//         $faker = Faker::create();

        
//         for ($i = 0; $i <= 50; $i++) {
//             $data[] = [
//                 'id' => $i,
//                 'name' => $faker->name,
//                 'score' => $faker->numberBetween(60, 100), 
//             ]; 
//         } 
//     DB::table('students')->insert($data);
//     }
// }

// MVC Laravel Framework
//     MVC, singkatan dari Model-View-Controller, adalah sebuah paradigma desain perangkat lunak yang bertujuan untuk memisahkan aplikasi menjadi tiga komponen utama, yaitu Model, View, dan Controller. 
// Tujuan utama dari pendekatan ini adalah untuk meningkatkan modularitas, mempermudah pemeliharaan, dan meningkatkan fleksibilitas dalam pengembangan perangkat lunak.
// Beberapa komponen pada MVC Laravel Framework:

// 1.)MODEL
//     Model merupakan salah satu komponen MVC yang berhubungan langsung dengan database. Di database sendiri model dipresentasikan tabel-tabel yang nantinya diisi dengan data. Model berisi atribut yang nantinya atribut tersebut menjadi kolom pada tabel database.
// Langkah-langkah:
// - klik models pada bagian menu
// - Buka terminal masukkan php artisan make:model Student untuk membuat file baru
// contoh:
// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Student extends Model
// {
//     use HasFactory;
// }


// 2.) ROUTING
//     Router merupakan bagian yang mengurusi pemetaan/mapping antara url dengan kontroler. Fungsi tersebut dituliskan dalam file yang berada folder routes yang bernama web.php
// Langkah-langkah:
// - klik routers pada bagian menu
// - klik bagian web.php
// - masukkan perubahan yang ingin diubah
// - buka terminal masukkan php artisan serve
// contoh:
// Route::get('/', function () {
//     return view('welcome');
// });
// // Route::get('/greeting', function () {
// //     return view('example');
// // });

// Route::get('/greeting/{id}', [StudentController::class, 'show']);

// 3.) VIEW
//     View merupakan file berisi kode yang akan menampilkan desain dari web kamu. Pada laravel, file view berada pada direktori resources>views. Format dari nama file view adalah [namaview].blade.php.
// contoh format view:
//     <!DOCTYPE html>
//     <html lang="en">
//     <head>
//         <meta charset="UTF-8">
//         <meta name="viewport" content="width=, initial-scale=1.0">
//         <title>Document</title>
//     </head>
//     <body>
//         <p>Hi, {{$name}}</p>
//     </body>
//     </html>

// 4.) CONTROLLER
//     Controller berisi method-method yang berisi perintah yang harus dilakukan pada suatu method. 
// Setelah Route menghubungkan ke controller dan method mana yang akan dituju, method suatu controller akan mengembalikan nilai atau tujuan url yang akan dituju. Pada laravel, direktori controller berada di app>Http>Controller.
// Langkah-langkah:
// 1. Open terminal
// 2. Buat file baru dengan nama "StudentController"
//     dengan perintah: 'php artisan make:controller StudentController'
//     Lalu dalam file menuliskan kode sesuai kebutuhan, seperti:
   // namespace App\Http\Controllers;
   // use Illuminate\Http\Request;
   // use App\Models\Student;
   // class StudentController extends Controller
   // {
   //     public function show($id){
   //     $name = Student::find($id)->name;
   //     return view('example', ['name'=> $name]);
   //     }
   // }
/**  -->