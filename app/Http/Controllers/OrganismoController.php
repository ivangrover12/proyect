<?php

namespace App\Http\Controllers;

use App\Certificado;
use App\Certificado2;
use App\CatProg;
use App\ClasGast;
use App\Das;
use App\Ff;
use Illuminate\Http\Request;
use App\Org;

class OrganismoController extends Controller
{
    public function index(){

        return view('organismo.index'); //	
}
public function getorganismos($year){
     $result = Org::where('gestion', $year)->orderBy('cod', 'ASC')->get();
     return $result;
 } //
public function new(Request $request)
 {
     // return $request;
     $nuevo = new Org();
     $nuevo->org = $request->org;
     $nuevo->descr_org = $request->descr_org;
     $nuevo->sigla = $request->sigla;
     $nuevo->orig = $request->orig;
     $nuevo->sect = $request->sect;
     $nuevo->gestion = $request->gestion;
     $nuevo->save();
     
 }
     public function update(Request $request)
 {
     // return $request;

     $dass = Org::where('cod', $request->cod)->first();
     $dass->org = $request->org;
     $dass->descr_org = $request->descr_org;
     $dass->sigla = $request->sigla;
     $dass->orig = $request->orig;
     $dass->sect = $request->sect;
     $dass->gestion = $request->gestion;
     $dass->save();
     
 }
     public function getcod($cod){
     $das = Org::where('cod', $cod)->orderBy('cod', 'DESC')->get();
     return $das;
 }//
}
