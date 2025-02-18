<?php

use App\Http\Controllers\MstTipePerjalananController;
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

Route::get('/', function () {
    return view('admin.pages.dashboard');
})->name('dashboard'); // ✅ Benar




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
    
    
