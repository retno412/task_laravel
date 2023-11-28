<?php

// Nama : Reza Putra Ramadhan
// NIM : 2200086
// Kelas : 3A-PSTI


// Catatan Migration, Seeder, dan MVC

// * 1. Migration
// Fungsi dari migrasi sendiri memudahkan seseorang untuk menciptakan tabel pada database yang digunakan salah satunya pada phpmyadmin
// untuk dapat melakukannya pertama membuka terminal dan memasukan perintah : php artisan make:migration create_Students_table
// maka akan tercipta sebuah tabel pada database dan sebuah file di folder "belajar_laravel" terutama pada bagian migrations

// 2. Seeder
// Seeder sendiri digunakan untuk menciptakan sebuat data yang akan dimasukan kedalam tabel database yang dibuat
// Cara melakukannya :
    // 1) membuat file seeder terlebih dahulu pada terminal dengan perintah : php artisan make:seeder StudentSeeder
    // 2) Pada file php (StudentSeeder) dapat dimasukan code berupa berikut :
            namespace Database\Seeders;

            use Illuminate\Database\Console\Seeds\WithoutModelEvents;
            use Illuminate\Database\Seeder;
            use Illuminate\Support\Facades\DB;
            use Faker\Factory as Faker;
            
            class StudentSeeder extends Seeder
            {
                /**
                 * Run the database seeds.
                 * 
                 * @return void
                 */
                public function run()
                {
                    $faker = Faker::create();
                    $data = [
                        ['id' => 1, 'name' => 'Retno', 'score' => '80'],
                        ['id' => 2, 'name' => 'Ariyanti', 'score' => '85'],
                        ['id' => 3, 'name' => 'Nurningtias', 'score' => '90'],
                    ];
                    for ($i = 4; $i < 100; $i++){
                    $data [] = ['id' => $i + 1, 'name' => $faker->name(), 'score' => $faker->numberBetween(10, 100)];
                    }
                    DB::table('student')->insert($data);
                }
            }
    // 3) setelah selesai memasukan code yang telah dibuat dapat dilakukan mengirim code tersebut dan di eksekusi oleh database dengan membuka terminal dan memasukan perintah yaitu : "php artisan db:seed --class=StudentSeeder (menyesuaikan dengan nama class-nya)

    
// 3. MVC
    // a. Models
    // Models berfungsi untuk mengatur data, fungsi dan aturan dari aplikasi
    // untuk dapat melakukannya pertama memasukan perintah di terminal berupa : "artisan make:model student"
    // setelah itu akan tercipta file Models pada folder dengan isi codenya :
            namespace App\Models;

            use Illuminate\Database\Eloquent\Factories\HasFactory;
            use Illuminate\Database\Eloquent\Model;
            
            class Student extends Model
            {
                use HasFactory;
            }
    
    // b. Views
    // berfungi untuk mengatur tampilan atau output yang tampil di layar, tidak hanya berupa data, namun juga termasuk komponen lain, seperti gambar, video, diagram, dan sebagainya.
    // Untuk dapat bisa melakukannya pertama membuat sebuah file php dengan contoh "example.blade.php" didalam folder views
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
    //maka pada di web sendiri akan menambil html yang telah dibuat

    // c. Controller
    // Controller berfungsi sebagai mengatur menerima input dan menjalankan beberapa perintah untuk dijalankan di model.
    // Untuk melakukannya diawali membuat file dengan cara membuka terminal kemudian memasukan perintah php artisan make:controller StudentController
    // di file php StudentController di isi dengan :
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

    // pada file php yaitu web.php di isi dengan :
            //<html lang="en">
            //<head>
                //<meta charset="UTF-8">
                //<meta name="viewport" content="width=device-width, initial-scale=1.0">
                //<title>Document</title>
            ///</head>
            //<body>
                //<p>Hi, {{ $name }} !</p>
            //</body>
            //</html>

    // Setelah itu pada file php router isi code dengan berikut :
            route::get('/greeting/{id}', [StudentController::class, 'show']);

    //kemudian pada terminal masukkan perintah php artisan serve dan klik halaman web yang disediaka

?>