<?php

// Nama : Muhammad Ridhan Fadli Rahman
// NIM : 2202739
// Kelas : 3A PSTI

// Rangkuman Laravel

// Migration
// Migration adalah dalam konteks pengembangan perangkat lunak, khususnya dalam kerangka kerja seperti Laravel, merujuk pada proses atau file yang digunakan untuk mendefinisikan dan mengelola struktur database.
// dalam konteks pengembangan perangkat lunak, khususnya dalam kerangka kerja seperti Laravel, merujuk pada proses atau file yang digunakan untuk mendefinisikan dan mengelola struktur database.
//Fungsi Migration:
// 1. Definisi Struktur Tabel
// Mendefinisikan nama tabel, kolom, dan tipe data kolom.
// 2. Pelaksanaan Perubahan Struktur Tabel
// Menjalankan perubahan seperti membuat tabel baru, menambah atau menghapus kolom.
// 3. Evolusi Database
// Mendukung penyesuaian struktur database seiring perkembangan aplikasi.
// 4. Konsistensi dan Pelacakan Perubahan
// Menjaga konsistensi struktur database di berbagai lingkungan dan memberikan pelacakan perubahan.
// 5. Manajemen Versi Aplikasi
// Membantu dalam menyinkronkan struktur database dengan kode aplikasi.
// 6. Kemudahan Kolaborasi Tim
// Memfasilitasi kerja tim dengan definisi struktur database yang terdokumentasi dengan baik.
//Untuk menjalankan migration, kita dapat menggunakan kode:
php artisan migrate --name=create_users_table

// 2. Seeder
// Seeder adalah alat dalam pengembangan perangkat lunak (contohnya, di Laravel) yang digunakan untuk memasukkan data awal ke dalam tabel database, mempercepat proses pengembangan, dan memastikan konsistensi data uji.
//Untuk menjalankan seeder, kita dapat menggunakan perintah kode artisan:
php artisan db:seed

// Cara membuat seeder adalah sebagai berikut :
    // 1. membuat file seeder lalu buka terminnal, kemudian ketik kode pada terminal dengan perintah : php artisan make:seeder namafileSeeder
    // 2. Pada file contoh seeder dapat dimasukan kode sebagai berikut :
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
                        ['id' => 1, 'name' => 'Muhammad', 'score' => '20'],
                        ['id' => 2, 'name' => 'Ridhan', 'score' => '25'],
                        ['id' => 3, 'name' => 'Fadli', 'score' => '30'],
                        ['id' => 4, 'name' => 'Rahman', 'score' => '35'],
                    ];
                    for ($i = 4; $i < 50; $i++){
                    $data [] = ['id' => $i + 1, 'name' => $faker->name(), 'score' => $faker->numberBetween(10, 50)];
                    }
                    DB::table('student')->insert($data);
                }
            }

    
// 3. MVC
//MVC, atau Model-View-Controller, adalah pola desain arsitektur perangkat lunak yang membagi aplikasi menjadi tiga komponen utama untuk memisahkan logika bisnis, tampilan, dan pengelolaan input.
    //A). Model: Mewakili struktur data dan logika bisnis aplikasi. Model bertanggung jawab untuk mengelola data, aturan validasi, dan operasi bisnis lainnya. Ini biasanya tidak tahu atau peduli dengan cara data ini akan ditampilkan atau diakses.
    // untuk melakukannya masukan perintah di terminal berupa : "artisan make:model student"
    // kemudian akan tercipta file Models pada folder dengan isi kodenya :
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    
    class Student extends Model
    {
        use HasFactory;
    }

    //B). View: Menangani presentasi dan tampilan informasi kepada pengguna. Tampilan mengonversi data dari model menjadi antarmuka pengguna yang dapat dipahami. Tampilan hanya menangani presentasi dan tidak menangani logika bisnis.
    // Dalam file php di isi dengan komponen html dengan contoh :
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
    // kemudian memasuki folder routers dan masuk ke sebuah file php dengan nama "web.php" dan isilah dengan kode berikut :
            
    route::get('/greeting', function () {
        return view('example');
    });
    //C). Controller: Bertanggung jawab untuk menerima input dari pengguna, memprosesnya (biasanya dengan memperbarui model), dan memutuskan tampilan mana yang harus ditampilkan. Kontroler bertindak sebagai perantara antara model dan tampilan, memastikan bahwa mereka tidak saling bergantung.
    // Untuk membuat filenya dengan cara membuka terminal kemudian masukan kode disamping php artisan make:controller StudentController
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