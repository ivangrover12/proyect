<?php

namespace App\Http\Controllers;

use App\Certificado;
use App\Certificado2;
use App\CatProg;
use App\ClasGast;
use App\Das;
use App\Ff;
use Illuminate\Http\Request;

class FuenteController extends Controller
{
   public function index(){

   		return view('fuentes.index'); //	
   }
   public function getfuentes($year){
        $result = Ff::where('gestion', $year)->orderBy('cod', 'ASC')->get();
        return $result;
    } //
   public function new(Request $request)
    {
         // return $request;
        $nuevo = new Ff();
        $nuevo->ff = $request->ff;
        $nuevo->descrip = $request->descrip;
        $nuevo->financ = $request->financ;
        $nuevo->sigla = $request->sigla;
        $nuevo->gestion = $request->gestion;
        $nuevo->save();
        
    }
        public function update(Request $request)
    {
        // return $request;

        $dass = Ff::where('cod', $request->cod)->first();
        $dass->ff = $request->ff;
        $dass->descrip = $request->descrip;
        $dass->financ = $request->financ;
        $dass->sigla = $request->sigla;
        $dass->gestion = $request->gestion;
        $dass->save();
        
    }
    	public function getcod($cod){
        $das = Ff::where('cod', $cod)->orderBy('cod', 'DESC')->get();
        return $das;
    }
}

