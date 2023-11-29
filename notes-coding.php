<?php
/**
 * Rangkuman Laravel Framework
 * Editor by Ainun Permatasari
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
 * 1. MIgration
 * --------------------
 * Di dalam Laravel, migrasi adalah cara mengelola perubahan pada skema database seiring berjalannya waktu. 
 * Ini memungkinkan untuk menyesuaikan dan memelihara skema database agar selalu sejalan dengan kode aplikasi.
 *
 * Contoh Penggunaan:
 * - Buat migrasi baru dengan perintah: php artisan make:migration create_example_table
 * - Jalankan migrasi: php artisan migrate
 * - Batalkan migrasi terakhir: php artisan migrate:rollback
 *
 * Catatan: Berkas migrasi disimpan di dalam direktori database/migrations.
 * 
 * - Langkah-Langkahnya :
 * 1. Buka terminal
 * 2. Buat file migrasi baru untuk tabel mahasiswa: 'php artisan make:migration create_student_table'
 *    Laravel akan otomatis membuat berkas migrasi baru, misalnya '2023_11_27_000000_create_student_table.php', 
 *    dan menyimpannya di dalam direktori database/migrations. 
 * 3. Jalankan dengan perintah: 'php artisan migrate'
 * 4. Jika ingin membatalkan migrasi terakhir, gunakan: 'php artisan migrate:rollback'
 */
 
 /**
     * Contoh Code di dalamnya
     */
	 
//Migration ini mengatur pembuatan dan penghapusan tabel 'student' pada database.
use Illuminate\Database\Migrations\Migration; //kode ini menggunakan fungsi bawaan Laravel
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //Dalam kode ini, terdapat satu method 'up()' yang menjalankan perintah SQL untuk membuat tabel 'student'. Tabel ini memiliki beberapa kolom:
    public function up(): void
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id(); //berupa angka bulat, dan bertipe data auto increment, yang berfungsi sebagai primary key.
            $table->string('name'); //berupa string, yang menyimpan nama siswa.
            $table->integer('score'); //berupa angka bulat, yang menyimpan skor siswa.
            $table->timestamps(); //dua kolom bertipe timestamp (created_at dan updated_at) yang berfungsi menyimpan tanggal dan waktu pembuatan dan pembaharuan data.
        });
    }

    /**
     * Reverse the migrations.
     */
    //method lain yang disebutkan di sini, yaitu 'down()'. Method ini akan membalikkan operasi yang dilakukan oleh method 'up()', yaitu menghapus tabel 'student' pada database.
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
//Fungsi dan penggunaan kode ini akan berubah saat perintah 'php artisan migrate' dijalankan pada terminal. Jika perintah tersebut dijalankan untuk pertama kalinya, maka akan membuat tabel 'student' pada database. Jika perintah tersebut dijalankan kembali, maka akan menghapus tabel 'student' yang sudah ada pada database.

/**
 * 2. Seeder
 * ----------------------
 * Seeder di Laravel adalah alat yang sangat berguna untuk memasukkan data awal yang telah ditentukan 
 * ke dalam database dengan cepat dan mudah. Seeder sering digunakan bersamaan dengan migrasi 
 * untuk menciptakan lingkungan pengujian yang konsisten.
 *
 * Contoh Penggunaan:
 * - Buat seeder baru: php artisan make:seeder ExampleTableSeeder
 * - Jalankan seeder: php artisan db:seed --class=ExampleTableSeeder
 *
 * Pesan: Berkas seeder disimpan di dalam direktori database/seeders.
 * 
 * - Langkah-Langkah: 
 * 1. Buka terminal
 * 2. Buat berkas Seeder baru dengan nama "StudentSeeder" 
 *    menggunakan perintah: 'php artisan make:seeder StudentSeeder' 
 * 3. Jalankan Seeder dengan perintah: 'php artisan db:seed --class=StudentSeeder'
 */
 
 /**
     * Contoh Code di dalamnya
     */

//Seeder ini mengisi tabel 'student' dengan data siswa yang secara random dibuat oleh Laravel Faker.
    namespace Database\Seeders;

    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;
    use Faker\Factory as Faker; //fungsi bawaan Laravel seperti use Faker\Factory as Faker; untuk menggunakan Laravel Faker.

    class StudentSeeder extends Seeder
    {
    /**
     * Run the database seeds.
     * @return void
     */
    //method 'run()' yang menjalankan perintah untuk mengisi tabel 'student' dengan data siswa yang secara random dibuat oleh Laravel Faker. Data ini akan berisi:
    public function run() //Dalam method 'run()', kode menggunakan variabel 'data' untuk menampung data siswa yang akan diisi ke tabel 'student'. Variabel ini berisi array kosong, yang nantinya akan diisi dengan data siswa.
    {
        $data = [];
        $faker = Faker\Factory::create();

        $data = [];
            for ($i = 3; $i < 55; $i++) {
                $data[] = [
                    'id' => $i + 1, //berupa angka bulat, yang berfungsi sebagai primary key.
                    'name'  => $faker->name, //berupa string, yang menyimpan nama siswa yang secara random dibuat oleh Laravel Faker.
                    'score' => rand(58, 100), //berupa angka bulat, yang menyimpan skor siswa yang secara random dibuat oleh Laravel Faker antara 58 dan 100.
                ];
            }
        DB::table('student')->insert($data);
        //Kode ini akan mengisi tabel 'student' dengan data siswa yang secara random dibuat oleh Laravel Faker. Jika Anda ingin mengganti data yang akan diisi ke tabel 'student', Anda bisa mengubah bagian yang menjalankan perintah 'for'.
    }
}
//Untuk menjalankan seeder ini, Anda bisa menjalankan perintah 'php artisan db:seed --class=StudentSeeder' pada terminal. Perintah ini akan mengisi tabel 'student' dengan data siswa yang secara random dibuat oleh Laravel Faker.

/**
 * 3. Model-View-Controller (MVC)
 * ------------------------------
 * MVC merupakan pendekatan dalam pengembangan perangkat lunak yang memisahkan logika aplikasi dari tampilan.
 * Pendekatan ini memisahkan komponen aplikasi ke dalam tiga bagian utama:
 * - Model: Mewakili struktur data dan berfungsi dalam pengelolaan basis data seperti penambahan atau pembaruan data.
 * - View: Bertanggung jawab atas tampilan yang diberikan kepada pengguna, sering berbentuk halaman web atau antarmuka.
 * - Controller: Menjadi penghubung antara model dan view dalam mengatur aliran data dan interaksi pengguna.
 * 
 * Contoh Penggunaan:
 *   - Buat controller baru: php artisan make:controller ExampleController
 *   - Definisikan rute di web.php untuk menghubungkan controller dengan view.
 *
 * Pesan: Berkas Controller disimpan di dalam direktori app/Http/Controllers.
 * 
 * * 1) Database
 * -----------
 * Mengatur koneksi ke database yang terhubung ke localhost dalam file .env:
 */
            // DB_CONNECTION=mysql
            // DB_HOST=127.0.0.1
            // DB_PORT=3307
            // DB_DATABASE=belajar-laravel
            // DB_USERNAME=root
            // DB_PASSWORD=

 // * Lalu membuat migrasi database dengan menjalankan: 'php artisan make:migration create_student_table'
// * Setelah itu, membuat penanaman data ke database dengan menjalankan: 'php artisan make:seeder StudentSeeder'

/* 2) Model
* ---------
* Untuk Membuat model baru: 'php artisan make:model nama_model'
*
* - Langkah-Langkahnya:
* 1. Buka terminal
* 2. Buat model baru dengan nama "Student"
*    dengan menjalankan: 'php artisan make:model Student'
*    Kemudian dalam berkas ini, Anda dapat menulis kode sesuai kebutuhan.
*/ 
    <?php

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
    Route::get('/greeting/tata', function () {
        return 'Hello'. $name;
    });
    Route::get('/greeting/{id}', [StudentController::class, 'show']);
/** 
 * 4) Jalankan server dengan menggunakan perintah: 'php artisan serve'
 *    Kemudian akan muncul respons 'Server running on [http://127.0.0.1:8000]'.
 *    Anda dapat menyalin URL atau tautannya, lalu tempelkan di browser.
 *    Gunakan URL ini pada rute seperti '/' dan '/greeting' setelah tautan akhir server.
 *    Contoh: 'http://127.0.0.1:8000/greeting' 
 * 
 * 5) Untuk menghentikan server, gunakan perintah: 'Ctrl+C'
 *    Pesan:
 *    - Ketika pengguna mengakses URL '/', server akan membalas dengan 'welcome' sebagai halaman web.
 *    - Ketika pengguna mengakses URL '/greeting', server akan merespons dengan mengirimkan teks "Hello World" sebagai halaman web.
 *    - Ketika pengguna mengakses URL '/greeting/tata', server akan merespons dengan mengirimkan teks "Hello tata" sebagai halaman web.
 * 
 * 3) Views
 * --------------
 * - Untuk Membuat berkas baru di views dengan menggunakan ekstensi: '.blade.php'
 * - Menggunakan Blade Templates
 * 
 * - Langkah-Langkahnya:
 * 1. Buat berkas baru dengan nama "example"
 *    menggunakan: 'example.blade.php'
 *    Lalu di dalam berkas ini, Anda dapat menulis kode sesuai kebutuhan.
 */
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <p>Hi, {{ $name }} !</p>
    </body>
    </html>
/** 
 * 4) Controllers
 * ----------------
 * - Dibutuhkan pembuatan berkas baru dengan perintah: 'php artisan make:controller nama_file'
 *   
 * - Langkah-Langkahnya:
 * 1. Buka terminal
 * 2. Buat berkas baru dengan nama "StudentController"
 *    dengan perintah: 'php artisan make:controller StudentController'
 *    Lalu di dalam berkas ini, Anda dapat menulis kode sesuai kebutuhan.
 */
    <?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Student;

    class StudentController extends Controller
    {
        public function show($id){
            $name = Student::find($id)->name;
            return view('example', ['name'=> $name]);
        }
    }
/** 
 * 5) Jalankan server dengan perintah: 'php artisan serve'
 *    Kemudian pada terminal, akan muncul respons 'Server running on [http://127.0.0.1:8000]'.
 *    Anda dapat menyalin URL atau tautannya, lalu tempelkan di browser.
 *    Gunakan URL ini pada rute seperti '/' dan '/greeting' setelah tautan akhir server.
 *    Contoh: 'http://127.0.0.1:8000/greeting{1}' 
 * 
 * 6) Untuk menghentikan server, gunakan perintah: 'Ctrl+C'
 *    Pesan:
 *    - Ketika pengguna mengakses URL '/greeting{id}', server akan merespons dengan mengirimkan teks "Hi, tata !" sebagai halaman web.
 *    - Nama yang muncul akan sesuai dengan ID yang dimasukkan sebelumnya dan server akan mengakses ID tersebut untuk menghubungkan nama di database, yang akan menampilkan nama seperti "tata" sesuai dengan yang dimasukkan sebelumnya.
 */