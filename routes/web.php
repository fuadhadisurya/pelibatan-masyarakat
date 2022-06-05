<?php

use App\Http\Controllers\admin_dashboard\admin\BeritaController;
use App\Http\Controllers\admin_dashboard\auth\LoginController;
use App\Http\Controllers\admin_dashboard\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin_dashboard\admin\data_event\DeskripsiController;
use App\Http\Controllers\admin_dashboard\admin\data_event\DokumentasiController;
use App\Http\Controllers\admin_dashboard\admin\data_kelas\DataPesertaController;
use App\Http\Controllers\admin_dashboard\admin\data_kelas\HomeController;
use App\Http\Controllers\admin_dashboard\admin\data_kelas\MateriController;
use App\Http\Controllers\admin_dashboard\admin\data_kelas\PresensiController;
use App\Http\Controllers\admin_dashboard\admin\data_kelas\TugasController;
use App\Http\Controllers\admin_dashboard\admin\DataKelasController;
use App\Http\Controllers\admin_dashboard\admin\KelasController;
use App\Http\Controllers\admin_dashboard\admin\data_kelas\ForumController;
use App\Http\Controllers\admin_dashboard\admin\data_kelas\QuizController;
use App\Http\Controllers\admin_dashboard\admin\data_kelas\QuizJawabanController;
use App\Http\Controllers\admin_dashboard\admin\data_kelas\SilabusController;
use App\Http\Controllers\admin_dashboard\admin\data_kelas\SilabusDetailController;
use App\Http\Controllers\admin_dashboard\admin\data_kelas\TestimoniController;
use App\Http\Controllers\admin_dashboard\admin\DataEventController;
use App\Http\Controllers\admin_dashboard\admin\EventController;
use App\Http\Controllers\admin_dashboard\admin\KategoriBeritaController;
use App\Http\Controllers\admin_dashboard\admin\TutorController;
use App\Http\Controllers\admin_dashboard\auth\RegistrasiController;
use App\Http\Controllers\admin_dashboard\tutor\DashboardController as TutorDashboardController;
use App\Http\Controllers\admin_dashboard\peserta\DashboardController as PesertaDashboardController;
use App\Http\Controllers\admin_dashboard\peserta\EventController as PesertaEventController;
use App\Http\Controllers\admin_dashboard\peserta\eventku\DeskripsiController as PesertaEventkuDeskripsiController;
use App\Http\Controllers\admin_dashboard\peserta\eventku\DokumentasiController as PesertaEventkuDokumentasiController;
use App\Http\Controllers\admin_dashboard\peserta\EventkuController as PesertaEventkuController;
use App\Http\Controllers\admin_dashboard\peserta\KelasController as PesertaKelasController;
use App\Http\Controllers\admin_dashboard\peserta\kelasku\ForumController as PesertaKelaskuForumController;
use App\Http\Controllers\admin_dashboard\peserta\kelasku\HomeController as PesertaKelaskuHomeController;
use App\Http\Controllers\admin_dashboard\peserta\kelasku\JawabanTugasController as PesertaKelaskuJawabanTugasController;
use App\Http\Controllers\admin_dashboard\peserta\kelasku\MateriController as PesertaKelaskuMateriController;
use App\Http\Controllers\admin_dashboard\peserta\kelasku\PesertaController as PesertaKelaskuPesertaController;
use App\Http\Controllers\admin_dashboard\peserta\kelasku\PresensiController as PesertaKelaskuPresensiController;
use App\Http\Controllers\admin_dashboard\peserta\kelasku\QuizController as PesertaKelaskuQuizController;
use App\Http\Controllers\admin_dashboard\peserta\kelasku\SertifikatController as PesertaKelaskuSertifikatController;
use App\Http\Controllers\admin_dashboard\peserta\kelasku\SilabusController as PesertaKelaskuSilabusController;
use App\Http\Controllers\admin_dashboard\peserta\kelasku\TestimoniController as PesertaKelaskuTestimoniController;
use App\Http\Controllers\admin_dashboard\peserta\kelasku\TugasController as PesertaKelaskuTugasController;
use App\Http\Controllers\admin_dashboard\peserta\KelaskuController as PesertaKelaskuController;
use App\Http\Controllers\admin_dashboard\tutor\kelasku\ForumController as TutorKelaskuForumController;
use App\Http\Controllers\admin_dashboard\tutor\kelasku\HomeController as TutorKelaskuHomeController;
use App\Http\Controllers\admin_dashboard\tutor\kelasku\MateriController as TutorKelaskuMateriController;
use App\Http\Controllers\admin_dashboard\tutor\kelasku\PesertaController as TutorKelaskuPesertaController;
use App\Http\Controllers\admin_dashboard\tutor\kelasku\PresensiController as TutorKelaskuPresensiController;
use App\Http\Controllers\admin_dashboard\tutor\kelasku\QuizController as TutorKelaskuQuizController;
use App\Http\Controllers\admin_dashboard\tutor\kelasku\QuizJawabanController as TutorQuizJawabanController;
use App\Http\Controllers\admin_dashboard\tutor\kelasku\QuizSoalController;
use App\Http\Controllers\admin_dashboard\tutor\kelasku\SilabusController as TutorKelaskuSilabusController;
use App\Http\Controllers\admin_dashboard\tutor\kelasku\SilabusDetailController as TutorKelaskuSilabusDetailController;
use App\Http\Controllers\admin_dashboard\tutor\kelasku\TestimoniController as TutorKelaskuTestimoniController;
use App\Http\Controllers\admin_dashboard\tutor\kelasku\TugasController as TutorKelaskuTugasController;
use App\Http\Controllers\admin_dashboard\tutor\KelaskuController as TutorKelaskuController;
use App\Http\Controllers\DaerahController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\SertifikatPDFController;
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

Route::middleware(['cekLogin'])->group(function(){
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'postLogin'])->name('postlogin');
    Route::get('/lupa-password', [LoginController::class, 'lupaPassword']);
    Route::get('/registrasi', [RegistrasiController::class, 'registrasi'])->name('registrasi');
    Route::post('/registrasi', [RegistrasiController::class, 'postRegistrasi'])->name('postRegistrasi');
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('provinces', [DaerahController::class, 'provinces'])->name('provinces');
Route::get('cities', [DaerahController::class, 'cities'])->name('cities');
Route::get('districts', [DaerahController::class, 'districts'])->name('districts');
Route::get('villages', [DaerahController::class, 'villages'])->name('villages');

Route::get('/sertifikat', [SertifikatPDFController::class, 'index']);

Route::prefix('admin')->group(function(){
    Route::get('/dashboard', [AdminDashboardController::class, 'index']);
    Route::get('/profil', [PengaturanController::class, 'profil']);
    Route::get('/akun', [PengaturanController::class, 'akun']);
    // Kelas Pelibatan Masyuarakat
    Route::resource('tutor', TutorController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('data-kelas', DataKelasController::class);
    Route::resource('data-kelas.home', HomeController::class);
    Route::resource('data-kelas.silabus', SilabusController::class);
    Route::resource('data-kelas.silabus.detail', SilabusDetailController::class);
    Route::resource('data-kelas.peserta', DataPesertaController::class);
    Route::middleware(['statusKelasAdmin:Kegiatan Berlangsung,Selesai'])->group(function(){
        Route::post('/data-kelas/{data_kela}/forum/{post_id}/comment', [ForumController::class, 'commentStore'])->name('data-kelas.forum.comment.store');
        Route::put('/data-kelas/{data_kela}/forum/{post_id}/comment/{id}', [ForumController::class, 'commentUpdate'])->name('data-kelas.forum.comment.update');
        Route::delete('/data-kelas/{data_kela}/forum/{post_id}/comment/{id}', [ForumController::class, 'commentDestroy'])->name('data-kelas.forum.comment.destroy');
        Route::resource('data-kelas.forum', ForumController::class);
        Route::resource('data-kelas.materi', MateriController::class);
        Route::get('/data-kelas/{data_kela}/tugas/{tugas}/periksa-tugas/{id}', [TugasController::class, 'periksaTugas'])->name('data-kelas.tugas.periksa-tugas.show');
        Route::resource('data-kelas.tugas', TugasController::class);
        Route::resource('data-kelas.presensi', PresensiController::class);
        Route::resource('data-kelas.quiz', QuizController::class);
        Route::resource('data-kelas.quiz.jawaban', QuizJawabanController::class);
        Route::resource('data-kelas.testimoni', TestimoniController::class);
    });
    // Berita Area
    Route::resource('kategori-berita', KategoriBeritaController::class);
    Route::resource('berita', BeritaController::class);
    // Event
    Route::resource('event', EventController::class);
    Route::resource('data-event', DataEventController::class);
    Route::resource('data-event.deskripsi', DeskripsiController::class);
    Route::resource('data-event.dokumentasi', DokumentasiController::class);
});
Route::prefix('tutor')->name('tutor.')->middleware(['auth', 'ceklevel:tutor'])->group(function(){
    Route::get('/dashboard', [TutorDashboardController::class, 'index']);
    Route::get('/profil', [PengaturanController::class, 'profil']);
    Route::get('/akun', [PengaturanController::class, 'akun']);
    Route::resource('kelasku', TutorKelaskuController::class)->only(['index']);
    Route::resource('kelasku.home', TutorKelaskuHomeController::class);
    Route::resource('kelasku.silabus', TutorKelaskuSilabusController::class);
    Route::resource('kelasku.silabus.detail', TutorKelaskuSilabusDetailController::class);
    Route::resource('kelasku.peserta', TutorKelaskuPesertaController::class);
    Route::middleware(['statusKelas:Kegiatan Berlangsung,Selesai'])->group(function(){
        Route::post('/kelasku/{kelas_id}/forum/{post_id}/comment', [TutorKelaskuForumController::class, 'commentStore'])->name('kelasku.forum.comment.store');
        Route::put('/kelasku/{kelas_id}/forum/{post_id}/comment/{id}', [TutorKelaskuForumController::class, 'commentUpdate'])->name('kelasku.forum.comment.update');
        Route::delete('/kelasku/{kelas_id}/forum/{post_id}/comment/{id}', [TutorKelaskuForumController::class, 'commentDestroy'])->name('kelasku.forum.comment.destroy');
        Route::resource('kelasku.forum', TutorKelaskuForumController::class);
        Route::resource('kelasku.materi', TutorKelaskuMateriController::class);
        Route::get('/kelasku/{kelas}/tugas/{tugas}/periksa-tugas/{id}', [TutorKelaskuTugasController::class, 'periksaTugas'])->name('kelasku.tugas.periksa-tugas.show');
        Route::put('/kelasku/{kelas}/tugas/{tugas}/periksa-tugas/{id}', [TutorKelaskuTugasController::class, 'periksaTugasStore'])->name('kelasku.tugas.periksa-tugas.update');
        Route::resource('kelasku.tugas', TutorKelaskuTugasController::class);
        Route::resource('kelasku.presensi', TutorKelaskuPresensiController::class);
        Route::get('/kelasku/{kelas}/quiz/{tugas_id}/aktif', [TutorKelaskuQuizController::class, 'aktif'])->name('kelasku.quiz.aktif');
        Route::resource('kelasku.quiz', TutorKelaskuQuizController::class);
        Route::get('/kelasku/{kelas}/quiz/{quiz_id}/soal/{soal_id}/aktif', [QuizSoalController::class, 'aktif'])->name('kelasku.quiz.soal.aktif');
        Route::resource('kelasku.quiz.soal', QuizSoalController::class);
        Route::resource('kelasku.quiz.jawaban', TutorQuizJawabanController::class);
        Route::resource('kelasku.testimoni', TutorKelaskuTestimoniController::class);
    });
});
Route::prefix('peserta')->name('peserta.')->middleware(['auth', 'ceklevel:peserta'])->group(function(){
    Route::get('/dashboard', [PesertaDashboardController::class, 'index']);
    Route::get('/profil', [PengaturanController::class, 'profil']);
    Route::get('/akun', [PengaturanController::class, 'akun']);
    // Kelas Pelibatan Masyarakat
    Route::post('kelas/{id}', [PesertaKelasController::class, 'daftar'])->name('kelas.daftar');
    Route::resource('kelas', PesertaKelasController::class);
    Route::resource('kelasku', PesertaKelaskuController::class)->only(['index']);
    Route::resource('kelasku.home', PesertaKelaskuHomeController::class);
    Route::resource('kelasku.silabus', PesertaKelaskuSilabusController::class);
    Route::middleware(['cekRegistrasi', 'statusKelas:Kegiatan Berlangsung,Selesai'])->group(function(){
        // Forum
        Route::post('/kelasku/{kelasku}/forum/{post_id}/comment', [PesertaKelaskuForumController::class, 'commentStore'])->name('kelasku.forum.comment.store');
        Route::put('/kelasku/{kelasku}/forum/{post_id}/comment/{id}', [PesertaKelaskuForumController::class, 'commentUpdate'])->name('kelasku.forum.comment.update');
        Route::delete('/kelasku/{kelasku}/forum/{post_id}/comment/{id}', [PesertaKelaskuForumController::class, 'commentDestroy'])->name('kelasku.forum.comment.destroy');
        // Kirim Tugas
        Route::post('/kelasku/{kelasku}/kirim-tugas/{tugas_id}', [PesertaKelaskuJawabanTugasController::class, 'store'])->name('tugas.jawaban.store');
        // Jawaban Quiz
        Route::get('/kelasku/{kelasku}/quiz/{quiz_id}/jawaban', [PesertaKelaskuQuizController::class, 'hasil'])->name('quiz.jawaban.show');
        Route::post('/kelasku/{kelasku}/quiz/{quiz_id}/jawaban', [PesertaKelaskuQuizController::class, 'jawaban'])->name('quiz.jawaban.store');
        
        Route::resource('kelasku.peserta', PesertaKelaskuPesertaController::class);
        Route::resource('kelasku.forum', PesertaKelaskuForumController::class);
        Route::resource('kelasku.materi', PesertaKelaskuMateriController::class);
        Route::resource('kelasku.tugas', PesertaKelaskuTugasController::class);
        Route::resource('kelasku.presensi', PesertaKelaskuPresensiController::class);
        Route::resource('kelasku.quiz', PesertaKelaskuQuizController::class);
        Route::resource('kelasku.testimoni', PesertaKelaskuTestimoniController::class);
        Route::get('/kelasku/{kelasku}/sertifikat', [PesertaKelaskuSertifikatController::class, 'index']);
        Route::post('/kelasku/{kelasku}/sertifikat', [PesertaKelaskuSertifikatController::class, 'store'])->name('kelasku.sertikat.store');
    });
    // Event
    Route::post('event/{id}', [PesertaEventController::class, 'daftar'])->name('event.daftar');
    Route::resource('event', PesertaEventController::class);
    Route::resource('eventku', PesertaEventkuController::class)->only(['index']);
    Route::resource('eventku.deskripsi', PesertaEventkuDeskripsiController::class);
    Route::resource('eventku.dokumentasi', PesertaEventkuDokumentasiController::class);
});

Route::middleware(['auth', 'ceklevel:admin,tutor,peserta'])->group(function(){
    Route::get('/kelasku/{kelas}/materi/download/{id}', [DownloadController::class, 'materi'])->name("materi.download");
    Route::get('/kelasku/{kelas}/tugas/download/{id}', [DownloadController::class, 'tugas'])->name("tugas.download");
    Route::get('/kelasku/{kelas}/jawaban-tugas/download/{id}', [DownloadController::class, 'jawabanTugas'])->name("jawaban.tugas.download");
    Route::get('/eventku/{kelas}/dokumentasi/download/{id}', [DownloadController::class, 'dokumentasi'])->name("dokumentasi.download");
    Route::put('/profil', [PengaturanController::class, 'update_profil'])->name('profil.update');
    Route::put('/akun', [PengaturanController::class, 'update_akun'])->name('akun.update');
});
