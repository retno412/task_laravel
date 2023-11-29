<?php

// NIM: 2207007
// Nama: Azzahra Salsabilla
// Kelas: 3A PSTI

// RANGKUMAN LARAVEL 

// MIGRATIONS
// Migrations adalah file yang berisi kode SQL untuk membuat, mengubah, atau menghapus tabel di database. 
// Digunakan untuk melacak skema database dan memastikan bahwa semua aplikasi menggunakan skema yang sama.
// Untuk membuat migrations, buka terminal dan arahkan ke direktori aplikasi.
// Kemudian, buka direktori database/migrations.
// Terakhir, jalankan perintah:
php artisan make:migration <nama_migrasi>.


// SEEDERS 
// Seeder adalah file PHP yang digunakan untuk mengisi database dengan data uji. 
// Seeder dapat digunakan untuk mengisi database dengan data dummy, data yang digunakan untuk menguji aplikasi.
// Untuk membuat seeder, Anda dapat menggunakan perintah: 
php artisan make:seeder <nama_seeder>
// Perintah ini akan membuat file seeder baru di direktori database/seeds. 
// Nama file seeder akan mengikuti format:
<nama_seeder>Seeder.php.
// Contoh:
// Buka terminal dan navigasi ke direktori proyek Laravel.
// Jalankan perintah untuk membuat file seeder bernama StudentSeeder.php yaitu:
php artisan make:seeder StudentSeeder
// Perintah ini akan menghasilkan file baru bernama StudentSeeder.php di dalam direktori database/seeds.
// Implementasi Kode Seeder dengan cara buka file StudentSeeder.php di editor, lalu masukkan kode berikut:
<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 3; $i <= 50; $i++) {
            $data[] = [
                'id' => $i,
                'name' => $faker->name,
                'score' => $faker->numberBetween(50, 100),
            ];
        }
        DB::table('students')->insert($data);
    }
}
// Untuk menjalankan seeder dan mengisi tabel students dengan data dummy, jalankan perintah:
php artisan db:seed
// Perintah ini akan menjalankan semua seeder yang belum dijalankan.


// MVC LARAVEL FRAMEWORK
// MVC Laravel Framework adalah kerangka kerja aplikasi web PHP yang mengikuti pola desain Model-View-Controller (MVC). 
// Pola MVC membagi aplikasi menjadi tiga bagian:

// 1. Model
// Model adalah kelas PHP yang mewakili data aplikasi. 
// Model bertanggung jawab untuk berinteraksi dengan database dan mengambil serta menyimpan data.
// Model biasanya dipetakan ke tabel database. Setiap model memiliki properti yang sesuai dengan kolom di tabel database. 
// Model juga memiliki metode yang sesuai dengan operasi database, seperti insert(), update(), dan delete().
// Untuk membuat Model, dapat menggunakan perintah: 
php artisan make:model <nama_model>
// Nama model harus mengikuti format:
<nama_model>Model.php.

// 2. View
// View adalah file PHP yang bertanggung jawab untuk menampilkan data kepada pengguna. 
// View menghasilkan kode HTML yang dikirim ke browser.
// View biasanya dipetakan ke rute di aplikasi Laravel. 
// Setiap view memiliki nama yang sesuai dengan rute yang dipetakannya.
// Untuk membuat view baru, Anda perlu membuat file PHP di direktori resources/views. 
// Nama file view harus mengikuti format:
<nama_view>.blade.php.
// Setelah file view dibuat, dapat mulai mengisinya dengan kode. Contoh:
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
// Kode view di atas akan menampilkan teks "Hi, {{ $name }} !" di browser.
// Selanjutnya, membuat rute baru di file routes/web.php. Rute ini akan memaparkan view greeting dengan parameter id.
Route::get('/greeting/{id}', [StudentController::class, 'show']);
// Route::get(): Metode ini digunakan untuk membuat rute HTTP GET.
// /greeting/{id}: URL rute ini adalah /greeting/<id>.
// [StudentController::class, 'show']: Rute ini akan memanggil metode show() pada kelas StudentController.

// 3. Controller
// Controller adalah kelas PHP yang bertanggung jawab untuk menangani permintaan dari pengguna dan berinteraksi dengan model dan view. 
// Controller adalah "lem" yang menyatukan model dan view.
// Controller biasanya dipetakan ke rute di aplikasi Laravel. 
// Setiap controller memiliki nama yang sesuai dengan rute yang dipetakannya.
// Untuk membuat controller di Laravel, Anda dapat menggunakan perintah:
php artisan make:controller <nama_controller>
// Perintah ini akan membuat file controller baru di direktori app/Http/Controllers.
// Contoh:
// Pertama, buat controller baru dengan perintah 
php artisan make:controller StudentController. 
// Perintah ini akan membuat file controller baru bernama:
StudentController.php 
// di direktori app/http/Controllers. 
// Buka file StudentController.php dan tambahkan kode berikut:
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //ketik masing-masing
    public function show($id){
        $name = Student::find($id)->name;
        return view('example', ['name'=> $name]);
    }
}
// Kode ini akan membuat metode show() di controller StudentController. 
// Metode show() akan mengambil ID dari parameter id dan menggunakan model Student untuk mencari pengguna dengan ID tersebut. 
// Jika pengguna ditemukan, metode show() akan mengembalikan view example dengan nama pengguna sebagai data.
// Kode di atas harus diintegrasikan dengan view example.blade.php dan web.php.
// Jalankan aplikasi Laravel dengan perintah php artisan serve. Perintah ini akan memulai server lokal di port 8000.
// Buka browser Anda dan akses URL http://localhost:8000/greeting/20. URL ini akan menampilkan nama pengguna dengan ID 29.
