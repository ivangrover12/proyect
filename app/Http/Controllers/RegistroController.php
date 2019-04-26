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

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function __contruct(){
        $this->middleware('auth');
    }
    
   public function index()
    {
        // $registros = Ej_Gasto::orderBy('ue', 'DESC')->get();
        return view('registro.index', compact('registros'));
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
        $certificados = Certificado::where('secuencia', $secuencia)->where('gest', $gestion)->orderBy('cod', 'DESC')->get();
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
    public function getdoc($gestion, $tip){
        $doc = Doc::where('gestion', $gestion)->where('nro', $tip)->first();
        return $doc;
    } //
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
}
