<?php

namespace App\Http\Controllers;

use App\Models\User;
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



      public function listesAdmin(){
       
      $stagiares=User::all();
      return view('users.admin.index',compact('stagiares'));
      }


      public function addAdmin(Request $request){

          $request->validate([
            'name'=>'required',
            'prenom'=>'required',
            'tel'=>'',
            'grade'=>'required'
          ],[
            'name.required'=>'Le nom est requis',
            'prenom'=>'Le prenom est requis',
            'grade.required'=>'Veuillez entrer le grade !'
          ]);


$admin=new User();
$admin->name=$request->name;
$admin->prenom=$request->prenom;
$admin->grade=$request->grade;
$admin->tel=$request->tel;
$admin->password=Hash::make($request->password);

$admin->email="";
$admin->role="";
$admin->tel="";
$admin->save();
return back();

      }
}
