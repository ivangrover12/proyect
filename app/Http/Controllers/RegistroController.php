<?php

namespace App\Http\Controllers;

use App\Certificado;
use App\Certificado2;
use App\CatProg;
use App\ClasGast;
use App\Das;
use App\Ej_Gasto;
use App\Doc;
use App\TipoGasto;
use App\Ff;
use App\Org;
use App\Detall_ega;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function __contruct(){
        $this->middleware('auth');
    }
    
   public function index()
    {
        // $registros = Ej_Gasto::orderBy('ue', 'DESC')->get();
        return view('registro.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registro.create');
    }
    //

    public function getregistro($year){
        $result = Ej_Gasto::where('gestion', $year)->orderBy('sec', 'DESC')->get();
        return $result;
    } //
    public function getedit($secuencia){
        return view('registro.edit', compact('secuencia'));
    }
    public function getregis($secuencia, $gestion){
        $certificados = Ej_Gasto::where('sec', $secuencia)->where('gestion', $gestion)->get();
        return $certificados;
    } //
    public function getregistro2($secuencia, $select){
        $das = Ej_Gasto::where('entidad', 47)->where('gestion', $select)->where('sec', $secuencia)->first();
        if ($das) {
            $result = $das;
            return $result;
        }
        else{
            return '';
        }
    }
    public function getdetall_ega($secu){
        $det = Detall_ega::where('cod_prev', $secu)->get();;
        if ($det) {
            $result = $det;
            return $result;
        }
        else{
            return '';
        }
    }
    public function getdoc($gestion, $tip){
        $doc = Doc::where('gestion', $gestion)->where('nro', $tip)->first();
        return $doc;
    } //
    public function destroy($cod){
        $deta = Detall_ega::find($cod);
        $deta->delete();
        
    }
    public function getgasto($gestion, $clas_gasto){
        $gas = TipoGasto::where('gestion', $gestion)->where('tipogasto', $clas_gasto)->first();
        return $gas;
    } //
    public function getff($gestion, $ff){
        $ff = Ff::where('gestion', $gestion)->where('ff', $ff)->first();
        return $ff;
    } //
    public function getorg($gestion, $org){
        $org = Org::where('gestion', $gestion)->where('org', $org)->first();
        return $org;
    } //
    public function getlastsecuencia($year){
        $sec = Ej_Gasto::where('gestion', $year)->max('sec');
        if ($sec) {
           $result = $sec+1;
           return $result;
        }
        else{
           $result = '1';
           return $result;
        }
        

    } //
    public function update(Request $request)
    {
         // return $request;
        $ej = Ej_Gasto::where('sec',$request->secuencia)->where('gestion',$request->gestion)->first();
            $ej->sec = $request->secuencia;
            $ej->lugar = $request->lugar;
            $ej->tipo = $request->registro;
            $ej->detipo = $request->detipo;
            $ej->entidad = $request->entidad;
            $ej->dir = $request->dir;
            $ej->ue = $request->ue;
            $ej->f_elabo = $request->f_elabo;
            $ej->mpre = $request->mpre;
            $ej->mcom = $request->mcom;
            $ej->mdev = $request->mdev;
            $ej->mreg = $request->mreg;
            $ej->tip = $request->tip;
            $ej->f_rece = $request->f_rece;
            $ej->nro = $request->nro;
            $ej->clas_gasto = $request->clas_gasto;
            $ej->ff = $request->ff;
            $ej->org = $request->org;
            $ej->resumen = $request->resumen;
            $ej->total = $request->total;
            $ej->lite = $request->lite;
            $ej->benefi = $request->benefi;
            $ej->gestion = $request->gestion;
            $ej->save();
        $je = Ej_Gasto::where('sec',$request->secuencia)->where('gestion',$request->gestion)->first();
        return $je;

        
    }

    public function adddetall_ega(Request $request){
        if ($request) {
            $cert2 = new Detall_ega();
            $cert2->cod_prev = $request->cod_prev;
            $cert2->prog = $request->prog;
            $cert2->proy = $request->proy;
            $cert2->act = $request->act;
            $cert2->obj_gast = $request->obj_gast;
            $cert2->ent_trf = $request->ent_trf;
            $cert2->importe = $request->importe;
            $cert2->gestion = $request->gestion;
            $cert2->save();
        }
        else{
            abort('No tiene los datos completos');
        }
           
    }

    public function addej_gasto(Request $request){
            // return $request;
            $ej = new Ej_Gasto(); 
            $ej->sec = $request->secuencia;
            $ej->lugar = $request->lugar;
            $ej->tipo = $request->registro;
            $ej->detipo = $request->detipo;
            $ej->entidad = $request->entidad;
            $ej->dir = $request->dir;
            $ej->ue = $request->ue;
            $ej->f_elabo = $request->f_elabo;
            $ej->mpre = $request->mpre;
            $ej->mcom = $request->mcom;
            $ej->mdev = $request->mdev;
            $ej->mreg = $request->mreg;
            $ej->tip = $request->tip;
            $ej->f_rece = $request->f_rece;
            $ej->nro = $request->nro;
            $ej->clas_gasto = $request->clas_gasto;
            $ej->ff = $request->ff;
            $ej->org = $request->org;
            $ej->resumen = $request->resumen;
            $ej->total = $request->total;
            $ej->lite = $request->lite;
            $ej->benefi = $request->benefi;
            $ej->gestion = $request->gestion;
            $ej->save();
            $je = Ej_Gasto::where('sec',$ej->sec)->where('gestion',$ej->gestion)->first();
            return $je;
        }
    
}
