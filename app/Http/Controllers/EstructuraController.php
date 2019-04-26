<?php

namespace App\Http\Controllers;

use App\Certificado;
use App\Certificado2;
use App\CatProg;
use App\ClasGast;
use App\Das;
use Illuminate\Http\Request;

class EstructuraController extends Controller
{
	public function __contruct(){
        $this->middleware('auth');
    }
	public function index(){

		return view('estructura.index');//	
	}
   public function getestructura($year){
        $result = CatProg::where('gestion', $year)->get();
        return $result;
    } //
    public function new(Request $request)
    {
        // return $request;
   
        $nuevo = new CatProg();
        $nuevo->da = $request->da;
        $nuevo->ue = $request->ue;
        $nuevo->prog = $request->prog;
        $nuevo->proy = $request->proy;
        $nuevo->act = $request->act;
        $nuevo->nombre = $request->nombre;
        if($request->sisin){
            $nuevo->sisin = $request->sisin;    
        }
        else{
            $nuevo->sisin ="";
        }
        $nuevo->gestion = $request->gestion;
        $nuevo->save();
        
    }
    public function update(Request $request)
    {
        // return $request;

        $nuevo = CatProg::where('cod', $request->cod)->first();
        $nuevo->da = $request->da;
        $nuevo->ue = $request->ue;
        $nuevo->prog = $request->prog;
        $nuevo->proy = $request->proy;
        $nuevo->act = $request->act;
        $nuevo->nombre = $request->nombre;
        if($request->sisin){
            $nuevo->sisin = $request->sisin;    
        }
        else{
            $nuevo->sisin ="";
        }
        $nuevo->gestion = $request->gestion;
        $nuevo->save();
        
    }
    public function getcod($cod){
        $das = CatProg::where('cod', $cod)->orderBy('cod', 'DESC')->get();
        return $das;
    } //
}
