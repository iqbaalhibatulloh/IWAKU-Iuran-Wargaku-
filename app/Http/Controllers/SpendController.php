<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpendRequest;
use App\Http\Requests\UpdateSpendRequest;
use App\Models\Spend;
use Illuminate\Http\Request;

class SpendController extends Controller
{

    public function storeSpend(Request $request)
    {
      try{
        $spend = new Spend();        
        $spend->user_id = auth()->user()->id;
        $spend->amount = $request->amount;
        $spend->category_id = $request->category_id;
        $spend->spend_date = $request->spend_date;        
        $spend->save();
        return redirect()->back()->with('success', 'Spend added successfully');
      } catch (\Exception $e) {
        dd($e);
        return redirect()->back()->with('error2', 'Spend added failed');
      }
    }

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
    public function store(StoreSpendRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Spend $spend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spend $spend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpendRequest $request, Spend $spend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spend $spend)
    {
        //
    }
}
