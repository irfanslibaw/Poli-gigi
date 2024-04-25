<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionDokterController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\Auth\PasswordResetLinkDokterController;
use App\Http\Controllers\Auth\EmailVerificationPromptControllerDokter;
use App\Http\Controllers\Auth\VerifyEmailControllerDokter;
use App\Http\Controllers\Auth\EmailVerificationNotificationControllerDokter;
use App\Http\Controllers\Auth\ConfirmablePasswordControllerDokter;
use App\Http\Controllers\Auth\NewPasswordControllerDokter;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\SuratRujukanController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\PdfC0ntroller;
use Illuminate\Http\Request;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\TagihanController;
use App\Models\Pemesanan;
use App\Models\Dokter;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ChartController::class, 'indexx'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['guest'])->group(function () {
    Route::view('/dokter/login', 'auth.logindokter', ['url' => 'dokter'])->name('dokter.login');
    Route::post('/dokter/login', [AuthenticatedSessionDokterController::class, 'storeDokter'])->name('dokter.login');
    Route::post('/dokter/logout', [AuthenticatedSessionDokterController::class, 'destroy'])->name('dokter.logout');
});

Route::middleware(['auth:dokter', 'dokter'])->group(function () {
    Route::get('/dokter/dashboard', [DokterController::class, 'dashboard'])->name('dashboarddokter');
});

// Show the reset password request form.
Route::get('dokter/forgot-password', [PasswordResetLinkDokterController::class, 'create'])
    ->middleware('guest')
    ->name('dokter.password.request');

// Handle reset password request.
Route::post('dokter/forgot-password', [PasswordResetLinkDokterController::class, 'store'])
    ->middleware('guest')
    ->name('dokter.password.email');

// Show the reset password form.
Route::get('dokter/reset-password/{token}', [NewPasswordControllerDokter::class, 'create'])
    ->middleware('guest')
    ->name('dokter.password.reset');

// Handle reset password form submission.
Route::post('dokter/reset-password', [NewPasswordControllerDokter::class, 'store'])
    ->middleware('guest')
    ->name('dokter.password.update');

Route::get('dokter/verify-email', EmailVerificationPromptControllerDokter::class)
    ->middleware('guest')
    ->name('dokter.verification.notice');

Route::get('dokter/verify-email/{id}/{hash}', VerifyEmailControllerDokter::class, 'create')
    ->middleware(['signed', 'throttle:6,1'])
    ->name('dokter.verification.verify');

Route::get('dokter/verify-email/{id}/{hash}', VerifyEmailControllerDokter::class, 'store')
    ->middleware(['signed', 'throttle:6,1'])
    ->name('dokter.verification.verify');

Route::post('dokter/email/verification-notification', [EmailVerificationNotificationControllerDokter::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('dokter.verification.send');

Route::get('dokter/confirm-password', [ConfirmablePasswordControllerDokter::class, 'show'])
    ->name('dokter.password.confirm');

Route::post('dokter/confirm-password', [ConfirmablePasswordControllerDokter::class, 'store']);

Route::put('password', [PasswordController::class, 'update'])->name('dokter.password2.update');

Route::resource('dokter', DokterController::class)->except('show')->middleware('auth');
Route::resource('obat', ObatController::class)->except('show')->middleware('auth');
Route::resource('pelayanan', PelayananController::class)->except('show')->middleware('auth');
Route::resource('pasien', PasienController::class)->except('show')->middleware('auth');
Route::resource('pengaduan', PengaduanController::class)->except('show')->middleware('auth');
Route::resource('ruang', RuangController::class)->except('show')->middleware('auth');

Route::resource('pemesanan', PemesananController::class)->except('show');



Route::get('/dokpasien', function () {
    $pemesanan = Pemesanan::where('dokter_id', auth()->user()->id)->where('status', 'B')->orderBy('tanggal', 'asc')->paginate(10);
    return view('dokpasien.index')->with('pemesanan', $pemesanan);
})->middleware(['auth:dokter', 'verified']);



Route::get('/tagihan', function (Request $request) {
    $katakunci = $request->katakunci;
        $baris = 10;
        if (strlen($katakunci)){
            $pemesanan = Pemesanan::where('tanggal', 'like', "%$katakunci%")
            ->paginate($baris);
        }
        else{
          $pemesanan = Pemesanan::where('status', 'S')->orderBy('tanggal', 'asc')->paginate($baris);
        }
    return view('tagihan.index')->with('pemesanan', $pemesanan);
})->middleware(['auth', 'verified']);

Route::get('/tagihan/{id}/info', [TagihanController::class, 'info'])
    ->middleware('auth')
    ->name('tagihaninfo');


Route::get('/jadwalklinik', function () {
    $dokter = Dokter::latest('id')->paginate(10);
    return view('jadwalklinik.index')->with('dokter',$dokter);
    });

Route::get('/rujukan/{id}/detail', [SuratController::class, 'detail'])
->middleware('auth');

Route::resource('rujukan', SuratController::class)->except('show')->middleware('auth');

Route::get('/kehadiran', [KehadiranController::class, 'info'])
->middleware('auth:dokter')
->name('kehadiran');

Route::get('/keuangan', [KeuanganController::class, 'index'])
->middleware('auth')
->name('keuangan');

Route::get('/keuangan/cetak', [KeuanganController::class, 'cetak'])
->middleware('auth');

Route::resource('pesan', PesanController::class)->except('show');

Route::controller(PdfC0ntroller::class)->group(function () {
    Route::get('/tagihan/{id}/invoice', 'invoice');
    Route::get('/rujukan/{id}/print', 'print');
});


require __DIR__ . '/auth.php';
