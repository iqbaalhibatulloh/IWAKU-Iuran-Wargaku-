<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {        
     
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'noTelp' => ['required', 'string'],
            'role' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $role = $request['role'];

        $currentDate = date('d');
        $prefix = '';
        if (strpos($role, 'RT') === 0) {
            $prefix = 'IWKRT';
        } elseif (strpos($role, 'RW') === 0) {
            $prefix = 'IWKRW';
        } elseif ($role === 'admin') {
            $prefix = 'IWkAD';
        } else {
            $prefix = 'IWkW'; // Default prefix jika tidak sesuai dengan kondisi di atas
        }


        $userId = $prefix . substr($request['name'], 0, 2) . $currentDate . User::count() + 1;

        $user = User::create([
            'id'=>$userId,
            'name' => $request->name,
            'noTelp' => $request->noTelp,
            'role' => $request->role,
            'rw' => $request->rw ?? "",
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route("home");
    }
}
