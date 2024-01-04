<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
       //
    }

    public function storePayment(Request $request, Warga $warga, $category){
        // dd($request->all());
        // dd(Auth::user()->id);
        DB::beginTransaction();        
        try {            
          
            Payment::create([
              "payment_date" => $request->date,
              'user_id' => auth()->user()->id,
              'warga_id' => $warga->id,
              'category_id' => Category::where('name', $category)->first()->id,              
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Pembayaran berhasil ditambahkan');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            return redirect()->back()->with('error2', 'Pembayaran gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
