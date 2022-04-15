<?php
use App\Http\Controllers\admin_dashboard\auth\LoginController;
use App\Http\Controllers\admin_dashboard\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin_dashboard\admin\data_kelas\DataPesertaController;
use App\Http\Controllers\admin_dashboard\admin\data_kelas\HomeController;
use App\Http\Controllers\admin_dashboard\admin\data_kelas\MateriController;
use App\Http\Controllers\admin_dashboard\admin\data_kelas\PresensiController;
use App\Http\Controllers\admin_dashboard\admin\data_kelas\TugasController;
use App\Http\Controllers\admin_dashboard\admin\DataKelasController;
use App\Http\Controllers\admin_dashboard\admin\KelasController;
use App\Http\Controllers\admin_dashboard\admin\TutorController;
use App\Http\Controllers\admin_dashboard\auth\RegistrasiController;
use App\Http\Controllers\admin_dashboard\tutor\DashboardController as TutorDashboardController;
use App\Http\Controllers\admin_dashboard\peserta\DashboardController as PesertaDashboardController;
use App\Http\Controllers\admin_dashboard\peserta\KelasController as PesertaKelasController;
use App\Http\Controllers\admin_dashboard\peserta\kelasku\ForumController as PesertaKelaskuForumController;
use App\Http\Controllers\admin_dashboard\peserta\kelasku\JawabanTugasController as PesertaKelaskuJawabanTugasController;
use App\Http\Controllers\admin_dashboard\peserta\kelasku\MateriController as PesertaKelaskuMateriController;
use App\Http\Controllers\admin_dashboard\peserta\kelasku\PesertaController as PesertaKelaskuPesertaController;
use App\Http\Controllers\admin_dashboard\peserta\kelasku\PresensiController as PesertaKelaskuPresensiController;
use App\Http\Controllers\admin_dashboard\peserta\kelasku\SilabusController as PesertaKelaskuSilabusController;
use App\Http\Controllers\admin_dashboard\peserta\kelasku\TugasController as PesertaKelaskuTugasController;
use App\Http\Controllers\admin_dashboard\peserta\KelaskuController as PesertaKelaskuController;
use App\Http\Controllers\admin_dashboard\peserta\KelaskuHomeController as PesertaKelaskuHomeController;
use App\Http\Controllers\admin_dashboard\tutor\kelasku\MateriController as TutorKelaskuMateriController;
use App\Http\Controllers\admin_dashboard\tutor\kelasku\PesertaController as TutorKelaskuPesertaController;
use App\Http\Controllers\admin_dashboard\tutor\kelasku\PresensiController as TutorKelaskuPresensiController;
use App\Http\Controllers\admin_dashboard\tutor\kelasku\TugasController as TutorKelaskuTugasController;
use App\Http\Controllers\admin_dashboard\tutor\KelaskuController as TutorKelaskuController;
use App\Http\Controllers\admin_dashboard\tutor\KelaskuHomeController as TutorKelaskuHomeController;
use App\Http\Controllers\DaerahController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\PengaturanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/lupa-password', [LoginController::class, 'lupaPassword']);
Route::get('/registrasi', [RegistrasiController::class, 'registrasi'])->name('registrasi');
Route::post('/registrasi', [RegistrasiController::class, 'postRegistrasi'])->name('postRegistrasi');

Route::get('provinces', [DaerahController::class, 'provinces'])->name('provinces');
Route::get('cities', [DaerahController::class, 'cities'])->name('cities');
Route::get('districts', [DaerahController::class, 'districts'])->name('districts');
Route::get('villages', [DaerahController::class, 'villages'])->name('villages');

Route::prefix('admin')->middleware(['auth', 'ceklevel:admin'])->group(function(){
    Route::get('/dashboard', [AdminDashboardController::class, 'index']);
    Route::get('/profil', [PengaturanController::class, 'profil']);
    Route::get('/akun', [PengaturanController::class, 'akun']);
    Route::resource('tutor', TutorController::class);
    // Route::get('kelas-status/{id}', [KelasController::class, 'status'])->name('kelas.status');
    Route::resource('kelas', KelasController::class);
    Route::resource('data-kelas', DataKelasController::class);
    Route::resource('data-kelas.home', HomeController::class);
    Route::resource('data-kelas.silabus', HomeController::class);
    Route::resource('data-kelas.peserta', DataPesertaController::class);
    Route::resource('data-kelas.materi', MateriController::class);
    Route::resource('data-kelas.tugas', TugasController::class);
    Route::resource('data-kelas.presensi', PresensiController::class);
});
Route::prefix('tutor')->name('tutor.')->middleware(['auth', 'ceklevel:tutor'])->group(function(){
    Route::get('/dashboard', [TutorDashboardController::class, 'index']);
    Route::get('/profil', [PengaturanController::class, 'profil']);
    Route::get('/akun', [PengaturanController::class, 'akun']);
    Route::resource('kelasku', TutorKelaskuController::class)->only(['index']);
    Route::resource('kelasku.home', TutorKelaskuHomeController::class);
    Route::resource('kelasku.silabus', TutorKelaskuHomeController::class);
    Route::resource('kelasku.peserta', TutorKelaskuPesertaController::class);
    // Route::resource('kelasku.forum', TutorDataPesertaController::class);
    Route::resource('kelasku.materi', TutorKelaskuMateriController::class);
    Route::get('/kelasku/{kelas}/periksa-tugas/{tugas_id}', [TutorKelaskuTugasController::class, 'periksaTugas'])->name('kelasku.periksa-tugas.show');
    Route::put('/kelasku/{kelas}/periksa-tugas/{tugas_id}', [TutorKelaskuTugasController::class, 'periksaTugasStore'])->name('kelasku.periksa-tugas.update');
    Route::resource('kelasku.tugas', TutorKelaskuTugasController::class);
    Route::resource('kelasku.presensi', TutorKelaskuPresensiController::class);
});
Route::prefix('peserta')->name('peserta.')->middleware(['auth', 'ceklevel:peserta'])->group(function(){
    Route::get('/dashboard', [PesertaDashboardController::class, 'index']);
    Route::get('/profil', [PengaturanController::class, 'profil']);
    Route::get('/akun', [PengaturanController::class, 'akun']);
    Route::post('kelas/{id}', [PesertaKelasController::class, 'daftar'])->name('kelas.daftar');
    Route::resource('kelas', PesertaKelasController::class);
    Route::resource('kelasku', PesertaKelaskuController::class)->only(['index']);
    Route::resource('kelasku.home', PesertaKelaskuHomeController::class);
    Route::resource('kelasku.silabus', PesertaKelaskuSilabusController::class);
    Route::resource('kelasku.peserta', PesertaKelaskuPesertaController::class);
    Route::resource('kelasku.forum', PesertaKelaskuForumController::class);
    Route::resource('kelasku.materi', PesertaKelaskuMateriController::class);
    Route::post('/kelasku/{kelas}/kirim-tugas/{tugas_id}', [PesertaKelaskuJawabanTugasController::class, 'store'])->name('tugas.jawaban.store');
    Route::resource('kelasku.tugas', PesertaKelaskuTugasController::class);
    Route::resource('kelasku.presensi', PesertaKelaskuPresensiController::class);
    Route::resource('kelasku.test', PesertaKelaskuMateriController::class);
});

Route::middleware(['auth', 'ceklevel:admin,tutor,peserta'])->group(function(){
    Route::get('/kelasku/{kelas}/materi/download/{id}', [DownloadController::class, 'materi'])->name("materi.download");
    Route::get('/kelasku/{kelas}/tugas/download/{id}', [DownloadController::class, 'tugas'])->name("tugas.download");
    Route::get('/kelasku/{kelas}/jawaban-tugas/download/{id}', [DownloadController::class, 'jawabanTugas'])->name("jawaban.tugas.download");
    Route::put('/profil', [PengaturanController::class, 'update_profil'])->name('profil.update');
    Route::put('/akun', [PengaturanController::class, 'update_akun'])->name('akun.update');
});
