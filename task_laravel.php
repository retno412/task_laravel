_Materi Coding Migration Laravel Framework_

Migration adalah fitur Laravel untuk mengelola skema database.

Fungsi :
- Memudahkan pengembangan tim.
- Menjaga konsistensi skema database.
- Mempermudah rollback.

How to Make :
php artisan make:migration <nama-migration>

Isi File Migration :
- Method up(): dijalankan saat migration dijalankan.
- Method down(): dijalankan saat migration di-rollback.

How to Run :
php artisan migrate



_Materi Coding Seeder Laravel Framework_

Seeder adalah fitur Laravel untuk memasukkan data dummy ke dalam database.

Fungsi :
- Mempercepat proses development.
- Mempermudah proses testing.

How to Make :
php artisan make:seeder <nama-seeder>

Isi File Seeder :
Method run(): dijalankan saat seeder dijalankan.

How to Run :
php artisan db:seed



_Materi Coding MVC Laravel Framework_

MVC adalah arsitektur aplikasi web yang membagi aplikasi menjadi tiga bagian utama, yaitu:

- Model: bertanggung jawab untuk mengelola data.
- View: bertanggung jawab untuk menampilkan data ke pengguna.
- Controller: bertanggung jawab untuk menerima input dari pengguna dan mengontrol aliran aplikasi.

Fungsi :
MVC adalah arsitektur yang populer untuk pengembangan aplikasi web karena memiliki beberapa keunggulan, yaitu:

* *Kode yang terorganisir dan mudah dipahami.*
* *Proses pengembangan yang lebih mudah dan efisien.*
* *Kemampuan untuk melakukan unit testing dan integration testing.*


Model :
Model adalah kelas yang mewakili data di database. Model biasanya memiliki beberapa method untuk mengakses dan memanipulasi data di database.

View :
View adalah file HTML yang menampilkan data ke pengguna. View biasanya menggunakan template untuk membuat tampilan yang responsif dan dapat disesuaikan.

Controller :
Controller adalah kelas yang bertanggung jawab untuk menerima input dari pengguna dan mengontrol aliran aplikasi. Controller biasanya menggunakan routing untuk mengarahkan permintaan pengguna ke view yang sesuai.

Berikut adalah contoh aplikasi sederhana yang menggunakan MVC:

<?php

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['nama', 'nim'];
}

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();

        return view('mahasiswa.index', compact('mahasiswa'));
    }
}

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);


Demikian notes tentang coding migration, seeder, dan MVC Laravel Framework. Semoga bermanfaat.