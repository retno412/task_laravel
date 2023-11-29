<?php

// Nama     : Rani Yuniar
// NIM      : 2207021
// Kelas    : 3B PSTI


//1. Migration
    // Migration adalah fitur Laravel yang digunakan untuk mengelola perubahan struktur database.Migration dapat digunakan untuk membuat, mengubah, atau menghapus tabel database. Migration juga dapat digunakan untuk menambahkan atau menghapus kolom dari tabel database.
    //Untuk menjalankan migration, Anda dapat menggunakan:
        // php artisan migrate --name=create_users_table
    // Perintah ini akan membuat file migrasi baru di direktori database/migrations.
    // File migrasi akan berisi dua metode: up() dan down(). Metode up() digunakan untuk membuat perubahan pada skema database, dan metode down() digunakan untuk mengembalikan perubahan tersebut.


// 2. Seeder
    // Seeder pada Laravel merupakan fitur yang sangat berguna dalam membantu kita untuk memasukkan data awal yang telah ditentukan ke dalam database dengan mudah dan cepat.
    // Untuk membuat seeder, Anda dapat menggunakan perintah Artisan 
        // php artisan db:seed
    // Cara membuat seeder :
    // - membuat file seeder lalu jalankan pada terminal dengan perintah :
        //  php artisan make:seeder namafileSeeder
    // - Pada file contoh seeder dapat dimasukan code berupa berikut :
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
                        ['id' => 1, 'name' => 'RANI', 'score' => '13'],
                        ['id' => 2, 'name' => 'YUNIAR', 'score' => '11'],
                        ['id' => 3, 'name' => 'CANGTIP', 'score' => '20'],
                    ];
                    for ($i = 4; $i < 50; $i++){
                    $data [] = ['id' => $i + 1, 'name' => $faker->name(), 'score' => $faker->numberBetween(10, 50)];
                    }
                    DB::table('student')->insert($data);
                }
            }

 
            
// 3. MVC
    // MVC adalah sebuah pendekatan perangkat lunak yang memisahkan aplikasi logika dari presentasi. MVC memisahkan aplikasi berdasarkan komponen- komponen aplikasi, seperti : manipulasi data, controller, dan user interface.
    // Model, Model mewakili struktur data. Biasanya model berisi fungsi-fungsi yang membantu seseorang dalam pengelolaan basis data seperti memasukkan data ke basis data, pembaruan data dan lain-lain.
    // View, View adalah bagian yang mengatur tampilan ke pengguna. Bisa dikatakan berupa halaman web.
    // Controller, Controller merupakan bagian yang menjembatani model dan view.

        // Model bertanggung jawab untuk berinteraksi dengan database dan menyediakan data ke komponen View. Model biasanya diimplementasikan sebagai kelas PHP.
                    namespace App\Models;
                    use Illuminate\Database\Eloquent\Factories\HasFactory;
                    use Illuminate\Database\Eloquent\Model;

                    class Student extends Model
                    {
                        use HasFactory;
                    }

        // View bertanggung jawab untuk menampilkan data kepada pengguna. View biasanya diimplementasikan sebagai file HTML atau PHP.
        // didalam file php di isi dengan komponen berupa html contoh :
                    // <html lang="en">
                    // <head>
                    //     <meta charset="UTF-8">
                    //     <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    //     <title>Document</title>
                    // /</head>
                    // <body>
                    //     <p>Hello World!</p>
                    // </body>
                    // </html>
        // Kode ini akan menampilkan pesan "Hello World!" dalam bentuk HTML. Kode ini tidak menggunakan kode PHP untuk menampilkan data dan tidak dapat mengakses data dari model.
        // kemudian memasuki folder routers dan masuk ke sebuah file php dengan nama "web.php" dan isi dengan code berikut :
                    
                    route::get('/greeting', function () {
                        return view('example');
                    });

        // Controller bertanggung jawab untuk menerima input dari pengguna dan memprosesnya. Controller biasanya diimplementasikan sebagai kelas PHP.
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
