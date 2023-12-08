<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Http\Requests\StoreWargaRequest;
use App\Http\Requests\UpdateWargaRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class WargaController extends Controller
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
    public function store(StoreWargaRequest $request)
    {
        DB::beginTransaction();
        try {
            $wargaAdd = new Warga();
            $wargaAdd->id = $request->id;
            $wargaAdd->nama = $request->nama;
            $wargaAdd->alamat = $request->alamat;
            $wargaAdd->status = $request->status;
            $wargaAdd->save();
            
            DB::commit();
            return redirect()->back();
        } catch(\Exception $e){
            DB::rollBack();
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Warga $warga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warga $warga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWargaRequest $request, Warga $warga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warga $warga)
    {
        //
    }
}
