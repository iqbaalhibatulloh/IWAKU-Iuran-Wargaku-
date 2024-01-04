<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index ()
    {
        $payment = Payment::latest()->get();
        return response()->json([
            'data' => $payment,
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $payment = Payment::create([
                'payment_date' => $request->payment_date,
                'user_id' => $request->user_id,
                'warga_id' => $request->warga_id,
                'category_id' => $request->category_id,
            ]);

            return response()->json([
                'message' => 'Data berhasil ditambahkan',
                'data' => $payment,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Data gagal ditambahkan',
                'data' => [],
                "error" => $e->getMessage(),
            ], 401);
        }
    }

    public function update (Request $request, Payment $payment)
    {
        try {
            $payment->update([
                'payment_date' => $request->payment_date,
                'user_id' => $request->user_id,
                'warga_id' => $request->warga_id,
                'category_id' => $request->category_id,
            ]);

            return response()->json([
                'message' => 'Data berhasil diupdate',
                'data' => $payment,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Data gagal diupdate',
                'data' => [],
                "error" => $e->getMessage(),
            ], 401);
        }
    }

    public function destroy (Payment $payment)
    {
        try {
            $payment->delete();

            return response()->json([
                'message' => 'Data berhasil dihapus',
                'data' => $payment,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Data gagal dihapus',
                'data' => [],
                "error" => $e->getMessage(),
            ], 401);
        }
    }
}
