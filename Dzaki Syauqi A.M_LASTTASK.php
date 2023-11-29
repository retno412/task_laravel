<?php
    // Nama       : Dzaki Syauqi Anthera Mumtaz
    // NIM        : 2202942
    // Kelas      : 3A PSTI
    // Pemrograman Internet

    // Tugas : Migration, Seeder, and MVC (Model-View-Controller) 

    // 1. *Migration*//

    // Migration adalah fitur Laravel yang digunakan untuk membuat dan mengubah tabel di database. Dengan migration, kita tidak perlu menulis kode SQL secara manual, tetapi cukup menulis kode PHP yang mendeskripsikan struktur tabel yang kita inginkan. Migration juga membantu kita untuk mengatur versi dari skema database kita, sehingga kita bisa mengubahnya sesuai dengan perkembangan aplikasi web kita.
    
    // Langkah-langkah membuat migration
    
    // Buka terminal dan jalankan perintah berikut:
    // php artisan make:migration nama_migration
    // Perintah ini akan membuat file migration di folder database/migrations dengan nama yang kita beri.
    
    // Buka file migration yang baru dibuat, kemudian tambahkan kode PHP yang membuat atau mengubah tabel di database.
    // Contoh kode migration untuk membuat tabel students:
    
    // PHP
    // <?php
    
    // use Illuminate\Database\Migrations\Migration;
    // use Illuminate\Database\Schema\Blueprint;
    
    // class CreateStudentsTable extends Migration
    // {
    //     public function up()
    //     {
    //         Schema::create('students', function (Blueprint $table) {
    //             $table->id();
    //             $table->string('name');
    //             $table->integer('score');
    //             $table->timestamps();
    //         });
    //     }
    
    //     public function down()
    //     {
    //         Schema::dropIfExists('students');
    //     }
    // }
    // Gunakan kode dengan hati-hati. Pelajari lebih lanjut
    // Jalankan perintah berikut untuk menjalankan migration:
    // php artisan migrate
    // Perintah ini akan menjalankan semua file migration yang ada di folder database/migrations secara berurutan.
    
    // 2.*Seeder* //
     
    // Seeder adalah fitur Laravel yang digunakan untuk mengisi tabel di database dengan data palsu. Dengan seeder, kita bisa membuat data yang banyak dan bervariasi untuk menguji fitur-fitur aplikasi web kita. Seeder juga memanfaatkan fitur model factory, yang bisa membuat data secara otomatis dan acak dengan menggunakan aturan-aturan yang kita tentukan.
    
    // Langkah-langkah membuat seeder
    
    // Buka terminal dan jalankan perintah berikut:
    // php artisan make:seeder nama_seeder
    // Perintah ini akan membuat file seeder di folder database/seeders dengan nama yang kita beri.
    
    // Buka file seeder yang baru dibuat, kemudian tambahkan kode PHP yang mengisi data ke tabel di database.
    // Contoh kode seeder untuk mengisi tabel students:
    
    // PHP
    // <?php
    
    // use Illuminate\Database\Seeder;
    // use Illuminate\Support\Facades\DB;
    
    // class StudentSeeder extends Seeder
    // {
    //     public function run()
    //     {
    //         $faker = Faker\Factory::create();
    
    //         $data = [];
    
    //         for ($i = 0; $i < 55; $i++) {
    //             $data[] = [
    //                 'name' => $faker->name,
    //                 'score' => rand(75, 100),
    //             ];
    //         }
    
    //         DB::table('students')->insert($data);
    //     }
    // }
    // Gunakan kode dengan hati-hati. Pelajari lebih lanjut
    // Jalankan perintah berikut untuk menjalankan seeder:
    // php artisan db:seed
    // Perintah ini akan menjalankan semua file seeder yang ada di folder database/seeders.

    // *3. MVC *\\
    // MVC, singkatan dari Model, View, dan Controller, adalah sebuah arsitektur aplikasi web yang membagi aplikasi menjadi tiga komponen utama. Ini membantu dalam menciptakan aplikasi web yang terstruktur, mudah dipelihara, dan modular. Mari kita bahas masing-masing bagian:

    // Model
    // Model adalah komponen yang menangani data dan logika aplikasi. Dalam contoh PHP yang diberikan, model disajikan sebagai kelas Student yang menggunakan Eloquent ORM untuk berinteraksi dengan database. Eloquent ORM memudahkan manipulasi data dan membuat kode PHP menjadi lebih elegan.
    
    // View
    // View adalah bagian yang menangani tampilan atau antarmuka pengguna. Pada contoh HTML yang diberikan, menggunakan Blade sebagai template engine, view menampilkan daftar siswa dari database. Ini membuat HTML menjadi lebih sederhana dan kuat dengan memanfaatkan fitur-fitur Blade.
    
    // Controller
    // Controller mengatur alur aplikasi dengan menghubungkan model dan view. Dalam contoh PHP, StudentController menangani permintaan HTTP untuk halaman /students. Fungsi index() dalam controller ini mengambil data dari model Student dan mengirimkannya ke view students.index. Ini membantu menjaga pemisahan tanggung jawab antara manipulasi data (model) dan tampilan (view).
    
    // Menjalankan Aplikasi Web
    // Untuk menjalankan aplikasi web, perintah php artisan serve digunakan. Ini akan memulai server lokal di port 8000, dan aplikasi web dapat diakses melalui browser dengan alamat http://localhost:8000.
    
    // Secara singkat, MVC memisahkan aplikasi web menjadi tiga komponen utama, memudahkan pengembangan dan pemeliharaan. Model menangani data, view menangani tampilan, dan controller mengatur alur aplikasi, sehingga setiap bagian memiliki tanggung jawabnya sendiri.
?>