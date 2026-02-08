<?php

namespace App\Http\Controllers;

use App\Models\EcoleStage;
use Illuminate\Http\Request;

class EcoleStageController extends Controller
{
    

public function index(){

  
    $ecole=EcoleStage::all();

    return view('users.ecole.index');
}
}
