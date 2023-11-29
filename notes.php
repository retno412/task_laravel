<?php

Nama : Melvi Cantika 
NIM  : 2204830
Kelas: 3B PSTI

* MIGRATION *

Migration adalah sebuah fitur yang ada pada laravel, merupakan Control Version System 
untuk database dengan menggunakan migration untuk mengelola database dengan lebih mudah.

Untuk membuat migration caranya kita bisa menggunakan perintah yang disediakan oleh laravel yaitu php artisan .
Jangan lupa kita setting dulu di file .env untuk nama database agar bisa terkoneksi dengan laravel yang kita buat nanti.

Buka file .env dan sesuaikan seperti berikut :
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

langsung masuk ke terminal dan membuat migration database dengan mengetikkan perintah berikut :
- php artisan make:migration {nama_migration}

tambahkan field title dan content dengan tipe string seperti pada gambar berikut :
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

Jalankan perintah berikut untuk melakukan migration database. Seacara otomatis table blog akan ter create ke database.
- php artisan migrate

* SEEDER *
Seeding adalah suatu fitur yang sudah tersedia pada Laravel untuk memasukkan data kedalam database, baik itu satu data atau banyak data..
Data yang dimasukkan biasanya adalah data random atau data testing untuk kebutuhan development.

Untuk membuat seed, maka anda cukup menggunakan fitur menarik lainnya yakni : artisan command. 
Dengan artisan command anda dapat meng-generate file seeder hanya dengan sekali command dan ditempatkan pada direktori database/seeds. 
Untuk menjalankannya silahkan jalankan command berikut pada command line anda :
-php artisan make:seeder StudentSeeder

Perintah di atas akan membuat sebuah berkas baru dalam direktori database/seeds dengan nama StudentSeeder.php.
Secara bawaaan, berkas ini sudah berisi sebuah class untuk menjalankan seed tersebut, dilengkapi dengan dependecy class-nya.

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $data = [];

        for ($i = 0; $i < 40; $i++) {
            $data[] = [
                'name'  => $faker->name,
                'score' => rand(70, 90),
            ];
        }

        DB::table('student')->insert($data);
    }
}

Untuk menjalankannya, ketik perintah di bawah pada command line.
$ php artisan db:seed --class=StudentSeeder


* MVC *
1. Model: 
Bertugas untuk mengatur, menyiapkan, memanipulasi dan mengorganisasikan data (dari database)
sesuai dengan instruksi dari controller.Di database sendiri model dipresentasikan tabel-tabel yang nantinya diisi dengan data. 
Model berisi atribut yang nantinya atribut tersebut menjadi kolom pada tabel database.
kita dapat langsung menuliskan di terminal dengan perintah:
- php artisan make:model [namamodel]

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
}

2. Route : 
Router merupakan bagian yang mengurusi pemetaan/mapping antara url dengan kontroler. 
Fungsi tersebut dituliskan dalam file yang berada folder routes yang bernama web.php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/greeting', function () {
    return 'Hello world' ;
});
Route::get('/greeting', function () {
    return 'Hello world' ;
});

untuk menjalankan :
- php artisan serve

3. View : 
Bertugas untuk menyajikan informasi (yang mudah dimengerti) kepada user sesuai dengan instruksi dari controller.
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p> Hi, {{ $name }} ! </p>    
</body>
</html>
Route::get('/greeting/{id}', [StudentController::class, 'show']);

4. Controller : 
Bertugas untuk mengatur apa yang harus dilakukan model, dan view mana yang harus ditampilkan berdasarkan permintaan dari user. 
Namun, terkadang permintaan dari user tidak selalu memerlukan aksi dari model. Misalnya seperti menampilkan halaman form untuk registrasi user.
kita buat controller dengan perintah artisan dengan nama controller BelajarController.
- php artisan make:controller 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function show($id){
        $name = student::find($id)->name;
        return view ('example',['name'-> $name]);
    }
}

untuk menjalankan :
- php artisan serve

?>