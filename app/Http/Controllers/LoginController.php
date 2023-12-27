<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function redirectToGoogle(Request $request)
    {                                                       
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {        
        try {
            $user = Socialite::driver('google')->stateless()->user();                  
            $findUser = \App\Models\User::where('email', $user->email)->first();            
            if (!$findUser) {
                // return redirect()->route('login')->with('error2', 'Akun sudah terdaftar, mohon lakukan login');
                $findUser = new \App\Models\User();
                $findUser->id = substr($user->id , 0, 8);
                $findUser->name = $user->name;
                $findUser->email = $user->email;
                $findUser->noTelp = "";
                $findUser->role = "";
                $findUser->password = Hash::make('12345678');
                $findUser->save();  

                $userLogin = \App\Models\User::where('email', $user->email)->first();
                
                Auth::login($userLogin);
                return redirect()->route('chooseRole')->with('success', 'Akun sudah terdaftar, mohon pilih role');
            }

            Auth::login($findUser);

        //    retutrn to home
            return redirect('home')->with('success', 'Selamat datang kembali ' . $findUser->name);            
        } catch(\Exception $e) { 
            // dd($e);           
            // return redirect()->route('login')->with('error2', 'Login gagal, mohon lakukan login ulang');
        }
    }

    public function updateRole(Request $request)
    {                
      try{
        $user = User::findOrFail(Auth::user()->id);        
        $role = $request->role;
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
        $user->id = $userId;
        $user->role = $role;
        $user->save();
        Auth::login($user);
        return redirect('home')->with('success', 'Selamat datang kembali ' . $user->name);
      } catch(\Exception $e) {
        dd($e);        
        return redirect()->route('chooseRole')->with('error2', 'Pemilihan role gagal, mohon pilih role ulang');
      }
    }

    // public function handleGoogleSignUpCallback(){
    //     try {
    //         $user = Socialite::driver('google')->stateless()->user();        
    //         dd($user);
    //     } catch(\Exception $e) {
            
    //     }
    // }

}


