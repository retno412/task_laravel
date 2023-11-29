<?php

// Nama     : Yunida Octavia Azzahra
// NIM      : 2209759
// Kelas    : 3A PSTI

// Resume  Laravel

// Migration
// Migration adalah fitur Laravel yang digunakan untuk mengelola perubahan struktur database. Dengan menggunakan migration, Anda dapat membuat tabel baru, mengubah struktur tabel yang ada, atau menghapus tabel.
// Berikut adalah beberapa contoh penggunaan migration:
//1. Membuat tabel baru: Jika Anda ingin menambahkan tabel baru ke database, Anda dapat menggunakan migration untuk membuat tabel tersebut.
//2. Mengubah struktur tabel: Jika Anda ingin mengubah struktur tabel yang ada, Anda dapat menggunakan migration untuk mengubah struktur tersebut.
//3. Menghapus tabel: Jika Anda ingin menghapus tabel dari database, Anda dapat menggunakan migration untuk menghapus tabel tersebut.
// Kode ini akan membuat tabel baru bernama posts dengan tiga kolom:
//1. id: Kolom ini adalah primary key tabel.
//2. title: Kolom ini menyimpan judul postingan.
//3. content: Kolom ini menyimpan isi postingan.
//Untuk menjalankan migration, Anda dapat menggunakan:
php artisan migrate --name=create_users_table

// 2. Seeder
// Seeder dalam Laravel adalah fitur yang digunakan untuk mengisi database dengan data awal. Seeder sangat berguna untuk:
// Mengimpor data dari file ke database.
//Untuk menjalankan seeder, Anda dapat menggunakan perintah artisan:
php artisan db:seed
// Cara membuat seeder :
    // 1. membuat file seeder lalu jalankan pada terminal dengan perintah : php artisan make:seeder namafileSeeder
    // 2. Pada file contoh seeder dapat dimasukan code berupa berikut :
            namespace Database\Seeders;

            use Illuminate\Database\Console\Seeds\WithoutModelEvents;
            use Illuminate\Database\Seeder;
            use Illuminate\Support\Facades\DB;
            use Faker\Factory as Faker;
            
            class StudentSeeder extends Seeder
            {
                public function run()
                {
                    $faker = Faker::create();
                    $data = [
                        ['id' => 1, 'name' => 'NADYA', 'score' => '16'],
                        ['id' => 2, 'name' => 'NADA', 'score' => '11'],
                        ['id' => 3, 'name' => 'PRADISTA', 'score' => '22'],
                    ];
                    for ($i = 4; $i < 50; $i++){
                    $data [] = ['id' => $i + 1, 'name' => $faker->name(), 'score' => $faker->numberBetween(10, 50)];
                    }
                    DB::table('student')->insert($data);
                }
            }

    
// 3. MVC
//MVC adalah pola arsitektur yang populer untuk mengembangkan aplikasi web dan aplikasi desktop. Ini adalah pola arsitektur yang kuat dan dapat diterapkan pada berbagai jenis aplikasi. pola arsitektur software yang membagi aplikasi menjadi tiga komponen utama:
    //A). Model bertanggung jawab untuk menangani data aplikasi. Ini termasuk menyimpan, mengambil, dan mengubah data.
    // untuk melakukannya masukan perintah di terminal berupa : "artisan make:model student"
    // setelah itu akan tercipta file Models pada folder dengan isi codenya :
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    
    class Student extends Model
    {
        use HasFactory;
    }

    //B). View: View bertanggung jawab untuk menampilkan data ke pengguna. Ini termasuk membuat antarmuka pengguna (UI) dan memformat data untuk ditampilkan.
    // didalam file php di isi dengan komponen berupa html contoh :
            //<html lang="en">
            //<head>
                //<meta charset="UTF-8">
                //<meta name="viewport" content="width=device-width, initial-scale=1.0">
                //<title>Document</title>
            ///</head>
            //<body>
                //<p>Hello World!</p>
            //</body>
            //</html>
    // Kode ini akan menampilkan pesan "Hello World!" dalam bentuk HTML. Kode ini tidak menggunakan kode PHP untuk menampilkan data dan tidak dapat mengakses data dari model.
    // kemudian memasuki folder routers dan masuk ke sebuah file php dengan nama "web.php" dan isi dengan code berikut :
            
    route::get('/greeting', function () {
        return view('example');
    });
    //C). Controller: Controller bertanggung jawab untuk menghubungkan model dan view. Ini menerima permintaan dari pengguna, mengambil data dari model, dan mengirimkan data ke view untuk ditampilkan.
    // Controller berfungsi sebagai menerima permintaan dari pengguna, Mengambil data dari model, Mengirim data ke view, Menghasilkan respons.
    // Untuk membuat file dengan cara membuka terminal kemudian masukan php artisan make:controller StudentController
    // file php StudentController isi dengan :
            namespace App\Http\Controllers;

            use Illuminate\Http\Request;
            use App\Models\Student;
            
            class StudentController extends Controller
            {
                public function show($id){
                    $name = Student::find ($id) -> name;
                    return view('example', ['name' => $name]);
                }
            }
?>