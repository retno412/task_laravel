<?php

/**
 * Nama: Ai Nuraiman
 * NIM: 2200647
 * Kelas: 3A PSTI
 * Mata Kuliah: Promnet
 *
 * Catatan tentang Coding
 * ======================
 * Daftar Isi:
 * 1. Migration
 * 2. Seeder
 * 3. MVC (Model-View-Controller)
 */

/**
 * 1. Migration
 *
 * Migration adalah sebuah fitur yang ada pada Laravel, merupakan Control
 * Version System untuk database dengan menggunakan migration untuk
 * mengelola database dengan lebih mudah.
 *
 * Cara membuat & menggunakan Migration:
 *  Membuat table: php artisan make:migration create_students_table
 *  Mengetikkan perintah: php artisan migrate
 *
 * Membuat controller: php artisan make:controller StudentController
 * Menambahkan data pada StudentController.php:
 */

public function show($id)
{
    $name = Student::find($id)->name;
    return view('example', ['name' => $name]);
}

/**
 * Membuat database yang menghubungkan localhost di file .env:
 *
 * DB_CONNECTION=mysql
 * DB_HOST=127.0.0.1
 * DB_PORT=3306
 * DB_DATABASE=belajar-laravel-9
 * DB_USERNAME=root
 * DB_PASSWORD=
 */

/**
 * 2. Seeder
 *
 * Seeder merupakan sebuah class yang memungkinkan kita sebagai web developer untuk mengisi
 * database kita dengan data awal atau dummy data yang telah
 * ditentukan secara otomatis.
 *
 * Cara membuat & menggunakan Seeder:
 * - Membuat file Seeder: php artisan make:seeder StudentSeeder
 */

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'name' => 'Ai', 'score' => 89],
            ['id' => 2, 'name' => 'Nur', 'score' => 99],
            ['id' => 3, 'name' => 'Aiman', 'score' => 100],
        ];

        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 47; $i++) {
            $data[] = [
                'id' => $i + 4,
                'name' => $faker->name(),
                'score' => $faker->numberBetween(50, 100),
            ];
        }

        DB::table('students')->insert($data);
    }
}

/**
 * 3. MVC (Model View Controller)
 *
 * Model View Controller atau yang dapat disingkat MVC adalah sebuah pola arsitektur dalam membuat
 * sebuah aplikasi dengan cara memisahkan kode menjadi tiga bagian yang terdiri dari:
 *
 * 1). Model
 * Membuat file model: php artisan make:model Student
 */

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
}

/**
 * 2). View
 * Membuat file example.blade.php:
 */

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Hi, {{ $name }}!</p>
</body>
</html>

/**
 * Membuat route greeting:
 */

Route::get('/', function () {
    return view('welcome');
});

/**
 * 3). Controller
 * Membuat StudentController: php artisan make:controller StudentController
 */

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function show($id)
    {
        $name = Student::find($id)->name;
        return view('example', ['name' => $name]);
    }
}

/**
 * Membuat route di StudentController:
 */

Route::get('/greeting/{id}', [StudentController::class, 'show']);
/**
 * Menjalankan web: php artisan serve 
 * Setelah itu jalankan menggunakan server link server ini [http://127.0.0.1:8000] copy/klik link tersebut
 * Ketika sudah lalu klik dibagian ujung link tadi dengan mengubah pada ujung greeting itu angka/nama kita : http://127.0.0.1:8000/greeting (2 atau nama)
 * Maka akan muncul angka di database yang kita inginkan pada StudentSeeder atau Nama kita di browser 
 */

?>