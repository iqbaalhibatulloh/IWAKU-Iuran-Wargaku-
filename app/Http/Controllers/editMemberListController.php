<?php

namespace App\Http\Controllers;

use App\Models\editMemberList;
use App\Http\Requests\StoreeditMemberListRequest;
use App\Http\Requests\UpdateeditMemberListRequest;
use Illuminate\Support\Facades\Hash;


class EditMemberListController extends Controller
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
    public function store(StoreeditMemberListRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(editMemberList $editMemberList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(editMemberList $editMemberList)
    {
        return view('memberList.editMemberList', [
            'warga' => $editMemberList->warga(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateeditMemberListRequest $request, editMemberList $editMemberList)
    {
        $member = key($editMemberList->all());
    
try{
    if ($member == 'password') {
        $editMemberList->user()->update([
            $member =>  Hash::make($editMemberList->$member)
        ]);
    }else{
        $editMemberList->user()->update([
            $member => $editMemberList->$member
        ]);
    }
} catch(Exception $e){
    dd($e);
}



        return redirect()->back()->with('status', 'profile-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(editMemberList $editMemberList)
    {
        $editMemberList->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $editMemberList->user();

        Auth::logout();

        $user->delete();

        $editMemberList->session()->invalidate();
        $editMemberList->session()->regenerateToken();

        return Redirect::to('/');
    }
}
