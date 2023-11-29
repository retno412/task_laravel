<?php

Catatan Coding Laravel
1. Migration
Pengertian :
Migration adalah sebuah fitur yang ada pada laravel. Dengan menggunakan migration laravel, memungkinkan kita untuk mengelola database dengan lebih mudah.

Cara Membuat dan Menggunakan :
- Gunakan perintah yang disediakan oleh laravel yaitu php artisan .
- Setting dulu di file .env untuk nama database agar bisa terkoneksi dengan laravel yang dibuat nanti. 
- Buka file .env dan sesuaikan seperti berikut :

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test_laravel
DB_USERNAME=root
DB_PASSWORD=

langsung masuk ke terminal dan membuat migration database dengan mengetikkan perintah berikut :

php artisan make:migration{nama_migration}

Menambahkan Field ke Database :

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

public function up()
{
    Schema::create('article', function (Blueprint $table) {
        $table->id();
        $table->string('title', 191);
        $table->string('content', 255);
    });
}

Jalankan perintah berikut untuk melakukan migration database :

php artisan migrate

2. Seeder
Pengertian :
Seeder pada Laravel merupakan fitur yang sangat berguna dalam membantu kita untuk memasukkan data awal yang telah ditentukan ke dalam database dengan mudah dan cepat. Hal tersebut memudahkan dalam menguji dan memelihara aplikasi. Seeder sangat berguna pada tahap pengembangan, uji coba, dan pemeliharaan.

Langkah-langkah :

Membuat StudentSeeder
terminal :
php artisan make::seeder StudentSeeder

Model
use Illuminate\Database\Console\Seeds\WithoutMOdelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

dalam terminal :
php artisan db:seed

membuat models model Student
terminal :
php artisan make:model Student

buka web.php dan ketik kode yang akan dibuat lalu buka kembali terminal untuk menyimpan
php artisan serve

3. MVC Laravel Framework
Pengertian :
MVC adalah sebuah pendekatan perangkat lunak yang memisahkan aplikasi logika dari presentasi. MVC memisahkan aplikasi berdasarkan komponen-komponen aplikasi, 
seperti, manipulasi data, controller, dan user interface.

    1. Model, mewakili struktur data. Biasany model berisi fungsi-fungsi yang membantu seseorang dalam pengelolaan basis data seperti memasukkan data ke basis data, pembaruan data dan lain-lain.
    Langkah :
    -Membuat Model
    terminal :
    php artisan make:model Student
    -Edit Model File
    Buka file model yang baru dibuat (app/Student.php) dan definisikan properti dan hubungan jika diperlukan.
    use Illuminate\Database\Eloquent\Model;
    class Example extends Model
    {
        protected $fillable = ['field1', 'field2'];
    }



    2. View, view adalah bagian yang mengatur tampilan ke pengguna. Bisa dikatakan berupa halaman web.
    -Membuat view
    terminal :
    php artisan make:: controller StudentController
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <p>Hi, {{ $name}} !</p>
    </body>
    </html>

    3. Controller, Controller merupakan bagian yang menjembatani model dan view.
    -Membuat Controller
    Terminal :
    php artisan make:controller StudentController
    
    contoh kode :
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\StudentController;
    use Illuminate\Http\Request;
    use App\Models\Student;

    class StudentController extends Controller
    {
        public function show($id){
            $name = Student::find($id)->name;
            return view('example', ['name'=> $name]);
        }
    }
    terminal :
    php artisan serve

