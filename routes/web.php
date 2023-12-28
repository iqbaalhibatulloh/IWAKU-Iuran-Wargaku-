<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WargaController;
use App\Models\Warga;
use Illuminate\Support\Facades\DB;
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

Route::get('googleLogin', [LoginController::class, 'redirectToGoogle'])->name('googleLogin');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

// choose role after sign up by google
Route::get("/chooseRole/google", function(){
    return view("chooseRole");
})->name("chooseRole");
// update role after sign up by google
Route::put('/updateRole', [LoginController::class, 'updateRole'])->name('updateRole');

Route::get('/home', function () {
    return view('home');
})
->middleware(['auth', 'verified', 'completeRegister'])->name('home');
// Route::get('/payment', function () {
//     $data = [
//         'models' => Warga::all(),
//     ];
//     return view('payment', compact("models"));
// })->middleware(['auth', 'verified', 'completeRegister'])->name('payment');
Route::get('/memberList', function () {
    $rtTotals = [];

    for ($i = 1; $i <= 5; $i++) {
        $rt = 'RT0' . $i;
        $totalWarga = Warga::where('rt', $rt)->where('rw',auth()->user()->role) ->count();
        $rtTotals[$rt] = $totalWarga;
    };
// dd($rtTotals);


    return view('memberList.memberList', compact("rtTotals"));
})->middleware(['auth', 'verified', 'completeRegister'])->name('memberList.index');

Route::get('/edit/{warga}', function (Warga $warga) {
    // $warga = Warga::findOrFail($warga->id); 
    return view('memberList.editMemberList', compact("warga")) ;
})->middleware(['auth', 'verified', 'completeRegister'])->name('memberList.editMemberList');
Route::POST('/update', [WargaController::class,"update"] 
)->middleware(['auth', 'verified', 'completeRegister'])->name('memberList.update');



Route::get('/dokumen', function () {
    return view('dokumen');
})->middleware(['auth', 'verified', 'completeRegister'])->name('document.doc');
Route::get('/payment', function () {
    return view('payment.payment');
})->middleware(['auth', 'verified', 'completeRegister'])->name('payment');
Route::get('/opsiPayment', function () {
    return view('payment.opsiPayment');
})->middleware(['auth', 'verified', 'completeRegister'])->name('payment.opsiPayment');
Route::get('/detailPayment', function () {
    return view('payment.detailPayment');
})->middleware(['auth', 'verified', 'completeRegister'])->name('payment.detailPayment');
Route::get('/detailDoc', function () {
    return view('document.detailDoc');
})->middleware(['auth', 'verified', 'completeRegister'])->name('document.detailDoc');
Route::get('/docPemasukan', function () {
    return view('document.docPemasukan');
})->middleware(['auth', 'verified', 'completeRegister'])->name('document.docPemasukan');
Route::get('/docPengeluaran', function () {
    return view('document.docPengeluaran');
})->middleware(['auth', 'verified', 'completeRegister'])->name('document.docPengeluaran');
Route::get('/detailDocPemasukan', function () {
    return view('document.detaiDocPemasukan');
})->middleware(['auth', 'verified', 'completeRegister'])->name('document.detailDocPemasukan');

// Route::get('/detailDoc', function () {
//     return view('document.detailDoc');
// });

// Route::get('/memberlist/rt/{warga:alamat}', [WargaController::class, 'show'])->name("warga.show");
// Route::get('/memberlist/{rt}/rt', [WargaController::class, 'show'])->name("warga.show.byrt");
Route::get('/memberlist/{rt}/rt', function(string $rt){
    $wargas = Warga::where('rt', $rt)->where("rw", auth()->user()->role)->get();
 
// return $rtTotals;

    return view("memberList.detailMemberList", compact("wargas"));
})->name("memberList.show.byrt");

Route::middleware(['auth', 'completeRegister'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profileEdit/{uhuy}',  function ($uhuy) {
        $type = "";
        if($uhuy == 'name'){
            $type = 'text';
        }else if($uhuy == 'email'){
            $type = 'email';
        }else if($uhuy == 'password'){
            $type = 'password';
        }else {
            $type = 'tel';
        }
    
        $data = [
            'name' => $uhuy,
            'type' => $type
        ];
        return view('profile.profileEdit', $data);
    })->middleware(['auth', 'verified', 'completeRegister'])->name('profile.profileEdit');
    
    Route::resource("/warga", WargaController::class);
});


require __DIR__.'/auth.php';
