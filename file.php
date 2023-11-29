<?php

/*
 * fmway from Namaku inc a.k.a Mohamad Fikri
 * 2209847, 3B PSTI 2022
 * */

/*
 * 1. Migration, dalam laravel migration ini berguna ketika developer ingin mengelola database dengan php, tentunya dengan bantuan library illuminate milik laravel
 *    ada beberapa command atau perintah untuk melakukan migration pada laravel
 *    - php artisan make:migration create_<nama database>_table
 *      dengan perintah ini, laravel akan membuat file migration yang nantinya digunakan untuk membuat tabel pada database. Setelah perintah ini dijalankan, langkah selanjutnya adalah untuk mengedit file migration-nya (pada fungsi up). Berikut contoh membuat tabel students (usahakan menggunakan s karena itu sangatlah berguna untuk kedepannya) dengan atribut id (primary key), nama (string), dan score (int)
 **/
        public function up(): void
        {
            Schema::create('students', function (Blueprint $table) {
                $table->id(); // field id sebagai primary key
                $table->string('name'); // field name dengan tipe string atau varchar
                $table->integer('score'); // field score dengan tipe integer
            });
        }
/*
 *    - php artisan migrate 
 *      setelah mengedit file migrations-nya. langkah selanjutnya adalah migrate dimana perintah ini akan membuat database (baru jika memang belum dibuat) dengan field-field yang telah di tulis di function up tersebut
 *
 *  2. Seeder. Setelah membuat tabel-nya pastinya sebagai developer ingin menambahkan, atau mengedit data tersebut. Dalam laravel, hal ini dilakukan menggunakan seeder. Seperti biasa, sebelum melakukan seeding, hal pertama yang harus dilakukan adalah membuat file seeder-nya menggunakan perintah berikut.
 *     $ php artisan make:seeder <file-seeder/nama class seeder yang ingin dibuat>
 *     setelah merun perintah diatas akan menghasilkan file seeder pada folder database/seeder. Hal yang selanjutnya dilakukan adalah mengedit fungsi run pada file tersebut sesuai dengan apa yang akan dilakukan, disini saya contohkan untuk menambahkan record / data pada tabel students yang tadi telah dibuat menggunakan library faker.
 */ 
        public function run(): void
        {
            $faker = \Faker\Factory::create();
            // Ketik aja cuy
            $data = [];
            $data[] = ['id' => 1, 'name'=>'anu', 'score'=>25];
            $data[] = ['id'=>2, 'name'=>$faker->name(), 'score'=>$faker->numberBetween(0,100)];
            for ($i=3; $i<=50; $i++) {
            $data[] = ['id'=>$i, 'name'=>$faker->name(), 'score'=>$faker->numberBetween(0,100)];
            }
            DB::table('students')->insert($data);
        }
/*      Setelah mengedit fungsi run, langkah selanjutnya yaitu melakukan seeding menggunakan perintah berikut :
 *      $ php artisan db:seed --class=<nama class-nya>
 *      maka, tabel students akan bertambah datanya hingga 50 data
 * 3. MVC (Model, View, Controller), merupakan salah satu arsitektur pengembangan aplikasi, konsep ini marak digunakan para developer karena sederhana - dimana arsitektur ini hanya memiliki 3 bagian utama yaitu model, view dan controller. Tidak seperti clean arsitecture yang beuh, jangan ditanya. Nah selain itu mvc ini fleksibel, tidak hanya untuk pengembangan web saja, untuk pengembangan aplikasi lain pun bisa menggunakan mvc.
 *    a) Model, dari yang saya tahu, model pada laravel ini ialah yang menghubungkan tabel pada database yang nantinya bisa diakses, pada controller, contohnya seperti tabel students yang telah dibuat, maka untuk dapat mengakses tabel tersebut ialah menggunakan model, berbeda dengan seeders dimana seeders untuk menambahkan / mengisi tabel tersebut yang kosong (walaupun bisa untuk mengupdate / mengubahnya juga), model ini dapat melakukan hal tersebut ketika data pada tabel tersebut sudah terisi. untuk membuat model cukup menjalankan perintah berikut.
 *       $ php artisan make:model <nama tabel tanpa huruf s>
 *       dan model pun siap digunakan pada controller.
 *    b) View, seperti namanya view ini merupakan tampilan yang nantinya muncul di antarmuka client (web browser contohnya), untuk membuat view cukup menambahkan file pada resources/view/<nama view-nya>.blade.php 
 *       berikut contoh view yang saya buat
 */ 
?>
        <!-- file: resources/views/example.blade.php -->
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <title>php gak tuh</title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
            </head>
            <body>
                <p>Hiiii, {{ $name }}</p>
            </body>
        </html>
<?php
/*      dari kode diatas dapat dilihat html tersebut menerima parameter / variabel $name yang diapit 2 kurung kuraawal. variabel tersebut akan mengambil variabel yang telah disiapkan oleh controller.
 *    c) Controller, controller ini merupakan yang menjembatani antara model dan views. Untuk membuat controller menggunakan perintah berikut:
 *       $ php artisan make:controller <nama class-nya>
 *       langkah selanjutnya ialah membuat fungsi yang di inginkan, disini saya akan membuat fungsi show yang menerima parameter id, untuk mencari nama sesuai dengan id yang ada.
 */
          public function show($id) {
              $name = Student::find($id)->name;
              return view('example', ['name' => $name]);
          }
/*    Nah, kalau sudah dibuat controller-nya, bagaimana cara menampilkan view tersebut? Untuk menampilkannya bisa di routes dimana routes ini yang menerima semua url atau path pada web tersebut. berikut contoh untuk menampilkan view example (example.blade.php) pada path /greeting/[id] dimana id ini merupakan id pada tabel students yang akan dimasukkan pada fungsi show pada controller diatas. Untuk menambahkannya edit pada routes/web.php
 */
      Route::get('/greeting/{id}', [StudentController::class, 'show']);
/*    route siap digunakan, ketika client memasukkan url <host/domain>/greeting/1 maka, akan muncul Hiiii, <nama> dengan nama yang ada pada tabel satu yaitu anu
 *
 *    Thanks for Reading :)
 **/
