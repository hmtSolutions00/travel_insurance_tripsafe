<?php

use App\Http\Controllers\KelolaBenefitController;
use App\Http\Controllers\MstBenefitController;
use App\Http\Controllers\MstPaketAsuransiController;
use App\Http\Controllers\MstTipeAsuransiController;
use App\Http\Controllers\MstTipePelangganController;
use App\Http\Controllers\MstTipePerjalananController;
use App\Http\Controllers\MstWilayahController;
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

// Route::get('/', function () {
//     return view('admin.pages.dashboard')->name('dashboard');
// });

Route::get('/dashboard', function () {
    return view('admin.pages.dashboard');
})->name('dashboard'); // ✅ Benar

Route::get('/', function () {
    return view('frontend.pages.formpesanan');
});

Route::get('/data/penumpang', function () {
    return view('frontend.pages.formpenumpang');
});

Route::get('/last', function () {
    return view('frontend.pages.halamanterakhir');
});

Route::get('/contact-us', function () {
    return view('frontend.pages.contactus');
});



    // Route::get('/master/tipe/perjalanan/',[MstTipePerjalananController::class,'index'])->name('mstTipePerjalananIndex');
    // Route::get('/master/tipe/perjalanan/create/',[MstTipePerjalananController::class,'create'])->name('mstTipePerjalananCreate');

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
    
    
