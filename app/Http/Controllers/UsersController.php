<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    


      public function doLogin(Request $request){
         
          $credentials=$request->validate([
              'name'=>"required",
              'password'=>'required'
          ],[
            'name.required'=>"L identifiant est requis ",
            'password.required'=>"Veuillez rentrer le mot de passe "
          ]);

           if(Auth::attempt($credentials)){
             $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
           }

                          return back();

      }


      public function index(){

      return view('users.index');
      }
}
