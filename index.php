<!-- Nama: Rizal Aglal Faozi
NIM: 2203489
Kelas: 3A PSTI 
Mata Kuliah: Pemrograman Internet -->
<!-- Sebelum melakukan migrasi jangan lupa untuk seting file .env terlebih dahulu
pastikan data - data berikut telah diisi dengan tepat dan sesuai:
    DB_CONNECTION = mysql
DB_HOST = 127.0 .0 .1
DB_PORT = 3306
DB_DATABASE = cobaapp
DB_USERNAME = root
DB_PASSWORD =
    Jika sudah ayo lanjut!
    1. Migration(Migrasi)
Dalam laravel, Migration memungkinkan developer untuk dengan mudah mengelola perubahan skema
database mereka dengan menggunakan kode PHP, daripada harus melakukan perubahan secara manual
di dalam database.Migrasi juga berperan untuk mengontrol versi skema basis data.
Setiap migrasi adalah sebuah file PHP yang mencatat perubahan - perubahan spesifik pada skema
basis data.Hal ini memungkinkan developer untuk melacak, memahami, dan mereplikasi
perubahan - perubahan tersebut.Maka, dengan menggunakan migrasi, tim developer dapat memastikan
bahwa semua anggota tim memiliki versi skema basis data yang serupa, mencegah perbedaan besar
antar lingkungan kerja.
sintaks untuk migrasi
a.Membuat file migrasi
untuk membuat migrasi baru, perintah yang digunakan di cmd / terminal adalah
php artisan make: migration create_students_table
perintah di atas digunakan untuk membuat file migrasi yang fungsinya membuat tabel students
file baru akan disimpan di directory database / migrations.Nama file migrasi biasanya juga berisi timestamp, waktu di generatenya file ini,
    dan digunakan untuk menentukan urutan dari migrasinya.Nama file yang digunakan saat pembuatan
migration akan digunakan oleh laravel untuk menebak nama tabel dan menentukan apakah migrasi
perlu membuat tabel baru atau tidak.Nah jika laravel dapat menentukan nama tabel dari nama
migrasi, maka laravel akan pre - fill file migrasi yang dibuat dengan tabel spesifik.
Jika tidak, tabel harus dibuat didalam file migrasi secara manual.
berikut merupakan isi dari file migrasi yang dihasilkan dari kode diatas: -->
<? php
use Illuminate\ Database\ Migrations\ Migration;
use Illuminate\ Database\ Schema\ Blueprint;
use Illuminate\ Support\ Facades\ Schema;
return new class extends Migration {
    /**
     * Run the migrations.
     */
    public
    function up(): void {
            Schema::create('flights', function (Blueprint $table) {
                $table - > id();
                $table - > timestamps();
                //dua kode diatas merupakan pre-fill yang dilakukan oleh laravel
                $table - > string('name');
                $table - > integer('score');
                //dua kode diatas dibuat secara manual
            });
        }

        /**
         * Reverse the migrations.
         */
        public
        function down(): void {
            Schema::drop('flights');
        }
    }; 
?>
<!--2. Menjalankan migration / migrasi
Untuk menjalankan setiap file migrasi yang belum pernah dieksekusi
sebelumnya, dan menerapkan perubahan - perubahan yang terkandung di
dalamnya ke basis data, adapun perintahnya adalah
php artisan migrate
3. Rolling back migrations
Seperti dijelaskan di atas bahwa migration ini berfungsi sebagai source control,
maka adalah mungkin untuk kembali ke versi migration sebelumnya,
adapun perintahnya adalah sebagai berikut
php artisan migrate: rollback-- >
    <!--2. Seeding
Seeding dalam Laravel adalah proses untuk mengisi basis data dengan data dummy
atau data awal yang dibutuhkan oleh aplikasi.Ini berguna saat pengembangan atau
pengujian aplikasi, karena memungkinkan untuk membuat dataset awal yang dibutuhkan
oleh aplikasi.
Langkah - langkah umum untuk membuat dan menggunakan seeding dalam Laravel adalah sebagai berikut:
    Langkah - langkah untuk Seeding dalam Laravel:
    1. Membuat Seeder
Gunakan perintah Artisan untuk membuat seeder baru, buka di terminal:
    php artisan make: seeder StudentSeeder
Ini akan membuat file seeder baru di dalam direktori database / seeders.
    2. Mengisi Data Dummy
Buka file seeder yang baru dibuat, dan gunakan metode run() untuk menambahkan data ke basis data. 
<? php
namespace Database\ Seeders;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\ Database\ Seeder;
use Illuminate\ Support\ Facades\ DB;
class StudentSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public
    function run(): void {
        $data = [
            ['id' => 1, 'name' => 'Retno', 'score' => 80, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Ariyanti', 'score' => 85, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Nurningtias', 'score' => 90, 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('students') - > insert($data);
    }
} ?>
<!--3. Menjalankan Seeder
Untuk menjalankan seeder yang telah dibuat, gunakan perintah Artisan pada terminal:
    php artisan db: seed--class = StudentSeeder
4. Menjalankan Seeder Khusus atau Semua Seeder
Jalankan satu seeder tertentu:
    php artisan db: seed--class = NamaSeeder
Jalankan semua seeder yang ada:
    php artisan db: seed-- >
    <
    !--3. MVC pada Laravel
Model adalah bagian yang menangani logika bisnis dan interaksi dengan database.
Model biasanya diimplementasikan sebagai kelas PHP yang mewakili tabel database.
Model bertanggung jawab untuk menyimpan, mengambil, dan memodifikasi data dari database.

View adalah bagian yang menangani tampilan aplikasi.
View biasanya diimplementasikan sebagai template HTML yang berisi konten yang akan ditampilkan kepada pengguna.
View dapat menggunakan data dari model untuk menampilkan informasi yang relevan kepada pengguna.

Controller adalah bagian yang menghubungkan model dan view.
Controller bertanggung jawab untuk menerima permintaan dari pengguna,
memproses data dari model, dan menghasilkan respons yang sesuai.
Controller juga bertanggung jawab untuk menangani peristiwa dan rute di aplikasi.-- >