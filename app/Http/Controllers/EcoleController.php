<?php

namespace App\Http\Controllers;

use App\Models\EcoleStage;
use Illuminate\Http\Request;

class EcoleController extends Controller
{
    
     public function ecole(){


       $ecoles=EcoleStage::all();

      return view('users.ecole.ecole',compact('ecoles'));
     }




      public function edit($id){
        $ecole=EcoleStage::find($id);
        if(!$ecole){

          return back()->with('error','Ecole introuvable ');
        }

        return view('users.ecole.edit',compact('ecole'));
      }


public function SaveEditEcole(Request $request)
{
    $data = $request->validate([
        'nom_ecole' => 'required',
        'adresse' => 'required',
        'id' => 'required'
    ], [
        'nom_ecole.required' => 'Le nom de l\'école est requis !',
        'adresse.required' => 'Veuillez entrer une adresse'
    ]);

    $ecoleStage = EcoleStage::find($request->id);

    if (!$ecoleStage) {
        return redirect()->back()->with('error', 'École introuvable');
    }

    $ecoleStage->update([
        'nom_ecole' => $data['nom_ecole'],
        'adresse'   => $data['adresse'],
    ]);

    return redirect()->back()->with('success', 'École modifiée avec succès !');
}

     public function addEcole(Request $request){

        $data=$request->validate([
          'nom_ecole'=>'required',
          'adresse'=>'required'
        ],[
            'nom_ecole.required'=>'Le nom de l ecole est requis !',
            'adresse.required'=>'Veuillez entrer une adresse'
        ]);

         $ecoleStage=new EcoleStage();
         $ecoleStage->nom_ecole=$data['nom_ecole'];
        $ecoleStage->adresse=$data['adresse'];
         $ecoleStage->save();
         return back()->with('success','Ecole ajouté avec success !');

     }
}
