<!-- Rangkuman Laravel tentang Migration, Seeder dan MVC Laravel Framework
A.	Migration
    1.	Pengertian
            Migration dalam Laravel dapat dianggap sebagai alat yang setara dengan kontrol versi untuk basis data proyek. Dengan menggunakan migration, tim dapat dengan mudah mengelola dan berbagi skema basis data proyek mereka, mirip dengan konsep yang ditemui di platform seperti GitHub atau GitLab. 
        Ini memberikan cara sistematis untuk mendokumentasikan setiap perubahan yang terjadi dalam basis data, memungkinkan tim untuk dengan mudah beradaptasi dengan evolusi proyek.
        Meskipun konsep ini tidak eksklusif untuk Laravel, migration menyajikan cara yang efisien untuk menjalankan perubahan definisi basis data (DDL) tanpa perlu menghadapi kerumitan mengetikkan syntax SQL melalui terminal atau editor khusus
    2.	Langkah - langkah
        a.	Persiapkan Koneksi Database
            Langkah awal sebelum menggunakan perintah migration adalah mengatur koneksi database pada file .env. Sesuaikan informasi database, username, dan password sesuai dengan konfigurasi yang sudah ada.
        b.	Buat File Migration
            Langkah kedua adalah membuat file untuk menyimpan skema tabel. Gunakan perintah berikut di command line:
            php artisan make:migration create_barang_table
        c.	File migration akan muncul dalam folder database/migrations. Pastikan mengganti bagian antara create_ dan _table sesuai dengan nama tabel yang akan dibuat.
        d.	Definisikan Struktur Tabel
            Setelah file berhasil dibuat, definisikan struktur tabel dengan menambahkan nama dan tipe field. Laravel secara default akan menentukan panjang tipe field seperti string atau integer..
            Semua field dituliskan dalam fungsi up(), sambil memperhatikan nama tabel setelah Schema::create. Jangan hapus baris $table->timestamp() untuk menghindari kesalahan saat migrasi tabel. Fungsi down() digunakan untuk menghapus tabel jika diperlukan.
        e.	Jalankan Migration ke Database Aktual
            Setelah langkah-langkah di atas dilakukan, jalankan perintah berikut untuk memasukkan tabel ke dalam database aktual:
            php artisan migrate
            Setelah migrasi berhasil, cek phpMyAdmin untuk melihat hasilnya. Tabel baru akan muncul tanpa perlu membuat database atau menambahkannya secara manual.
        f.	Tabel produk sudah berhasil ditambahkan ke database Laravel. Secara otomatis, Laravel juga akan menambahkan tabel failed_jobs, migrations, password_resets, dan users saat instalasi, tanpa memerlukan intervensi manual.
    3.	Kesalahan Saat Melakukan Fungsi Migrate
        1). Pastikan layanan database aktif dan pastikan bahwa database yang dituju sudah dibuat sebelumnya. Jika tidak dijalankan, Laravel tidak akan dapat terhubung ke database.
        2). Periksa dengan teliti penulisan skema atau struktur tabel sesuai dengan pedoman Laravel. Dokumentasi resmi Laravel dapat menjadi panduan yang berguna untuk memastikan kesesuaian.
        3). Jangan hapus bagian $table->timestamp(). Bagian ini penting karena menciptakan dua field, yaitu created_at dan updated_at.
        4). Pastikan untuk tidak menghapus fungsi down(). Fungsi ini berperan penting dalam penghapusan tabel yang sudah ada, menghindari potensi konflik.
        5). Tidak disarankan mengetik manual file migration. Gunakan perintah dan alat yang disediakan Laravel untuk meminimalkan risiko kesalahan.
            Mungkin ada faktor-faktor lain yang dapat menyebabkan error saat migrasi. Stack Overflow seringkali menyediakan diskusi dan solusi untuk kendala-kendala yang mungkin muncul. Meskipun beberapa kesalahan tersebut umumnya dialami oleh pengguna migrasi baru, jangan khawatir karena jika terjadi kesalahan, migrasi tidak akan dieksekusi, dan database akan tetap aman.
    4.	Fungsi-fungsi Lain di Dalam Migration
        Menghapus Tabel
        1)	Menghapus migrasi atau tabel paling terakhir:  php artisan migrate:rollback  
        2)	Menghapus beberapa migrasi atau tabel terakhir:  php artisan migrate:rollback --step=5  
        3)	Menghapus semua migrasi atau tabel:  php artisan migrate:reset  
        4)	Menghapus semua tabel dan mengembalikannya kembali:  php artisan migrate:refresh  
        5)	
B.	Seeder
    1.	Pengertian
            Seeder dalam Laravel adalah class yang otomatis mengisi database dengan data awal atau dummy data. Dengan Seeder, pengembang dapat membuat data awal secara konsisten untuk setiap penggunaan aplikasi. Seeder memungkinkan pengisian data besar ke database menggunakan Model Factories tanpa perlu menambahkannya satu per satu melalui antarmuka database. 
        Dengan menulis kode sekaligus, Seeder akan secara otomatis memasukkan data ke dalam database.
        Seeder sangat bermanfaat dalam pengembangan, pengujian, dan pemeliharaan aplikasi, memungkinkan pengembang untuk dengan mudah mengelola data seperti menambahkan, mengubah, atau menghapus data. Ini mempermudah pengujian aplikasi tanpa perlu mengisi database secara manual.
    2.	Cara menggunakan Seeder pada Laravel
        Cara kerja Seeder pada Laravel sangat sederhana. Untuk menggunakan Seeder, hal pertama yang perlu kita lakukan adalah menentukan model serta data yang akan dimasukkan pada database. Misalnya, kita ingin membuat Seeder untuk model User, maka langkah-langkah yang perlu dilakukan diantaranya sebagai berikut:

        1.	Kita perlu membuat file Seeder dengan menggunakan command artisan sebagai berikut:
            php artisan make:seeder UserSeeder
        2.	Buka file Seeder yang sudah kita buat sebelumnya. Pada method `run()`, kita dapat menuliskan kode Seeder untuk memasukkan data yang telah kita tentukan ke dalam database.
            use Illuminate\Database\Seeder;
                use App\User;
                class UserSeeder extends Seeder
                {
                    public function run()
                    {
                        User::create([
                            'name' => 'Oliver Sykes',
                            'email' => 'oliversykes@example.com',
                        ]);

                        User::create([
                            'name' => 'Synyster Gates',
                            'email' => 'synystergates@example.com',
                        ]);
                    }
                }
        3.	Kita perlu menjalankan command artisan berikut untuk memasukkan data ke dalam database dengan menggunakan Seeder yang telah kita buat.
            php artisan db:seed --class=UserSeeder
C.	MVC Laravel Framework
    1.	Pengertian
            MVC, singkatan dari Model-View-Controller, adalah sebuah paradigma desain perangkat lunak yang bertujuan untuk memisahkan aplikasi menjadi tiga komponen utama, yaitu Model, View, dan Controller. 
        Tujuan utama dari pendekatan ini adalah untuk meningkatkan modularitas, mempermudah pemeliharaan, dan meningkatkan fleksibilitas dalam pengembangan perangkat lunak.
    2.	Komponen yang ada pada Laravel untuk mendukung konsep MVC
        1.	Routes
            Router merupakan bagian yang mengurusi pemetaan/mapping antara url dengan kontroler. Fungsi tersebut dituliskan dalam file yang berada folder routes yang bernama web.php
            Ada beberapa model penulisan pada route, satu di antaranya adalah sebagai berikut:

            a. Route::method(‘link’, ‘namacontroller@methodcontroller’);
            b. Route::get(‘/about’,’PagesController@about’);
        2.	Controller
            Controller berisi method-method yang berisi perintah yang harus dilakukan pada suatu method. Setelah Route menghubungkan ke controller dan method mana yang akan dituju, method suatu controller akan mengembalikan nilai atau tujuan url yang akan dituju. Pada laravel, direktori controller berada di app>Http>Controller.
            Untuk membuat controller di laravel ada beberapa cara, di antarnya:
            a.	Kamu bisa langsung membuat file [namakontroller].php pada direktori kontrollernya langsung.
            b.	Kamu bisa memanfaatkan fitur yang ada di Laravel, yaitu kamu bisa menuliskan perintah di terminal berikut:
                php artisan make:controller [namacontroller]
                Di bawah merupakan contoh dari skrip controller.

                    ?php
                    namespace App\Http\Controllers;

                    use Illuminate\Http\Request;

                    class PagesController extends Controller
                    {
                        public function home()
                        {

                            return view('index');
                        }

                        public function about()
                        {

                            return view('about');
                        }
                    }
                Skrip di atas menunjukkan bahwa controller PagesController memiliki dua method, yaitu home() dan about(). home() mengembalikan tampilan ‘Index’, 
                artinya pada saat method tersebut dipanggil, web kamu akan menuju ke tampilan yang memiliki nama file index.blade.php (akan dibahas selanjutnya).	
        3.	View
            View merupakan file berisi kode yang akan menampilkan desain dari web kamu. Pada laravel, file view berada pada direktori resources>views. Format dari nama file view adalah [namaview].blade.php.	


                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Daftar Mahasiswa</title>
                </head>
                <body>
                    <h1>Daftar Mahasiswa</h1>

                    <table border="1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Email</th>
                                <th>Jurusan</th>
                                <th>Waktu Dibuat</th>
                                <th>Waktu Diperbarui</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->nama }}</td>
                                <td>{{ $student->nim }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->jurusan }}</td>
                                <td>{{ $student->created_at }}</td>
                                <td>{{ $student->updated_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </body>
                </html>

            Di atas merupakan contoh skrip dari tampilan (view). Karena ekstensi file view adalah .php, maka skrip di file tersebut ditulis dalam bahasa pemrograman PHP. 
            Laravel menyediakan beberapa-beberapa fungsi untuk mempermudah pengodingan view, satu di antaranya adalah blade templating.
        4.	Model
                Model merupakan salah satu komponen MVC yang berhubungan langsung dengan database. Di database sendiri model dipresentasikan tabel-tabel yang nantinya diisi dengan data. Model berisi atribut yang nantinya atribut tersebut menjadi kolom pada tabel database.
            Direktori model pada laravel terletak di app>Http. Pada contoh di samping, Aku punya tiga model yaitu Student dan User.
            Pembuatan model di laravel dapat kamu lakukan dengan membuat migrationnya terlebih dahulu (akan dibahas pada blog lain). Setelah file migration dibuat, kita akan menuliskan tipe atribut dan nama atribut dari model yang mau kita buat.
            Setelah itu kita dapat langsung menuliskan di terminal dengan perintah: php artisan make:model [namamodel]

                ?php

                namespace App\Http\Models;

                use Illuminate\Database\Eloquent\Model;
                use Illuminate\Database\Eloquent\SoftDeletes;

                class Student extends Model
                {
                    use SoftDeletes;

                    protected $fillable = [
                        'nama', 'nim', 'email', 'jurusan'
                    ];
                }

            Dalam skrip di atas, kita memiliki model bernama Student dengan atribut seperti nama, nim, email, dan jurusan. Model ini merepresentasikan struktur data yang akan disimpan dalam tabel database. 
            Ketika kita membuat tabel menggunakan migration, Laravel secara otomatis menambahkan beberapa atribut ke dalam tabel tersebut, seperti id, created_at, updated_at, dan deleted_at.
            a.	id (Primary Key)
                Atribut id adalah primary key dari tabel. Primary key digunakan sebagai identifikasi unik untuk setiap baris dalam tabel. Ini memastikan bahwa setiap baris memiliki nilai id yang berbeda.
            b.	created_at dan updated_at
                Atribut created_at menunjukkan waktu ketika baris pertama kali dibuat (inserted) ke dalam tabel.
                Atribut updated_at menunjukkan waktu terakhir kali baris diperbarui.
            c.	deleted_at
                Atribut deleted_at adalah bagian dari fitur "soft delete" pada Laravel. Jika sebuah baris dihapus secara logis, Laravel akan menandai waktu di atribut deleted_at tanpa menghapus data secara fisik. Ini memungkinkan pemulihan data yang dihapus.
                Terlihat tampilan web yang menampilkan data dari tabel students. Data ini diambil dari database dan ditampilkan ke pengguna melalui antarmuka web. 
                Keseluruhan proses ini memanfaatkan model, migration, dan konsep "soft delete" yang disediakan oleh Laravel untuk mempermudah pengelolaan data dalam aplikasi -->
