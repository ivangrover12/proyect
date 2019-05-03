<?php

namespace App\Http\Controllers;
use App\Certificado;
use App\Certificado2;
use App\CatProg;
use App\ClasGast;
use App\Das;
use Illuminate\Http\Request;

class DasController extends Controller
{
    public function __contruct(){
        $this->middleware('auth');
    }

   public function index()
    {
        return view('das.index');
    } 
    public function getdas($year){
        $result = Das::where('gestion', $year)->orderBy('da', 'ASC')->get();
        return $result;
    } 
    public function new(Request $request)
    {
         // return $request;
        $nuevo = new Das();
        $nuevo->lugar = $request->lugar;
        $nuevo->desc_lug = $request->desc_lug;
        $nuevo->entidad = $request->entidad;
        $nuevo->desc_entidad = $request->desc_entidad;
        $nuevo->da = $request->nda;
        $nuevo->desc_da = $request->dda;
        $nuevo->ue = $request->nue;
        $nuevo->desc_ue = $request->due;
        $nuevo->gestion = $request->gestion;
        $nuevo->save();
        
    }
    public function update(Request $request)
    {
        // return $request;

        $dass = Das::where('cod', $request->cod)->first();
        $dass->lugar = $request->lugar;
        $dass->desc_lug = $request->desc_lug;
        $dass->entidad = $request->entidad;
        $dass->desc_entidad = $request->desc_entidad;
        $dass->da = $request->nda;
        $dass->desc_da = $request->dda;
        $dass->ue = $request->nue;
        $dass->desc_ue = $request->due;
        $dass->gestion = $request->gestion;
        $dass->save();
        
    }
    public function getcod($cod){   
        $das = Das::where('cod', $cod)->orderBy('cod', 'DESC')->get();
        return $das;
    } //
}
 
