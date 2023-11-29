<?php

/*
|--------------------------------------------------------------------------
| Migration di Laravel
|--------------------------------------------------------------------------
|
| - Migration digunakan untuk mendefinisikan dan memanipulasi struktur tabel database.
| - Mereka memungkinkan Anda untuk mengubah skema database seiring waktu, membuatnya terkontrol versi.
| - Perintah Artisan untuk membuat migration: `php artisan make:migration <NamaMigration>`
| - File migration disimpan dalam direktori `database/migrations`.
| - Untuk menjalankan migration dan memperbarui database: `php artisan migrate`
| - Mengembalikan rollback migration database terakhir: `php artisan migrate:rollback`
|
*/

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

/*
|--------------------------------------------------------------------------
| Seeder di Laravel
|--------------------------------------------------------------------------
|
| - Seeder digunakan untuk mengisi tabel database dengan data contoh atau default.
| - Perintah Artisan untuk membuat seeder: `php artisan make:seeder <NamaSeeder>`
| - File seeder disimpan dalam direktori `database/seeders`.
| - Untuk menjalankan seeder: `php artisan db:seed`
| - Kelas `DatabaseSeeder` adalah seeder default, sering digunakan untuk memanggil seeder lain.
|
*/

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
require_once 'vendor/autoload.php';

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $data = [
            ['id'=> 1, 'name'=> 'Herfian Muhammad', 'score'=> 80],
            ['id'=> 2, 'name'=> 'Triana Dewinta Sari', 'score'=> 90],
            ['id'=> 3, 'name'=> 'Triani Hartika Suri', 'score'=> 90],
        ];     
        for ($i =4; $i<=50; $i++) {
            $data[] = [
                'id' => $i,
                'name' => $faker->name,
                'score' => $faker ->numberBetween(0, 100)
            ];
        }
        DB::table('students')->insert($data);
    }
}

/*
|--------------------------------------------------------------------------
| Model di Laravel
|--------------------------------------------------------------------------
|
| - Model merepresentasikan data dan logika bisnis dalam aplikasi Laravel.
| - Eloquent, ORM di Laravel, memudahkan interaksi dengan database.
| - Model disimpan dalam direktori `app/Models`.
| - Perintah Artisan untuk membuat model: `php artisan make:model <NamaModel>`
|
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
}

/*
|--------------------------------------------------------------------------
| Controller di Laravel
|--------------------------------------------------------------------------
|
| - Controller menangani logika aplikasi dan menghubungkan model dengan view.
| - File controller disimpan dalam direktori `app/Http/Controllers`.
| - Perintah Artisan untuk membuat controller: `php artisan make:controller <NamaController>`
|
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //Ketik maisng-masing
    public function show($id) {
        $name = Student::find($id)->name;
        return view('example', ['name' => $name]);
    }
}

/*
|--------------------------------------------------------------------------
| View di Laravel
|--------------------------------------------------------------------------
|
| - View menangani tampilan atau antarmuka pengguna.
| - File view disimpan dalam direktori `resources/views`.
| - Di sini, kita asumsikan ada file view: `example.blade.php`.
|
*/

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hi, {{$name}}</h1>
</body>
</html>

?>

