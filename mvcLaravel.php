<?php

// Nama : Arifal Muhamad Iqbal
// NIM  : 2202397
// Kelas: 3A PSTI

// Resume materi Laravel

// Migration
// Migration digunakan untuk mengatur dan mengelola perubahan skema database. Ini memungkinkan pengembang untuk membuat, memodifikasi, dan menghapus tabel database serta indeks secara programatik, tanpa perlu langsung berinteraksi dengan database atau menjalankan skrip SQL secara manual.
//Migration memiliki dua fungsi utama diantaranya:
//1. Membuat tabel database
    //Migration dapat membuat tabel baru di database menggunakan migrasi. Ini melibatkan mendefinisikan kolom-kolom tabel beserta tipe data dan propertinya.
//2. Memodifikasi tabel database
    //Migration dapat  memodifikasi tabel yang sudah ada, seperti menambahkan kolom baru, menghapus kolom, atau mengubah tipe data kolom.
//Untuk menjalankan migration, Kita dapat menggunakan kode berikut:
php artisan migrate --name=create_users_table
// Cara membuat migration :
   // 1. Membuat file migration lalu buka terminal dan jalankan dengan perintah : php artisan make:migration namafileMigration
   // 2. Pada file contoh migration dapat dimasukkan code berikut :
   use Illuminate\Database\Migrations\Migration;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Support\Facades\Schema;
   
   return new class extends Migration
   {
       /**
        * Run the migrations.
        */
       public function up(): void
       {
           Schema::create('student', function (Blueprint $table) {
               $table->id();
               $table->string('name');
               $table->integer('score');
               $table->timestamps();
           });
       }
   
       /**
        * Reverse the migrations.
        */
       public function down(): void
       {
           Schema::dropIfExists('student');
       }
   };

// 2. Seeder
// Seeder digunakan untuk mengisi tabel-tabel di dalam basis data dengan data yang dapat digunakan untuk pengujian atau untuk memberikan nilai awal pada suatu aplikasi. Seeder ditulis dalam PHP dan menggunakan Laravel's Faker library untuk menghasilkan data  yang realistis.
//Seeder memiliki dua fungsi utama diantaranya:
//1. Pengisian data awal
    //Seeder digunakan untuk mengisi tabel dalam basis data dengan data awal, memastikan aplikasi memiliki data yang diperlukan untuk memulai.
//2. Pemeliharaan dan pembaharuan data
    //Seeder memudahkan pemeliharaan data, seperti menambah, memperbarui, atau menghapus data dalam basis data.
//Untuk menjalankan seeder, Kita dapat menggunakan kode berikut:
php artisan db:seed
// Cara membuat seeder :
    // 1. Membuat file seeder lalu buka terminal dan jalankan dengan perintah : php artisan make:seeder namafileSeeder
    // 2. Pada file contoh seeder dapat dimasukkan code berikut :
    namespace Database\Seeders;
    
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;
    use Faker\Factory as Faker;
    
    class StudentSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $faker = Faker::create();
            $data = [
                ['id'=> 1, 'name'=> 'Arifal', 'score'=> 80],
                ['id'=> 2, 'name'=> 'Muhamad', 'score'=> 85],
                ['id'=> 3, 'name'=> 'Iqbal', 'score'=> 90],
                ['id'=> 4, 'name'=> 'Rahmat', 'score'=> 95],
            ];     
            for ($i = 5; $i<= 69; $i++) {
                $data[] = [
                    'id' => $i,
                    'name' => $faker->name,
                    'score' => $faker ->numberBetween(69, 100)
                ];
            }
            DB::table('student')->insert($data);
        }
    }

    
// 3. MVC
//MVC adalah singkatan dari Model-View-Controller. Merupakan sebuah pola desain arsitektural yang digunakan dalam pengembangan perangkat lunak untuk memisahkan komponen utama aplikasi menjadi tiga bagian ini :
    //A). Model: Representasi dari data dan aturan bisnis aplikasi. Model bertanggung jawab untuk mengelola data, melakukan validasi, dan menerapkan logika aplikasi.
    // untuk melakukannya masukkan perintah di terminal berupa : "artisan make:model student"
    // setelah itu akan tercipta file Models pada folder dengan isi kodenya :
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    
    class Student extends Model
    {
        use HasFactory;
    }

    //B). View: Tampilan atau antarmuka pengguna aplikasi. View bertanggung jawab untuk menampilkan data kepada pengguna dan menerima input dari pengguna.
    // untuk melakukannya, buatlah new file pada folder views. dengan contoh nama file : "example.blade.php"
    // didalamnya berisikan dengan komponen-komponen html seperti ini :
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
                <p>Hello World!</p>
            </body>
            </html>
    // kemudian memasuki folder routes dan masuk ke sebuah file php dengan nama "web.php" dan isi dengan code berikut :
            
    route::get('/greeting', function () {
        return view('example');
    });

    //C). Controller: Pengendali atau perantara antara Model dan View. Controller menerima input dari pengguna, memprosesnya melalui Model, dan mengatur tampilan yang sesuai.
    // Controller berfungsi untuk mengelola alur kontrol aplikasi, menerima input, memproses logika aplikasi, dan memutuskan tampilan mana yang harus ditampilkan.
    // Untuk membuat file bukalah terminal kemudian masukan php artisan make:controller StudentController
    // file php StudentController isi dengan :
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    
    class StudentController extends Controller
    {
        //Ketik masing-masing
        public function show($id){
            $name = Student::find($id)->name;
            return view('example', ['name'=> $name]);
        }
    }

?>