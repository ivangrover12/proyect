<?php

namespace App\Http\Controllers;

use App\Certificado;
use App\Certificado2;
use App\CatProg;
use App\ClasGast;
use App\Das;
use App\Ej_Gasto;
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
        $result = Ej_Gasto::where('gestion', $year)->orderBy('f_elabo', 'DESC')->get();
        return $result;
    } //
}
