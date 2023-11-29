<?php
    // Nama       : Fitri Azzahra Hanifatunnisa
    // NIM        : 2204906
    // Kelas      : PSTI 3B
    // Matakuliah : Pemrograman Internet

                            //    -- Migration, Seeder, and MVC (Model-View-Controller) --

    //     Migration, seeder, dan MVC Laravel Framework adalah cara-cara untuk membuat aplikasi web dengan Laravel,
    // sebuah kerangka kerja PHP yang populer dan powerful.

    // 1. Migration adalah cara untuk membuat dan mengubah tabel-tabel di database dengan menggunakan kode PHP.
    //    Dengan migration, kita tidak perlu mengetik perintah SQL secara manual, tetapi cukup menulis kode PHP yang mendeskripsikan
    //    struktur tabel yang kita inginkan. Migration juga membantu kita untuk mengatur versi dari skema database kita, sehingga kita bisa
    //    mengubahnya sesuai dengan perkembangan aplikasi web kita.
    //     • Untuk Membuat migration dengan mengetik perintah (php artisan make:migration nama_migration) di terminal.
    //       Perintah ini akan membuat file migration di folder database/migrations dengan nama yang kita beri. Di dalam file migration,
    //       kita bisa menulis kode PHP yang membuat atau mengubah tabel di database.
    //       Setelah membuat file migration jangan lupa untuk mengubah data di .env seperti berikut :
    //         DB_CONNECTION=mysql
    //         DB_HOST=127.0.0.1
    //         DB_PORT=3306
    //         DB_DATABASE=belajar-laravel /diisi sesuai dengan nama database yg dibuat di localhost kita
    //         DB_USERNAME=root
    //         DB_PASSWORD=
    //     •  Untuk Menjalankan migration dengan mengetik perintah (php artisan migrate) di terminal.
    //        Perintah ini akan menjalankan semua file migration yang ada di folder database/migrations secara berurutan.
    //        Perintah ini akan membuat atau mengubah tabel di database sesuai dengan kode PHP yang ada di file migration.

    // 2. Seeder adalah cara untuk mengisi tabel-tabel di database dengan data palsu yang kita buat sendiri. Dengan seeder, kita bisa
    //    membuat data yang banyak dan bervariasi untuk menguji fitur-fitur aplikasi web kita. Seeder juga memanfaatkan fitur model factory,
    //    yang bisa membuat data secara otomatis dan acak dengan menggunakan aturan-aturan yang kita tentukan.
    //    • Membuat seeder dengan mengetik perintah (php artisan make:seeder nama_seeder) di terminal. Perintah ini akan membuat
    //      file seeder di folder database/seeders dengan nama yang kita beri. Di dalam file seeder, kita bisa menulis kode PHP
    //      yang mengisi data ke tabel di database.
    //    • Setelah membuat file seeder, dapat diisi code seperti berikut :
            // <?php
            //     namespace Database\Seeders;

            //     use Illuminate\Database\Console\Seeds\WithoutModelEvents;
            //     use Illuminate\Database\Seeder;
            //     use Illuminate\Support\Facades\DB;
            //     use Faker\Factory as Faker;

            //     class StudentSeeder extends Seeder
            //     {
            //         /**
            //          * Run the database seeds.
            //          */
            //         public function run(): void
            //         {
            //             $faker = Faker::create();

            //             $data = [];

            //             for ($i = 0; $i < 55; $i++) {
            //                 $data[] = [
            //                     'name'  => $faker->name,
            //                     'score' => rand(75, 100),
            //                 ];
            //             }

            //             DB::table('student')->insert($data);
            //         }
            //     }
    //     • Selanjutnya kita bisa menjalankan seeder dengan mengetik perintah (php artisan db:seed) di terminal.
    //       Perintah ini akan menjalankan kelas DatabaseSeeder yang ada di file database/seeders/DatabaseSeeder.php. Di dalam
    //       kelas DatabaseSeeder, kita bisa menjalankan kelas-kelas seeder lain yang kita buat. Perintah ini akan mengisi data
    //       ke database sesuai dengan kode PHP yang ada di file seeder.

    // 3. MVC (Model-View-Controller), MVC Laravel Framework adalah cara untuk membagi aplikasi web kita menjadi tiga bagian utama,
    //    yaitu model, view, dan controller. Dengan MVC, kita bisa membuat aplikasi web yang rapi, modular, dan mudah dipelihara.
    //    a) Model adalah bagian yang mengurus data dan logika aplikasi web kita. Model bisa berkomunikasi dengan database dengan
    //       menggunakan fitur Eloquent ORM, yang bisa membuat kode PHP kita lebih elegan dan ekspresif.
    //       • Untuk membuat model dengan mengetik perintah (php artisan make:model nama_model) di terminal. Perintah ini akan membuat
    //         file model di folder app/Models dengan nama yang kita beri. Di dalam file model, kita bisa menulis kode PHP yang
    //         mendefinisikan atribut, relasi, dan perilaku model kita.
    //       • Setelah membuat file model, dapat diisi code seperti berikut :
                // <?php

                // namespace App\Models;
                
                // use Illuminate\Database\Eloquent\Factories\HasFactory;
                // use Illuminate\Database\Eloquent\Model;
                
                // class Student extends Model
                // {
                //     use HasFactory;
                // }
        //   • Selanjutnya kita bisa menjalankan code di file web pada routes untuk menghubungkan ke URL dengan code berikut :
                // <?php

                // use Illuminate\Support\Facades\Route;
                // use App\Http\Controllers\StudentController;

                // Route::get('/', function () {
                //     return view('welcome');
                // });
                // Route::get('/greeting', function(){
                //     return 'Hello World';
                // });
    //       • Selanjutnya kita bisa menjalankannya dengan mengetik perintah (php artisan serve) di terminal. 
    //         Dan perintah ini akan menjalankan server lokal di port 8000. Kita bisa mengakses aplikasi web kita di browser
    //         dengan alamat http://localhost:8000 yang akan menampilkan 'Hello World'.

    //    b) View adalah bagian yang menampilkan data dan antarmuka pengguna aplikasi web kita. View bisa menggunakan fitur
    //       template engine Blade, yang bisa membuat kode HTML kita lebih sederhana dan kuat.
    //       • Untuk membuat view dengan membuat file dengan ekstensi (.blade.php) di folder resources/views. Di dalam file view,
    //         kita bisa menulis kode HTML yang bisa menggunakan sintaks Blade untuk menampilkan data secara dinamis. Contoh code :
                // <!DOCTYPE html>
                // <html lang="en">
                // <head>
                //     <meta charset="UTF-8">
                //     <meta name="viewport" content="width=device-width, initial-scale=1.0">
                //     <title>Document</title>
                // </head>
                // <body>
                //     <p>Hello World</p>
                // </body>
                // </html>
            // dan menambahkan code di file web seperti berikut :
                // Route::get('/greeting', function(){
                //     return view('example');
                // });
            // browser akan menampilkan tulisan 'Hello World'.
    
    //    c) Controller adalah bagian yang mengatur alur aplikasi web kita dan menghubungkan model dan view.
    //       Controller bisa menangani permintaan HTTP dari pengguna dan mengembalikan respons yang sesuai. Controller juga
    //       bisa menggunakan fitur middleware, yang bisa memfilter permintaan sebelum dan sesudah diproses.
    //       • Untuk membuat controller dengan mengetik perintah (php artisan make:controller nama_controller) di terminal.
    //         Perintah ini akan membuat file controller di folder app/Http/Controllers dengan nama yang kita beri. Di dalam file controller,
    //         kita bisa menulis kode PHP yang menangani permintaan HTTP dari pengguna. contoh code :
                // <?php
                // namespace App\Http\Controllers;

                // use Illuminate\Http\Request;
                // use App\Models\Student;

                // class StudentController extends Controller
                // {
                //     public function show($id){
                //         $name = Student::find($id)->name;
                //         return view('example', ['name' => $name]);
                //     }
                // }
            // dan mengganti isi code di dalam file ekstensi .blade.php dengan :
                // <!DOCTYPE html>
                    // <html lang="en">
                    // <head>
                    //     <meta charset="UTF-8">
                    //     <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    //     <title>Document</title>
                    // </head>
                    // <body>
                    //     <p>Hi, {{ $name }} !</p>
                    // </body>
                    // </html>
            // serta mengganti isi code di dalam file web dengan :
                    // Route::get('/greeting/{id}', [StudentController::class, 'show']);
            // sehingga output dalam browser akan menampilkan 'Hi, $nama'. $nama disini sesuai dengan
            // id yang kita masukan dalam database dan dimasukan ke link URL seperti contoh (127.0.0.1:8000/greeting/1).
?>
