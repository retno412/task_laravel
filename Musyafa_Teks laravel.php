<?php

/**
 * 1. Migration
 * 
 * Migrasi dalam Laravel adalah sebuah fitur yang berfungsi
 * untuk mengelola struktur database aplikasi Laravel.
 * Migrasi memungkinkan kita untuk membuat, mengubah,
 * atau menghapus tabel dan kolom database dengan mudah.
 * 
 * 
 *  Meningkatkan kinerja database: Migrasi dapat dilakukan untuk mengubah struktur database sehingga lebih efisien.
 *  Menambahkan fitur baru: Migrasi dapat dilakukan untuk menambahkan fitur baru ke database.
 *  Memperbaiki bug: Migrasi dapat dilakukan untuk memperbaiki bug yang ada di database.

 * Migrasi dalam Laravel menggunakan konsep version control.
 * Setiap perubahan yang dilakukan pada struktur database
 * akan disimpan dalam sebuah file migration. File migration ini memiliki nama yang unik dan urut berdasarkan tanggal dan waktu pembuatannya.
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
            Schema::dropIfExists('student');
        }
    };

/**
 * 2. Seeder
 * 
 * Seeder adalah sebuah class yang digunakan untuk mengisi data ke dalam database.
 * Seeder biasanya digunakan untuk mengisi data dummy atau data awal ke dalam database.
 * 
 * 
 * Mempercepat pengembangan aplikasi: Seeder dapat digunakan untuk mengisi data dummy ke database sehingga Anda tidak perlu mengisi data secara manual.
 * Mempermudah testing: Seeder dapat digunakan untuk mengisi data nyata ke database sehingga Anda dapat melakukan testing aplikasi dengan lebih mudah.
 * Mempermudah backup data: Seeder dapat digunakan untuk membuat backup data database.

 * Seeder dalam Laravel dapat digunakan untuk mengisi data ke dalam tabel-tabel yang telah dibuat oleh migrasi.
 * Seeder dapat digunakan untuk mengisi data secara manual atau dengan menggunakan model factory.
 */

 require_once 'vendor/autoload.php';
 
 use Illuminate\Database\Console\Seeds\WithoutModelEvents;
 use Illuminate\Database\Seeder;
 use Illuminate\Support\Facades\DB;
 
 class StudentSeeder extends Seeder
 {
     /**
      * Run the database seeds.
      */
     public function run(): void
     {
         $faker = \Faker\Factory::create();
         //
         $data = [
             // ['id' => 2, 'name' =>'hikmat', 'score' =>98],
             // ['id' => 3, 'name' =>'kenny', 'score' =>78],
         ];
         for ($i=4; $i < 51; $i++) { 
             $data[] = ['id' => $i, 'name' => $faker->name(), 'score' => $faker->numberBetween(70,100)];
             # code...
         }
         DB::table('students')->insert($data);
     }
 }

/**
 * 3. MVC Laravel Framework
 * 
 * MVC Laravel Framework adalah sebuah framework PHP yang mengikuti pola arsitektur Model-View-Controller (MVC).
 * MVC adalah sebuah pola arsitektur yang memisahkan aplikasi web menjadi tiga bagian yang saling berhubungan: model, view, dan controller.
 * 
 * A. Model adalah bagian yang bertanggung jawab untuk mengakses dan menyimpan data dari database.
 * Model biasanya berupa class PHP yang mewakili tabel dalam database. Model mewakili data aplikasi. Ini menangani interaksi dengan database dan sumber data lainnya.
 * 
 * B. View adalah bagian yang bertanggung jawab untuk menampilkan data ke user. View biasanya berupa file HTML atau Blade template. selain itu
 *    View bertanggung jawab untuk menampilkan data kepada pengguna. Ini menghasilkan kode HTML, CSS, dan JavaScript yang menghasilkan antarmuka pengguna.
 * 
 * C. Controller adalah bagian yang bertanggung jawab untuk mengatur interaksi antara user dan aplikasi.
 * Controller biasanya berupa class PHP yang menerima request dari user dan kemudian memanggil model untuk mengakses data dan view untuk menampilkan data.
 * selain itu Controller bertindak sebagai perantara antara model dan view. Ini menerima masukan pengguna, memperbarui model, dan memicu view untuk dirender.
 */

/**
 * php artisan make:model Student
 */

/** view */
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>Document</title>
    </head>
    <body>
        <p>Hi, {{ $name }} </p>
    </body>
</html>
 
/**Controller */
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function show($id){
        $name = Student::find($id)->name;
        return view('example', ['name'=> $name]);
    }
}
