<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class googleController extends Controller
{

    
    function redirect(){
        return Socialite::driver('google')->redirect();
    }

    function callbackGoogle(){
        try{
         $google_user = Socialite::driver('google')->user();
         $user = User::where('google_id',$google_user->getId())->first();
         if (! $user){

             $add_user = User::create([
                "name"=>$google_user->getName(),
                "email"=>$google_user->getEmail(),
                "google_id"=>$google_user->getId(),
                "role"=>$google_user->getname(),

             ]);
             Auth::login($add_user);
             return redirect('/dashboard');

         }
         else {
            Auth::login($user);
            return redirect('/dashboard');
         }
        }
        catch (\Throwable $th) {
            //throw $th;
            dd('eruur'.$th->getMessage());
        }
    }
}
