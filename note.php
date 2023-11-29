<?php
    //Tugas membuat catatan tentang 
    //Migration
    //Seeder
    //MVC

    //Nama  : Moh Fauzan Fakhira N
    //NIM   : 2201322
    //Kelas : 3B PSTI

    //1. Migration
    //   Migration adalah sebuah fitur yang dapat membantu kita mengelola database secara efisien dengan menggunakan kode
    //Berikut contoh kodenya :
   // <?php

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


//2. Seeder
//Seeder digunakan untuk mengisi data awal ke dalam database
//Berikut contoh kodenya :
//<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 50; $i++) {
            DB::table('students')->insert([
                'id' => $i,
                'name' => $faker->name,
                'score' => $faker->numberBetween(1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

//3. MVC
//Model : Mewakili struktur data dan logika aplikasi.
//Berikut  Contoh Kodenya :
//<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
}

//VIEWS : Bertanggung jawab untuk menampilkan informasi kepada pengguna.
//Berikut Kodenya : 
//<!DOCTYPE html>
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

//CONTROLER : Menangani input pengguna, memproses data dari model, dan merender tampilan.
//Contoh Kode :
//<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function show ($id){
        $name = Student::find($id)->name;
        return view('example', ['name'=> $name]);
    }
}
