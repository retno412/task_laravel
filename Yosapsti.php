<!-- MIGRATIONS -->

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Method ini bertanggung jawab untuk membuat tabel 'student' di database.
     */
    public function up(): void
    {
        // Membuat tabel baru bernama 'student'.
        Schema::create('student', function (Blueprint $table) {
            // Kolom kunci utama yang otomatis bertambah nilainya.
            $table->id();
            
            // Kolom untuk menyimpan nama siswa (tipe string).
            $table->string('name');
            
            // Kolom untuk menyimpan nilai siswa (tipe integer).
            $table->integer('score');
            
            // Timestamps untuk melacak pembuatan dan pembaruan terakhir dari catatan.
            $table->timestamps();
        });
    }

    /**
     * Mundurkan migrasi.
     *
     * Method ini bertanggung jawab untuk menghapus tabel 'student' jika migrasi perlu dibatalkan.
     */
    public function down(): void
    {
        // Menghapus tabel 'student' jika ada.
        Schema::dropIfExists('student');
    }
};

// <!-- SEEDERS -->

<?php

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
        // Membuat instansiasi Faker untuk menghasilkan data palsu
        $faker = Faker::create();

        // Data statis untuk catatan awal
        $data = [
            ['id'=> 1, 'name'=> 'Sumanto', 'score'=> 80],
            ['id'=> 2, 'name'=> 'Jokowi', 'score'=> 85],
            ['id'=> 3, 'name'=> 'Hikmat', 'score'=> 90],
            ['id'=> 4, 'name'=> 'Rivaldo S.Pd., M.Pd.', 'score'=> 95],
        ];     

        // Menghasilkan data palsu untuk catatan tambahan (dari ID 5 hingga 69)
        for ($i = 5; $i <= 69; $i++) {
            $data[] = [
                'id' => $i,
                'name' => $faker->name,
                'score' => $faker->numberBetween(69, 100)
            ];
        }

        // Memasukkan data yang dihasilkan ke dalam tabel 'student'
        DB::table('student')->insert($data);
    }
}

// MVC LARAVEL

// MODELS :

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Nama tabel dalam basis data yang terkait dengan model ini
    protected $table = 'students';

    // Kolom yang dapat diisi (fillable) saat menyimpan data
    protected $fillable = ['name', 'score'];
}

// CONTROLLER :

// File: app/Http/Controllers/StudentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Menampilkan daftar siswa.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua data siswa dari model Student
        $students = Student::all();

        // Menampilkan view 'students.index' dengan menyertakan data siswa
        return view('students.index', compact('students'));
    }

    /**
     * Menambahkan siswa baru ke basis data.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Menampilkan view 'students.create' untuk menambahkan siswa
        return view('students.create');
    }

    /**
     * Menyimpan siswa yang baru ditambahkan ke basis data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data siswa yang dikirimkan melalui formulir
        $request->validate([
            'name' => 'required|string',
            'score' => 'required|numeric',
        ]);

        // Menyimpan data siswa baru ke basis data menggunakan model Student
        Student::create($request->all());

        // Mengarahkan pengguna kembali ke daftar siswa setelah berhasil menambahkan siswa
        return redirect()->route('students.index')->with('success', 'Siswa berhasil ditambahkan!');
    }
}

// VIEWS (BLADE) :

@extends('layouts.app')

@section('content')
    <h1>Tambah Siswa Baru</h1>

    // <!-- Form untuk menambahkan siswa baru -->
    <form action="{{ route('students.store') }}" method="POST">
        @csrf <!-- Token CSRF untuk keamanan formulir -->

        // <!-- Input field untuk nama siswa -->
        <label for="name">Nama:</label>
        <input type="text" name="name" required>

        // <!-- Input field untuk nilai siswa -->
        <label for="score">Nilai:</label>
        <input type="number" name="score" required>

        // <!-- Tombol untuk mengirimkan formulir -->
        <button type="submit">Simpan</button>
    </form>
@endsection

