Nama		: Aditya Arya Sukma
Kelas		: PSTI 3B
NIM		: 2204247

1. Migration
	Dalam konteks Laravel, "Migration" merujuk pada mekanisme yang digunakan
untuk mengelola struktur database. Migration memungkinkan Anda untuk mendefinisikan
perubahan struktur database menggunakan kode PHP,dan kemudian kita dapat
menerapkan perubahan ini ke database kita dengan mudah.

Berikut adalah perintah perintah terkait migration di Laravel:
1. Membuat Migration
	php artisan make:migration create_student_table(nama migration yang ingin kita buat)
2. Mengedit Migration
	Setelah migration dibuat, kita bisa mengedit untuk menentukan perubahan
apa yang ingin kita terapkan dalam database. misalnya menambah kolom, mengubah
tipe data. atau melakukan perubahan struktur databse lainnya.
3. Menjalankan Migration 
	php artisan migrate

catatan:	Untuk menjalankan dan membuat migration di lakukan di Terminal atau bash

contoh migration yang telah dibuat dan di edit

<?php

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
        Schema::create('students', function (Blueprint $table) {
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
        Schema::dropIfExists('students');
    }
};


2. Seeder
	Seeder adalah mekanisme untuk mengisi basis data dengan data awal
data uji. Contohnya, seeder digunakan untuk memasukkan beberapa data
ke dalam tabel agar kita bisa menguji fungsionalitas aplikasi kita.

Beberapa perintah dasar terkait seeder sebagai berikut:
1. Membuat Seeder
	php artisan make:seeder StudentSeeder (StudentSeeder adalah nama seeder kita)
2. Menjalankan Seeder
	php artisan db:seed --class=StudentSeeder

Berikut adalah contoh seeder yang pernah saya Buat:

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
        
        //Ketik masing-masing
        
        $data = [] ;
            for ($i = 4; $i < 100; $i++) {
            // ['id'=> 1,'name'=> 'Aditya', 'score'=> 80],
            // ['id'=> 2,'name'=> 'Arya', 'score'=> 85],
            // ['id'=> 3,'name'=> 'Sukma', 'score'=> 90],
        DB::table('students')->insert($data);
    }
}

itu adalah seeder untuk mengisi database yang telah kita migrasi.

3. Laravel Mvc Framework
	Laravel adalah framework PHP yang mengikuti pola MVC 
(Model-View-Controller). 

Berikut adalah konsep dasar dari MVC dalam konteks laravel:

1.) Model
	Model merepresantisakn struktur data dan logika aplikasi.
Model biasanya berinteraksi langsung dengan basis data, menangani operasi
seperti pengambilan data, penyimpanan data, dan validasi.
a. Impelementasi
	Dalam laravel, model adalah kelas PHP yang mewakili kelas dalam
basis data. Model membantu untuk melakukan operasi CRUD pada data kita.
b. cara membuat Model
	php artisan make:model
c. contoh model

	<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
}

2.) Views
	View berfungsi untuk Menampilkan informasi kepada Pengguna. Contohnya
untuk mengelola tampilan atau antarmuka pengguna dan menerjemahkan data
dari model ke tampilan yang dapat dimengerti oleh pengguna.
a. Implementasi
	Dalam Laravel, view adalah file file blade, yang merupakan template 
yang memungkinkan kita menyusun tampilan dengan mudah.Blade menyediakan
fitur-fitur seperti looping,kondisi, dan inheritance untuk mempermudah pembuatan
tampilan
b. Contoh Views yang telah saya buat

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

Nah untuk <p> $name itu adalah untuk memanggil nama dari database yang telah
kita buat, berdasarkan idnya. caranya dengan mengubah routes pada kelas web
sebagai berikut:

	Route::get("/greeting/{id}", [StudentController::class, "show"]);

nantinya ketika kita menuliskan /greeting/3, akan keluar nama
pada id ke 3 di database.

3.) Controller
	Controller berfungsi sebagai perantara antara model dan view. ini
mengatur alur logika aplikasi, menerima input dari pengguna melalui tampilan,
memproses data dari model, dan mengirimkan kembali tampilan kepada pengguna.
a. implementation
	Controller adalah kelas php yang menangani logika aplikasi bisnis.
controller memanipulasi data dari model dan menyahikan tampilannya
b. contoh penggunaan controller yang telah kita buat.

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function show($id){
        $nama = Student::find($id)->name;
        return view("example", ["name"=> $nama]);
    }
}

public function show adalah deklarasi fungsi 'show' yang menerima
parameter '$id'.

$nama = Student::find($id)->name; 

ini berfungsi mencari data mahasiswa(Student) berdasarkan ID yang diberikan. Setelah itu
akan mengakses 'name' dari mahasiswa tersebut dan menyimpannya 
dalam variabel '$nama'

 return view("example", ["name"=> $nama]);

Baris ini mengembalikan tampilan dengan nama 'example'. data yang dikirimkan
ke tampilan adalah array asosiatif dengan kunci "name" dan nilai '$nama'
Artinya, di tampilan 'example', kita dapat menggunakan variabel '$nama'
untuk menampilkan nama mahasiswa tersebut
