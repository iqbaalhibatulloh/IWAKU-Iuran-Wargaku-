<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WargaController;
use App\Models\Warga;
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

Route::get('/home', function () {
    return view('home');
})
->middleware(['auth', 'verified'])->name('home');
// Route::get('/payment', function () {
//     $data = [
//         'models' => Warga::all(),
//     ];
//     return view('payment', compact("models"));
// })->middleware(['auth', 'verified'])->name('payment');
Route::get('/memberList', function () {
    return view('memberList.memberList');
})->middleware(['auth', 'verified'])->name('memberList.index');
Route::get('/edit', function () {
    return view('memberList.editMemberList');
})->middleware(['auth', 'verified'])->name('memberList.editMemberList');
Route::get('/dokumen', function () {
    return view('dokumen');
})->middleware(['auth', 'verified'])->name('document.doc');
Route::get('/payment', function () {
    return view('payment.payment');
})->middleware(['auth', 'verified'])->name('payment');
Route::get('/opsiPayment', function () {
    return view('payment.opsiPayment');
})->middleware(['auth', 'verified'])->name('payment.opsiPayment');
Route::get('/detailPayment', function () {
    return view('payment.detailPayment');
})->middleware(['auth', 'verified'])->name('payment.detailPayment');
Route::get('/detailDoc', function () {
    return view('document.detailDoc');
})->middleware(['auth', 'verified'])->name('document.detailDoc');
Route::get('/docPemasukan', function () {
    return view('document.docPemasukan');
})->middleware(['auth', 'verified'])->name('document.docPemasukan');
Route::get('/docPengeluaran', function () {
    return view('document.docPengeluaran');
})->middleware(['auth', 'verified'])->name('document.docPengeluaran');

// Route::get('/detailDoc', function () {
//     return view('document.detailDoc');
// });

// Route::get('/memberlist/rt/{warga:alamat}', [WargaController::class, 'show'])->name("warga.show");
// Route::get('/memberlist/{rt}/rt', [WargaController::class, 'show'])->name("warga.show.byrt");
Route::get('/memberlist/{rt}/rt', function(string $rt){
    $wargas = Warga::where('alamat', $rt)->get();

    return view("memberList.detailMemberList", compact("wargas"));
})->name("memberList.show.byrt");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource("/warga", WargaController::class);

require __DIR__.'/auth.php';
