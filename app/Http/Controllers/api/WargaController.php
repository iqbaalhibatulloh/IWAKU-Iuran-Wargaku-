<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $warga = Warga::latest()->get();
        return response()->json([
            'data' => $warga,
        ], 200);
    }

    public function store(Request $request)
    {            
        try {
            $warga = Warga::create([
                'id' => $request->id,
                'name' => $request->name,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'status' => $request->status,
            ]);

            return response()->json([
                'message' => 'Data berhasil ditambahkan',
                'data' => $warga,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Data gagal ditambahkan',
                'data' => [],
                "error" => $e->getMessage(),
            ], 401);
        }      
    }

    public function update(Request $request, Warga $warga)
    {
        try {
            $warga->update([
                'id' => $request->id,
                'name' => $request->name,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'status' => $request->status,
            ]);

            return response()->json([
                'message' => 'Data berhasil diupdate',
                'data' => $warga,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Data gagal diupdate',
                'data' => [],
                "error" => $e->getMessage(),
            ], 401);
        }      
    }

    public function destroy(Warga $warga)
    {
        try {
            $warga->delete();

            return response()->json([
                'message' => 'Data berhasil dihapus',
                'data' => $warga,
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
