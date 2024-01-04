<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WargaController;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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

    $year = Carbon::now()->year;

    // Get all categories
    $categories = Category::all();
    
    // Initialize an array to store the results for each category
    $results = [];

    // Get all users for the current category
    $allUsers = Warga::where(function ($query) {
            if (Auth::user()->rw == "") {
                $query->where('rw', Auth::user()->role);
            } else {
                $query->where('rt', Auth::user()->role)->where("rw", Auth::user()->rw);
            }
        })
        ->pluck('id');
    
    foreach ($categories as $category) {
        // Get users who have made payments for all twelve months and match the current category
        $usersWithFullPayments = Payment::whereHas('warga', function ($query) {
                if (Auth::user()->rw == "") {
                    $query->where('rw', Auth::user()->role);
                } else {
                    $query->where('rt', Auth::user()->role)->where("rw", Auth::user()->rw);
                }
            })
            ->whereYear('payment_date', $year)
            ->where('category_id', $category->id)
            ->get()
            ->groupBy('warga_id')
            ->filter(function ($payments) {     
                $currentMonthNumber = Carbon::now()->format('n'); 
                return $payments->count() >= $currentMonthNumber;
            })
            ->keys();
    
    
        // Get users who haven't made payments for all twelve months for the current category
        $usersWithoutFullPayments = $allUsers->diff($usersWithFullPayments);
    
        // Retrieve the wargas who haven't made payments for all twelve months for the current category
        $wargas = Warga::whereIn('id', $usersWithoutFullPayments)->get();
    
        // Store the results for the current category in the array
        $results[$category->name] = $wargas;
    }
    
    // Now $results contains an array where each key is the category name, and the value is the corresponding wargas.
    // dd($results);    
    
    return view('payment.payment', compact("results", "categories"));
})->middleware(['auth', 'verified', 'completeRegister'])->name('payment.index');
Route::get('/opsiPayment', function () {
    return view('payment.opsiPayment');    
})->middleware(['auth', 'verified', 'completeRegister'])->name('payment.opsiPayment');
Route::get('/detailPayment', function () {
    return view('payment.detailPayment');
})->middleware(['auth', 'verified', 'completeRegister'])->name('payment.detailPayment');
Route::get('/detailPayment/{warga}/{category}', function (Warga $warga, $category) {
    // dd($warga, $category);
    $year = Carbon::now()->year;

    // Fetch payment status for each month in the current year
    // change to object
    $paymentStatus = [];
    for ($month = 1; $month <= 12; $month++) {
        $categoryId = DB::table('categories')->where('name', $category)->value('id');
        
        $monthNamesId = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        $paymentStatus["status"][] = Payment::where('warga_id', $warga->id)
            ->where('category_id', $categoryId)
            ->whereYear('payment_date', $year)
            ->whereMonth('payment_date', $month)
            ->exists() ? 1 : 0;

            $paymentStatus["month"][] = $monthNamesId[$month];
    }    

    // dd($paymentStatus);
    

    return view('payment.detailPayment', compact('warga', 'category', 'paymentStatus'));
})->middleware(['auth', 'verified', 'completeRegister'])->name('payment.detailPayment.warga');
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
    return view("memberList.detailMemberList", compact("wargas", "rt"));
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
