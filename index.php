<?php
/* Nama: Jihan Nurhaliza
NIM: 2200961
Kelas: 3A PSTI

1. Migration
Pengertian
    Migration adalah sebuah fitur yang ada pada laravel, migration merupakan Control Version System untuk database.
    Dengan menggunakan migration laravel, memungkinkan kita untuk mengelola database dengan mudah.

Langkah-langkah:
1. Buat database dengan nama belajar_laravel
2. Open file .env kemudian koneksi desesuaikan dengan database masing-masing seperti nama database, usn, pass, port.
3. Open terminal kemudian ketik perintah php artisan make:migration create_student_table. Maka akan muncul pemberitahuan bahwa migration telah dibuat dengan nama 2023_08_22_012620_create_student_table 
yang artinya tanggal, bulan, tahun dibuat migration. Migration akan dibuat pada folder database/migrations.
4. Dalam file migration, laravel sudah membuat 2 buah method atau function secara otomatis yaitu method up() untuk membuat table dan method down() untuk menghapus tableatau rollback.
Pada method up() kita bisa menentukan kolum apa saja yang ingin kita buat pada tabel student.
5. Kemudian ketikkan perintah pada terminal agar file migration dijalankan. Ketik php artisan migrate.
6. Database akan muncul table student


2. Seeder
Pengertian
    Seeder dalam Laravel adalah komponen yang memungkinkan kita untuk mengisi basis data dengan data awal secara otomatis. Seeder biasanya digunakan untuk mengisi data awal seperti daftar negara, jenis kelamin, status pengguna, atau data lain yang diperlukan dalam aplikasi. 
    Dengan menggunakan seeder, kita dapat menghindari pengisian manual yang memakan waktu dan berisiko kesalahan.

Langkah-langkah:
1. Membuat file seeder menggunakan terminal. Ketik php artisan make:seeder StudentSeeder
2. Buka file StudentSeeder.php pada method 'run()', kita dapat menuliskan kode Seeder untuk memasukan data yang telah kita tentukan ke dalam database.
3. Menjalankan commad artisan untuk memasukkan data ke dalam database dengan mengguanakan Seeder yang telah kita buat. Open terminal, ketik php artisan db:seed--class=StudentSeeder


3. MVC
- Model, bagian yang mengelola dan berhubungan langsung dengan database,
- View, bagian yang akan menyajikan tampilan desain dan informasi kepada pengguna,
- Controller, bagian yang menghubungkan model dan view dalam setiap proses request dari user.

1. Model
Langkah-langkah: 
1. Open terminal
2. Buat model baru dengan nama Student
3. Ketik php artisan make:model Student di terminal
4. Pada file ketik kode yang disesuaikan
    
                namespace App\Models;

                use Illuminate\Database\Eloquent\Factories\HasFactory;
                use Illuminate\Database\Eloquent\Model;

                class Student extends Model
                {
                use HasFactory;
                }  

2. View
Langkah-langkah: 
1. Open file view di belajar-laravel-9
2. Buat file dengan nama "example.blade.php" 
4. Ketik kode yang disesuaikan

             use Illuminate\Support\Facades\Route;
                    use App\Http\Controllers\StudentController;
                    Route::get('/', function () {
                     return view('welcome');
                        });
                    Route::get('/greeting', function () {
                    return 'Hello World';
                        });

3. Controller
Langkah-langkah:
1. Open terminal
2. Ketik di terminal php artisan make:controller StudentController
3. Ketik kode yang di sesuaikan
             use Illuminate\Support\Facades\Route;
                    use App\Http\Controllers\StudentController;
                    Route::get('/', function () {
                     return view('welcome');
                        });
                    Route::get('/greeting', function () {
                    return 'Hello World';
                        });

*/
?>