<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Laravel || Syifa Raudhatul</title>
</head>
<body>
    <h1> A. MIGRATION </h1>
    <h2> how to make migration? </h2>
        <p> Langkah 1 - Konfigurasi Koneksi Database
            Karena akan bekerja menggunakan database, maka kita perlu melakukan
            konfigurasi koneksi database-nya terlebih dahulu. Buka file mengguna code editor masing-masing,
            kemudian cari file yang bernama env.
            Jika sudah ketemu, silahkan cari kode berikut ini di dalam file env
            DB_CONNECTION=mysql
            DB_HOST=127.0.0.1
            DB_PORT=3306
            DB_DATABASE=laravel
            DB_USERNAME=root
            DB_PASSWORD=root

            Dan ubahlah menjadi seperti berikut ini:
            DB_HOST=127.0.0.1
            DB_PORT=3306 ( sesuai mysql masing masing)
            DB_DATABASE=laravel-app (sesuai nama folder laravel, dan nama yang akan dijadikan database)
            DB_USERNAME=root
            DB_PASSWORD=root

            Nah, diatas kita mengaatur untuk DB DATABASE atau nama database yang akan kita gunakan yaitu menjadi laravel app
            Kemudian untuk DB_USERNAME kita biarkan default, yaitu root dan untuk DB PASSWORD silahkan disesuaikan
            dengan konfigurasi-nya massing-masing. Jika menggunakan XAMPP, maka untuk password-nya dikosongkan saja (bu default kosong). 
        </p>

        <p> Langkah 2 - Membuat Database
            Buka CMD/terminal dicode editor, lalu kalian bisa mengetik php artisan make:migratin create_nama_table
            contoh : php artisan make:migration create_student_tale, lalu enter
            maka akan muncul pemberitahuan bahwa migration telah dibuat dengan nama 
            2023_11_23_create_student_table
            nah, folder migration ini dibuat pada folder database/migrations
        </p>

        <p> Langkah 3 - Menambah Field Table
            Field yang kita tambahkan ini akan digenerate di dalam table student yang telah kita buat yang ada di database
            silahkan buka file create student tadi, kemudian pada bagian function up, ubah kode menjadi
            public function up()
            {
                Schema::create('posts', function (Blueprint $table) {
                    $table->id();
                    $table->string('name');
                    $table->integer('score');
                    $table->timestamps();
                });
            }
            nah, kode diatas bisa diubah sesuai kebutuhan kaliah
        </p>

        <p> Langkah 4 - Menjalankan Migration
            Silahkan jalankan perintah berikut ini didalam CMD/terminal:
            php artisan migrate
            jika berhasil, kita cek didalam database, maka table-tabke beserta field-nya juga otomatis ter-generate 
        </p>



    <h1> B.SEEDER </h1>
    <h2> how to make seeder? </h2>
        <p> Langkah 1 - Buat Seeder Laravel
            Mari kita buat seeder Laravel untuk tabel student kita. 
            Jalankan perintah berikut:
            php artisan make:seeder CreateStudentSeeder
        </p>

        <p> Langkah 2 - Masukan data pada seeder
            Setelah seeder Laravel kita dibuat, silakan ke file database/seeder . 
            Buka CreateStudentsSeeder.php dan ubah isi sesuai dengan kebutuhan 
        </p>
        <p> Langkah 3 - Menjalankan Seeder
            jalankan perintah php artisan db:seed --class=PostSeeder untuk menjalankan seeder.
            Ini akan menyisipkan data yang telah ditentukan ke dalam tabel tertentu.
            Contoh: php artisan db:seed --class=StudenteSeeder 
        </p>
        <p> Langkah - 4 Menjalankan Semua Seeder
            Gunakan perintah php artisan db:seed untuk menjalankan semua seeder.
        </p>


    <h1> MVC Laravel Framework in 1 file.php </h1>
    <h2> how to make MVC Laravel Framework in 1 file.php </h2>
        <p> Langkah 1 - Memebuat Model
            pertama kita harus membuat model terlebih dahulu dengan perintah
            php artisan make:model example
            nah, bisa diubah sesuai dengan data kita
            php artisan make:model Student
            setelah itu, kalian bisa masuk ke folder models, dan bisa dirubah sesuai dengan kebutuhan
            contoh yang saya gunakan
            "Route::get('/greeting', function () {
            return('Hello World');" 
        </p>

        <p> Langkah 2 - Membuat example.bllade dalam Views
            kalian bisa membuat file secara manual dibagian views lalu bisa diberi nama
            "example.blade.php" dan bis ajuga mengisi dengan tag html didalamnya. 
        </p>

        <p> Langkah 3 - Mmebuat Routers
                nah, bila program views diatas ingin dijalnkan, kalian bisa menggunakan fungsi pada bagian routersnya
                Route::get("/greeting", function () {
                return view("example"); 
                lalu kalian harus menambah /greeting pada penacrian 
        </p>

        <p> Langkah 4 - Menjalankan
                buka cmd/terminal lalu ketik perintah
                php artisan serve
                lalu salin link, setelah disalin, copy paste pada browser kalian
                jika berhasil. selamat program anda berhasil,  
        </p>
        




</body>
</html>