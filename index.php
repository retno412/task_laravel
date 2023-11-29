<?php

/*
|--------------------------------------------------------------------------
| Catatan Koding Laravel
|--------------------------------------------------------------------------
|
| File PHP ini berisi catatan dasar tentang Migration, Seeder, dan MVC dalam
| framework Laravel.
|
*/

// -----------------------------------------------------------------------------
// 1. Migration
// -----------------------------------------------------------------------------

/*
|--------------------------------------------------------------------------
| Membuat Migration
|--------------------------------------------------------------------------
| Untuk membuat migration, Anda dapat menggunakan perintah Artisan berikut:
| 
|   php artisan make:migration create_table_name
|
| Ini akan menghasilkan file migration baru di direktori 'database/migrations'.
| Kemudian, Anda dapat mendefinisikan skema tabel dan menggunakan migration
| untuk membuat tabel di database.
*/

// Contoh File Migration: database/migrations/2023_11_29_000000_create_example_table.php
/*
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExampleTable extends Migration
{
    public function up()
    {
        Schema::create('example', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('example');
    }
}
*/

// -----------------------------------------------------------------------------
// 2. Seeder
// -----------------------------------------------------------------------------

/*
|--------------------------------------------------------------------------
| Membuat Seeder
|--------------------------------------------------------------------------
| Seeder digunakan untuk mengisi data awal ke dalam tabel database. Gunakan
| perintah Artisan berikut untuk membuat seeder:
| 
|   php artisan make:seeder SeederName
|
| Setelah membuat seeder, Anda dapat menentukan data apa yang ingin Anda masukkan
| ke dalam tabel dalam metode 'run' pada file seeder tersebut.
*/

// Contoh File Seeder: database/seeders/ExampleSeeder.php
/*
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExampleSeeder extends Seeder
{
    public function run()
    {
        DB::table('example')->insert([
            'name' => 'Contoh Data',
        ]);
    }
}
*/

// -----------------------------------------------------------------------------
// 3. MVC (Model-View-Controller)
// -----------------------------------------------------------------------------

/*
|--------------------------------------------------------------------------
| Struktur MVC
|--------------------------------------------------------------------------
| Laravel mengikuti pola desain MVC yang memisahkan logika bisnis (Model),
| presentasi (View), dan pengendalian (Controller). Setiap bagian memiliki
| tanggung jawab tertentu untuk memastikan aplikasi terorganisir dengan baik.
|
| - Model: Representasi data dan logika bisnis.
| - View: Tampilan atau antarmuka pengguna.
| - Controller: Mengatur permintaan pengguna dan berinteraksi dengan Model dan View.
|
| File-file tersebut umumnya ditempatkan di direktori 'app' sesuai dengan struktur
| namespace yang sesuai dengan struktur MVC.
*/

// Contoh Model: app/Models/Example.php
/*
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    protected $table = 'example';
    protected $fillable = ['name'];
}
*/

// Contoh Controller: app/Http/Controllers/ExampleController.php
/*
namespace App\Http\Controllers;

use App\Models\Example;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index()
    {
        $examples = Example::all();
        return view('example.index', compact('examples'));
    }
}
*/

// Contoh View: resources/views/example/index.blade.php
/*
<!DOCTYPE html>
<html>
<head>
    <title>Contoh Data</title>
</head>
<body>
    <h1>Daftar Contoh Data</h1>
    <ul>
        @foreach ($examples as $example)
            <li>{{ $example->name }}</li>
        @endforeach
    </ul>
</body>
</html>
*/