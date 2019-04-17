<?php

namespace App\Http\Controllers;

use App\Certificado;
use App\Certificado2;
use App\CatProg;
use App\ClasGast;
use App\Das;
use App\Ff;
use App\Partidas;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
	public function index()
	{
		return view('categoria.index'); //	
	}
    public function getcategoria($year){
        $result = Partidas::where('gestion', $year)->orderBy('cod', 'ASC')->get();
        return $result;
    }
    public function new(Request $request)
    {
         // return $request;

        $nuevo = new Partidas();
        $nuevo->objgast = $request->objgast;
        $nuevo->descrip = $request->descrip;
        $nuevo->gestion = $request->gestion;
        $nuevo->save();
        
    }
        public function update(Request $request)
    {
        // return $request;

        $dass = Partidas::where('cod', $request->cod)->first();
        $dass->objgast = $request->objgast;
        $dass->descrip = $request->descrip;
        $dass->gestion = $request->gestion;
        $dass->save();
        
    }
    public function getcod($cod){
        $das = Partidas::where('cod', $cod)->orderBy('cod', 'DESC')->get();
        return $das;
    }
}
