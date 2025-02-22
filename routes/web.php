<?php

use App\Http\Controllers\DetailCustomerController;
use App\Http\Controllers\HargaPaketController;
use App\Http\Controllers\KelolaBenefitController;
use App\Http\Controllers\MstBenefitController;
use App\Http\Controllers\MstPaketAsuransiController;
use App\Http\Controllers\MstTipeAsuransiController;
use App\Http\Controllers\MstTipePelangganController;
use App\Http\Controllers\MstTipePerjalananController;
use App\Http\Controllers\MstWilayahController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\WebsiteSettingController;
use App\Http\Controllers\PesananController;
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

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

//Halaman Yang dapat Diakses tanpa login

Route::get('/', [HargaPaketController::class, 'index'])->name('frontend.pages.formpesanan');

Route::get('get-asuransi', [HargaPaketController::class, 'get_paket_asuransi'])->name('getAsuransi');

Route::get('/data/penumpang/', [DetailCustomerController::class, 'index'])->name('frontend.pages.formpenumpang');

Route::post('/tambah/pesanan/asuransi', [DetailCustomerController::class, 'kirim_pesanan_asuransi'])->name('kirim-pesanan-asuransi');

Route::get('/response', [DetailCustomerController::class, 'response_pesanan'])->name('frontend.pages.halamanterakhir');
Route::get('/brosur/file', [DetailCustomerController::class, 'halaman_file'])->name('frontend.pages.halamanfile');
Route::get('/download/single', [DetailCustomerController::class, 'download_single'])->name('download_single');
Route::get('/download/annual', [DetailCustomerController::class, 'download_annual'])->name('download_annual');
Route::get('/download/religi', [DetailCustomerController::class, 'download_religi'])->name('download_religi');

Route::get('/contact-us', function () {
    return view('frontend.pages.contactus');
});



//halaman yang dapat diakses dengan login sebagai admin/superadmin rolesnya
Route::get('/dashboard', function () {
    return view('admin.pages.dashboard');
})->name('dashboard'); // ✅ Benar


    Route::prefix('master/tipe/perjalanan')->name('admin.master.tipe_perjalanan.')->group(function () {
        Route::get('/', [MstTipePerjalananController::class, 'index'])->name('index');
        Route::get('/create', [MstTipePerjalananController::class, 'create'])->name('create');
        Route::post('/store', [MstTipePerjalananController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [MstTipePerjalananController::class, 'edit'])->name('edit');  // ✅ Tambahkan {id}
        Route::put('/{id}/update', [MstTipePerjalananController::class, 'update'])->name('update'); // ✅ Tambahkan {id}
        Route::get('/{id}', [MstTipePerjalananController::class, 'show'])->name('show'); // ✅ Tambahkan {id}
        Route::delete('/{id}', [MstTipePerjalananController::class, 'destroy'])->name('destroy'); // ✅ Tambahkan {id}
    });

    Route::prefix('master/wilayah')->name('admin.master.wilayah.')->group(function () {
        Route::get('/', [MstWilayahController::class, 'index'])->name('index');
        Route::get('/create', [MstWilayahController::class, 'create'])->name('create');
        Route::post('/store', [MstWilayahController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [MstWilayahController::class, 'edit'])->name('edit');  // ✅ Tambahkan {id}
        Route::put('/{id}/update', [MstWilayahController::class, 'update'])->name('update'); // ✅ Tambahkan {id}
        Route::get('/{id}/detail', [MstWilayahController::class, 'show'])->name('show'); // ✅ Tambahkan {id}
        Route::delete('/{id}', [MstWilayahController::class, 'destroy'])->name('destroy'); // ✅ Tambahkan {id}
    });

    Route::prefix('master/tipe/asuransi')->name('admin.master.tipe_asuransi.')->group(function () {
        Route::get('/', [MstTipeAsuransiController::class, 'index'])->name('index');
        Route::get('/create', [MstTipeAsuransiController::class, 'create'])->name('create');
        Route::post('/store', [MstTipeAsuransiController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [MstTipeAsuransiController::class, 'edit'])->name('edit');  // ✅ Tambahkan {id}
        Route::put('/{id}/update', [MstTipeAsuransiController::class, 'update'])->name('update'); // ✅ Tambahkan {id}
        Route::get('/{id}/detail', [MstTipeAsuransiController::class, 'show'])->name('show'); // ✅ Tambahkan {id}
        Route::delete('/{id}', [MstTipeAsuransiController::class, 'destroy'])->name('destroy'); // ✅ Tambahkan {id}
    });

    Route::prefix('data/pesanan/')->name('admin.data.pesanan_asuransi.')->group(function () {
        Route::get('/', [PesananController::class, 'index'])->name('index');
        Route::get('/{id}/detail', [PesananController::class, 'show'])->name('show');
        Route::get('/{id}/belum-diproses', [PesananController::class, 'u_belum_diproses'])->name('belum.diproses');
        Route::get('/{id}/sudah-diproses', [PesananController::class, 'u_sudah_diproses'])->name('sudah.diproses');
        Route::get('/{id}/tidak-valid', [PesananController::class, 'u_tidak_valid'])->name('tidak.valid');
        Route::get('/{id}/butuh-konfirmasi', [PesananController::class, 'u_butuh_konfirmasi'])->name('butuh.konfirmasi');
        // Route::get('/create', [MstTipeAsuransiController::class, 'create'])->name('create');
        // Route::post('/store', [MstTipeAsuransiController::class, 'store'])->name('store');
        // Route::get('/{id}/edit', [MstTipeAsuransiController::class, 'edit'])->name('edit');  // ✅ Tambahkan {id}
        // Route::put('/{id}/update', [MstTipeAsuransiController::class, 'update'])->name('update'); // ✅ Tambahkan {id}
        // Route::get('/{id}/detail', [MstTipeAsuransiController::class, 'show'])->name('show'); // ✅ Tambahkan {id}
        // Route::delete('/{id}', [MstTipeAsuransiController::class, 'destroy'])->name('destroy'); // ✅ Tambahkan {id}
    });

    Route::prefix('master/tipe/pelanggan')->name('admin.master.tipe_pelanggan.')->group(function () {
        Route::get('/', [MstTipePelangganController::class, 'index'])->name('index');
        Route::get('/create', [MstTipePelangganController::class, 'create'])->name('create');
        Route::post('/store', [MstTipePelangganController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [MstTipePelangganController::class, 'edit'])->name('edit');  // ✅ Tambahkan {id}
        Route::put('/{id}/update', [MstTipePelangganController::class, 'update'])->name('update'); // ✅ Tambahkan {id}
        Route::get('/{id}/detail', [MstTipePelangganController::class, 'show'])->name('show'); // ✅ Tambahkan {id}
        Route::delete('/{id}', [MstTipePelangganController::class, 'destroy'])->name('destroy'); // ✅ Tambahkan {id}
    });
    Route::prefix('master/paket')->name('admin.paket_asuransi.')->group(function () {
        Route::get('/', [MstPaketAsuransiController::class, 'index'])->name('index');
        Route::get('/create', [MstPaketAsuransiController::class, 'create'])->name('create');
        Route::post('/store', [MstPaketAsuransiController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [MstPaketAsuransiController::class, 'edit'])->name('edit');  // ✅ Tambahkan {id}
        Route::put('/{id}/update', [MstPaketAsuransiController::class, 'update'])->name('update'); // ✅ Tambahkan {id}
        Route::get('/{id}/detail', [MstPaketAsuransiController::class, 'show'])->name('show'); // ✅ Tambahkan {id}
        Route::delete('/{id}', [MstPaketAsuransiController::class, 'destroy'])->name('destroy'); // ✅ Tambahkan {id}
    });
    Route::prefix('master/benefit')->name('admin.benefit_asuransi.')->group(function () {
        Route::get('/', [MstBenefitController::class, 'index'])->name('index');
        Route::get('/create', [MstBenefitController::class, 'create'])->name('create');
        Route::post('/store', [MstBenefitController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [MstBenefitController::class, 'edit'])->name('edit');  // ✅ Tambahkan {id}
        Route::put('/{id}/update', [MstBenefitController::class, 'update'])->name('update'); // ✅ Tambahkan {id}
        Route::get('/{id}/detail', [MstBenefitController::class, 'show'])->name('show'); // ✅ Tambahkan {id}
        Route::delete('/{id}', [MstBenefitController::class, 'destroy'])->name('destroy'); // ✅ Tambahkan {id}
    });

    Route::prefix('kelola/data_benefit')->name('kelola.data_benefit.')->group(function () {
        Route::get('/', [KelolaBenefitController::class, 'index'])->name('index');
        Route::get('/create', [KelolaBenefitController::class, 'create'])->name('create');
        Route::post('/store', [KelolaBenefitController::class, 'store'])->name('store');

        // ✅ Gunakan kombinasi insurance_type_id dan destionation_id
        Route::get('/{insurance_type_id}/{destionation_id}/edit', [KelolaBenefitController::class, 'edit'])->name('edit');
        Route::put('/{insurance_type_id}/{destionation_id}/update', [KelolaBenefitController::class, 'update'])->name('update');
        Route::get('/{insurance_type_id}/{destionation_id}/detail', [KelolaBenefitController::class, 'show'])->name('show');
        Route::delete('/{insurance_type_id}/{destionation_id}', [KelolaBenefitController::class, 'destroy'])->name('destroy');
    });
    
    //halaman yang hanya dapat diakses apabila role nya adalah superaddmin

      Route::prefix('settings/website')->name('seetings.webiste.')->group(function () {
        Route::get('/', [WebsiteSettingController::class, 'index'])->name('index');
        Route::get('/create', [WebsiteSettingController::class, 'create'])->name('create');
        Route::post('/store', [WebsiteSettingController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [WebsiteSettingController::class, 'edit'])->name('edit');  // ✅ Tambahkan {id}
        Route::put('/{id}/update', [WebsiteSettingController::class, 'update'])->name('update'); // ✅ Tambahkan {id}
        Route::get('/{id}/detail', [WebsiteSettingController::class, 'show'])->name('show'); // ✅ Tambahkan {id}
        Route::delete('/{id}', [WebsiteSettingController::class, 'destroy'])->name('destroy'); // ✅ Tambahkan {id}
    });

    Route::prefix('master/kelola/produk')->name('kelola.data_produk.')->group(function () {
        Route::get('/', [HargaPaketController::class, 'index_admin'])->name('index');
        Route::get('/create', [HargaPaketController::class, 'create'])->name('create');
        Route::post('/store', [HargaPaketController::class, 'store'])->name('store');
        Route::get('{id}/show', [HargaPaketController::class, 'show'])->name('show');
        Route::get('{id}/edit', [HargaPaketController::class, 'edit'])->name('edit');
        Route::post('{id}/update', [HargaPaketController::class, 'update'])->name('update');
        Route::get('{id}/delete', [HargaPaketController::class, 'destroy'])->name('destroy');
    });


