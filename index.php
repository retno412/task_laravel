<!-- <php

=====================================================================================
NIM     : 2200843
NAMA    : Tyoffadhil Haidar Ismail
KELAS   : 3A-PSTI

TUGAS PROMNET 

=====================================================================================

1. Migration 
    # Pengertian 
    Migration dalam Laravel adalah mekanisme yang memungkinkan pengembang untuk mengelola perubahan skema database menggunakan kode PHP
    Ini memungkinkan perubahan skema basis data tanpa melakukan perubahan secara manual di dalam database.
    Migration juga membantu mengontrol versi skema basis data.

    # Langkah-langkah Migration:

    1. Membuat Migration Baru:
    Gunakan perintah Artisan berikut untuk membuat file migrasi baru:

       [ php artisan make:migration NamaMigrasi ]

    Contoh: [ php artisan make:migration create_students_table ]   
    - file migrasi baru akan disimpan dalam direktori 'database'migrations'.

    2. Mengedit Migration:
    - Buka file migrasi yang baru dibuat dalam direktori database/migrations.
    - Di dalam metode up, tentukan struktur tabel yang akan diubah atau dibuat.
    contoh: 

    public function up()
{
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->timestamps();
        $table->string('name');
        $table->integer('score');
    });
}

    3. Menjalankan Migration:
    - Gunakan perintah Artisan berikut untuk menjalankan migrasi yang belum pernah dieksekusi sebelumnya:
    [ php artisan migrate ]

    4. Rollback Migration:
    - Jika perlu kembali ke versi migrasi sebelumnya, gunakan perintah berikut:
    [ php artisan migrate:rollback ]

    Catatan:

    - File migrasi biasanya berisi dua metode, yaitu up untuk menentukan perubahan yang akan dilakukan, dan down untuk mendefinisikan rollback dari perubahan tersebut.
    - Timestamp pada nama file migrasi digunakan untuk menentukan urutan migrasi.
    - Jika Laravel dapat menentukan nama tabel dari nama migrasi, maka Laravel akan otomatis mengisi file migrasi dengan definisi tabel. Jika tidak, definisi tabel harus dibuat secara manual.   

    Contoh File Migration:

    <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->integer('score');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

2. Seeding 
    # Pengertian
    Seeding dalam laravel adalah proses mengisi tabel database dengan data contoh atau default. 
    Ini berguna untuk memberikan dataset awal yang diperlukan dalam pengembangan atau untuk membuat data uji.

    # Langkah-langkah Seeding:
    1. Membuat Seeder Baru:
        [ php artisan make:seeder NamaSeeder ]
        Contoh: [ php artisan make:seeder StudentSeeder ]

    2. Mengedit Seeder:
        - Buka file seeder yang baru dibuat dalam direktori database/seeders.
        - Di dalam metode run, gunakan Eloquent atau query builder untuk menentukan data yang akan diisi ke dalam tabel.
    
    Contoh: 

    public function run()
{
    $data = [
        ['name' => 'John Doe', 'score' => 85],
        ['name' => 'Jane Smith', 'score' => 92],
        // ... tambahkan data sesuai kebutuhan
    ];

    DB::table('students')->insert($data);
}

    3. Menjalankan Seeder:
    - Gunakan perintah Artisan berikut untuk menjalankan seeder tertentu:
    [ php artisan db:seed --class=NamaSeeder ]

    4. Menggunakan DatabaseSeeder:
    - Kelas DatabaseSeeder dapat digunakan untuk memanggil seeder-seeder lain secara bersamaan.
    - Buka file DatabaseSeeder dalam direktori database/seeders dan tambahkan panggilan seeder sesuai kebutuhan.

    public function run()
{
    $this->call([
        StudentSeeder::class,
        // tambahkan seeder lain jika diperlukan
    ]);
}

    5. Menajalankan Semua Seeder: 
    - Untuk menjalankan semua seeder yang terdaftar dalam DatabaseSeeder, gunakan perintah:
    [ php artisan db:seed ]
    

3. MVC (Model-view-Controller):
    # Pengertian
    MVC adalah pola desain arsitektur perangkat lunak yang memisahkan aplikasi menjadi tiga komponen utama: Model, View, dan Controller.
    Laravel adalah framework PHP yang menggunakan pola desain MVC untuk membangun aplikasi web.

        1. Model:
    Representasi data atau objek dalam aplikasi.
    Bertanggung jawab untuk mengelola logika bisnis, validasi data, dan interaksi dengan basis data.
    Contoh: Model Student dapat merepresentasikan tabel mahasiswa dalam database.
        2. View:
    Menangani tampilan atau antarmuka pengguna.
    Bertanggung jawab untuk menampilkan data kepada pengguna dan menerima input dari pengguna.
    Contoh: File example.blade.php dapat menjadi view untuk menampilkan data mahasiswa.
       3.  Controller:
    Bertanggung jawab untuk menangani logika aplikasi dan berinteraksi dengan model serta view.
    Menerima input dari pengguna, memproses data, dan mengirimkan output ke view.
    Contoh: StudentController dapat mengelola logika terkait mahasiswa, menerima input, dan memberikan respons ke view.

    # Langkah-langkah Menggunakan MVC di Laravel:
    1. Membuat Model 
    [ php artisan make:model NamaModel ]
    Contoh: 
    [ php artisan make:model Student ]
    - Model akan dibuat dalam direktori app/models.

    2. Membuat Controller:
    [ php artisan make:controller NamaController ]
    Contoh: 
    [ php artisan make:controller StudentController ]

    3. Membuat View:
    - File view dapat dibuat secara manual dalam direktori resources/views.
    - Contoh: Buat file example.blade.php untuk menampilkan data.

    4. Routing:
    - Tentukan rute untuk menghubungkan URL dengan metode di dalam controller.
    - Contoh: [ Route::get('/students/{id}', 'StudentController@show'); ]

    5. Mengedit Controller:
    - Di dalam controller, implementasikan metode yang sesuai dengan rute yang ditentukan.
    - Contoh: 

    namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function show($id) {
        $student = Student::find($id);
        return view('example', ['student' => $student]);
    }
}

6. Mengedit View:
- Di dalam file view, gunakan sintaks Blade untuk menampilkan data yang diterima dari controller.
- Contoh: 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
</head>
<body>
    <h1>Student Details</h1>
    <p>Name: {{ $student->name }}</p>
    <p>Score: {{ $student->score }}</p>
</body>
</html>

Laravel secara otomatis mengaitkan model, view, dan controller berdasarkan konvensi penamaan dan lokasi file.
Rute, yang didefinisikan di dalam file web.php, menghubungkan URL dengan metode di dalam controller.
Model digunakan untuk berinteraksi dengan basis data, controller menangani logika, dan view menangani tampilan antarmuka pengguna.
Dengan mengikuti pola desain MVC, Laravel membantu memisahkan tanggung jawab dalam pengembangan aplikasi web, memudahkan perawatan dan pemahaman kode.
    -->
