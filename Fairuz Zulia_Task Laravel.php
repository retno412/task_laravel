<?php

// Nama : Fairuz Zulia Muntaha
// NIM : 2204655
// Kelas : 3B PSTI

// Resume materi Laravel

// Migration
// Migration adalah file yang digunakan untuk mendefinisikan struktur tabel database.
// Migration ditulis dalam PHP dan menggunakan Laravel's Schema Builder untuk membuat, mengubah, dan menghapus tabel dan kolom.
//Migration memiliki dua fungsi utama:
//1. Mendefinisikan struktur tabel database
    //Migration dapat digunakan untuk mendefinisikan struktur tabel database, termasuk nama tabel, kolom, dan jenis data kolom.
//2. Menjalankan perubahan struktur tabel database
    //Migration dapat digunakan untuk menjalankan perubahan struktur tabel database, seperti membuat tabel baru, mengubah kolom, atau menghapus tabel.
//Untuk menjalankan migration, Anda dapat menggunakan:
php artisan migrate --name=create_users_table

// 2. Seeder
// Seeder adalah file yang digunakan untuk mengisi database dengan data. Seeder ditulis dalam PHP dan menggunakan Laravel's Faker library untuk menghasilkan data realistis.
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
                        ['id' => 1, 'name' => 'Fairuz', 'score' => '19'],
                        ['id' => 2, 'name' => 'Zulia', 'score' => '2'],
                        ['id' => 3, 'name' => 'Muntaha', 'score' => '4'],
                    ];
                    for ($i = 4; $i < 50; $i++){
                    $data [] = ['id' => $i + 1, 'name' => $faker->name(), 'score' => $faker->numberBetween(10, 50)];
                    }
                    DB::table('student')->insert($data);
                }
            }

    
// 3. MVC
//MVC adalah singkatan dari Model-View-Controller. Ini adalah pola desain yang memisahkan kekhawatiran aplikasi menjadi tiga lapisan yang berbeda:
    //A). Model: Lapisan model mewakili data aplikasi. Ini bertanggung jawab untuk menyimpan dan mengambil data dari database.
    // untuk melakukannya masukan perintah di terminal berupa : "artisan make:model student"
    // setelah itu akan tercipta file Models pada folder dengan isi codenya :
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    
    class Student extends Model
    {
        use HasFactory;
    }

    //B). View: Lapisan view bertanggung jawab untuk menampilkan data ke pengguna. Ini menggunakan HTML dan bahasa templat lainnya untuk membuat antarmuka pengguna.
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
    // kemudian memasuki folder routers dan masuk ke sebuah file php dengan nama "web.php" dan isi dengan code berikut :
            
    route::get('/greeting', function () {
        return view('example');
    });
    //C). Controller: Lapisan controller bertindak sebagai perantara antara model dan view. Ini menerima permintaan dari pengguna, mengambil data dari model, dan meneruskannya ke view untuk dirender.
    // Controller berfungsi sebagai mengatur menerima input dan menjalankan beberapa perintah untuk dijalankan di model.
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