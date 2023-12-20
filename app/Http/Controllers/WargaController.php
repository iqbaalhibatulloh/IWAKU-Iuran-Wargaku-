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
        // dd($request->all());
        DB::beginTransaction();
        try {
            $wargaAdd = new Warga();
            $wargaAdd->id = $request->id;
            $wargaAdd->name = $request->name;
            $wargaAdd->rt = $request->rt;
            $wargaAdd->rw = $request->rw;
            $wargaAdd->status = $request->status;
            $wargaAdd->save();
            
            DB::commit();
            return redirect()->back();
        } catch(\Exception $e){
            dd($e);
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
    public function update(UpdateWargaRequest $request)
    {
        $request->validate([
            'name' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'status' => 'required|string',
        ]);

        // Update the Warga data
        $warga = Warga::find($request->id); // Assuming the user is authenticated
        $warga->name = $request->input('name');
        $warga->rt = $request->input('rt');
        $warga->rw = $request->input('rw');
        $warga->status = $request->input('status');
        $warga->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warga $warga)
    {
        //
    }
}
