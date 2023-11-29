<?php

// 1. Migration

// Migration pada Laravel merupakan sebuah fitur yang dapat membantu kita 
// mengelola database secara efisien dengan menggunakan kode. 
// Migration membantu kita dalam membuat (create), mengubah (edit), dan menghapus (delete) 
// struktur tabel dan kolom pada database milik kita dengan cepat dan mudah.

//  A. Tata cara Migration
 
//     a. Membuat Migration
//     Untuk membuat migrasi baru, Anda dapat menggunakan perintah Artisan berikut (ketik di terminal!!):
//     php artisan make:migration nama_migrasi

//     b. Mengedit Migration
//     Buka file migrasi yang baru dibuat, dan Anda akan menemukan dua metode utama: up dan down. 
//     Metode up digunakan untuk mendefinisikan perubahan yang ingin Anda terapkan ke database, 
//     sementara metode down digunakan untuk membatalkan perubahan tersebut.

//     Contoh migrasi sederhana yang menambahkan kolom ke tabel dapat terlihat seperti ini:

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
    
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->integer('score');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
};

    // c. Menjalankan Migrasi:
    // Setelah Anda mendefinisikan migrasi, 
    // Anda perlu menjalankannya untuk menerapkan perubahan ke database. Gunakan perintah (ketik di terminal!!):
    // php artisan migrate

    // Laravel akan secara otomatis melacak migrasi mana yang telah dijalankan 
    // sehingga Anda tidak perlu khawatir tentang perubahan yang ganda.

//  2. Seeders
//  Seeder pada Laravel merupakan merupakan sebuah class 
//  yang memungkinkan kita sebagai web developer untuk 
//  mengisi database kita dengan data awal atau dummy 
//  data yang telah ditentukan secara otomatis.

//  A. Tata cara membuat Seeders
    
//     a. Membuat Seeder baru
//     Untuk membuat seeder baru, gunakan perintah Artisan berikut (ketik di terminal!!):
//     php artisan make:seeder NamaSeeder
//     Ini akan membuat file seeder baru di dalam direktori 'database/seeders'.

//     b. Edit File Seeder
//     Buka file seeder yang baru dibuat, dan temukan metode run. 
//     Di sinilah Anda mendefinisikan data yang akan dimasukkan ke dalam tabel. 
//     Contoh sederhana mungkin terlihat seperti ini:

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
        $data = [];
        for ($i = 3; $i < 50; $i++){
            $data[]= [
                // ['id' => 1, 'name' => 'Ahmad', 'score' => 90],
                // ['id' => 2, 'name' => 'Sayyid', 'score' => 95],
                'id' => $i + 1, 'name' => $faker->name(), 'score' => $faker->numberBetween(70, 90)
            ];};
        DB::table('student')->insert($data);
    }
}

//     c. Jalankan Perintah Seeder
//     Terakhir, untuk menjalankan semua seeders, gunakan perintah (ketik di terminal!!):
//     php artisan db:seed
//     Jika Anda hanya ingin menjalankan satu seeder tertentu, Anda dapat menggunakan opsi '--class' (ketik di terminal!!):
//     php artisan db:seed --class=NamaSeeder
//     Dengan langkah-langkah ini, data yang Anda definisikan dalam seeder akan 
//     dimasukkan ke dalam tabel yang sesuai dalam database Anda.


//  3. MVC Laravel Framework
//  MVC adalah singkatan dari Model, View, Controller. 
//  Ini adalah sebuah desain arsitektur yang membagi pengembangan website menjadi tiga bagian.

//     a. Models
//     Definisi: Model merepresentasikan struktur data dan logika bisnis aplikasi. 
//     Dalam Laravel, model biasanya terkait langsung dengan tabel dalam database.
//     Fungsi Utama: Model bertanggung jawab untuk mengelola data, 
//     melakukan operasi database seperti menyimpan, mengambil, dan memperbarui data, 
//     serta menerapkan logika bisnis aplikasi.
//     Lokasi: Model umumnya ditempatkan dalam direktori 'app\Models'.
//     Contoh Model Laravel:

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
}
    
    // b. View
    // Definisi: View menangani tampilan atau presentasi data kepada pengguna. 
    // Dalam konteks Laravel, view sering kali adalah file-template Blade yang mendefinisikan struktur HTML dan tampilan.
    // Fungsi Utama: View bertanggung jawab untuk menampilkan data kepada pengguna dan menerima input dari mereka.
    // Lokasi: View dapat ditempatkan dalam direktori 'resources\views'. 
    // Contoh View Blade Laravel:

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

    // c. Controller
    // Definisi: Controller adalah perantara antara model dan view. 
    // Controller mengelola logika aplikasi dan mengatur bagaimana data disiapkan dan ditampilkan.
    // Fungsi Utama: Controller menghubungkan input pengguna dengan operasi 
    // yang dilakukan pada model dan menentukan tampilan mana yang harus ditampilkan.
    // Lokasi: Controller umumnya ditempatkan dalam direktori 'app\Http\Controllers'.
    // Contoh Controller Laravel:

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
    
class StudentController extends Controller
{
    // Ketik Masing - masing
    public function show($id){
        $name = Student::find($id)->name;
        return view('example', ['name'=> $name]);
    }
}
