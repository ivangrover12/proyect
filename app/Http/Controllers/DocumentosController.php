<?php

namespace App\Http\Controllers;

use App\Certificado;
use App\Certificado2;
use App\CatProg;
use App\ClasGast;
use App\Das;
use App\Doc;
use Illuminate\Http\Request;

class DocumentosController extends Controller
{
	public function __contruct(){
        $this->middleware('auth');
    }
    public function index()
    {
      	return view('documentos.index');
    }//
    public function getdocumentos($year){
        $result = Doc::where('gestion', $year)->orderBy('cod', 'ASC')->get();
        return $result;
    } //
    public function new(Request $request)
    {
         // return $request;

       
        $nuevo = new Doc();
        $nuevo->descrip = $request->descrip;
        $nuevo->nro = $request->nro;
        $nuevo->gestion = $request->gestion;
        $nuevo->save();
        
    }
    public function update(Request $request)
    {
        // return $request;

        $dass = Doc::where('cod', $request->cod)->first();
        $dass->descrip = $request->descrip;
        $dass->nro = $request->nro;
        $dass->gestion = $request->gestion;
        $dass->save();
        
    }
    public function getcod($cod){
        $das = Doc::where('cod', $cod)->orderBy('cod', 'DESC')->get();
        return $das;
    } //
}
