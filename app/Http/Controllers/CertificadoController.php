<?php

namespace App\Http\Controllers;

use App\Certificado;
use App\Certificado2;
use App\CatProg;
use App\ClasGast;
use App\Das;
use Illuminate\Http\Request;

class CertificadoController extends Controller
{
   public function __contruct(){
        $this->middleware('auth');
    }

   public function index()
    {
        // $certificados = Certificado::orderBy('secuencia', 'ASC')->get();
        return view('certificado.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('certificado.create');
    }

    public function edit($secuencia)
    {
        // return view('certificado.edit');
        return $secuencia;
    }

    public function models(){
        $das = Das::where('entidad', 47)->where('da', 1)->first();
        $cert = Certificado::orderby('cod', 'DESC')->first();
        $count = $cert->cod;
        return [$das, $count];
    }

    public function findue($ue, $select){
        $das = Das::where('entidad', 47)->where('ue', $ue)->where('gestion', $select)->first();
        if ($das) {
            $result = $das;
            return $result;
        }
        elseif ($ue ='null') {
            return '';
        }
        elseif ($ue = null) {
            return '';
        }
        else{
            return '';
        }
    }

    public function findgast($gast){
        $gast = ClasGast::where('class_gast', $gast)->first();
        if ($gast) {
            $result = $gast->descrip;
            return $result;
        }
        else{
            return '';
        }
    }

    public function findnombre($da, $ue, $prog, $act, $proy){
        $cat = CatProg::where('da', $da)->where('ue', $ue)->where('prog', $prog)->where('act', $act)->where('proy', $proy)->orderBy('gestion', 'DESC')->first();
        if ($cat) {
            $result = $cat->nombre;
            return $result;
        }
        else{
            return '';
        }
    }

    public function getcertifi($year){
        $result = Certificado::where('gest', $year)->orderBy('cod', 'DESC')->get();
        return $result;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cert = Certificado::where('gest', $request->gestion)->orderBy('secuencia', 'DESC')->first();
        $nuevo = new Certificado();
        $nuevo->secuencia = $cert->secuencia + 1;
        $nuevo->gest = $request->gestion;
        $nuevo->gestion = $request->fecha;
        $nuevo->entidad = 47;
        $nuevo->save();
        $certificados = Certificado::where('gest', $nuevo->gest)->where('secuencia', $nuevo->secuencia)->get();
        return [$nuevo->secuencia, $certificados];
    }
    public function new(Request $request)
    {
        $cert = Certificado::where('gest', $request->gestion)->orderBy('secuencia', 'DESC')->first();
        $nuevo = new Certificado();
        $nuevo->secuencia = $request->secuencia;
        $nuevo->gest = $request->gestion;
        $nuevo->gestion = $request->fecha;
        $nuevo->entidad = 47;
        $nuevo->save();
        $certificados = Certificado::where('gest', $nuevo->gest)->where('secuencia', $nuevo->secuencia)->get();
        return [$nuevo->secuencia, $certificados];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function show(Certificado $certificado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificado $certificado)
    {
        $dato = Certificado::find($request->cod);
        $dato->da = $request->da;
        $dato->ue = $request->ue;
        $dato->prog = $request->prog;
        $dato->proy = $request->proy;
        $dato->act = $request->act;
        $dato->obs = $request->obs;
        $dato->tipo = $request->gast;
        $dato->save();
        $certificados = Certificado::where('gest', $dato->gest)->where('secuencia', $dato->secuencia)->get();
        return $certificados;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dato = Certificado::find($id);
        $dato->delete();
        $certificados = Certificado::where('gest', $dato->gest)->where('secuencia', $dato->secuencia)->get();
        return $certificados;
    }

    public function getcert2($id){
        $cert2 = Certificado2::where('cod_cert', $id)->get();
        $total = 0;
        if ($cert2) {
            foreach($cert2 as $temp){
                $total += $temp->ppto_ley + $temp->ppto_mod - $temp->eje_com - $temp->reserva;
            }
            return [$cert2, $total];
        }
        else{
            return [$cert2, $total];
        }
    }

    public function addcert2(Request $request){
        $cert2 = Certificado2::where('cod_cert', $request->cod)->first();
        if ($cert2) {
            $cert2->da = $request->da;
            $cert2->ue = $request->ue;
            $cert2->prog = $request->prog;
            $cert2->proy = $request->proy;
            $cert2->act = $request->act;
            $cert2->ff = $request->ff;
            $cert2->org = $request->org;
            $cert2->part = $request->part;
            $cert2->gestion = $request->gestion;
            $cert2->ppto_ley = $request->ppto_ley;
            $cert2->ppto_mod = $request->ppto_mod;
            $cert2->eje_com = $request->eje_com;
            $cert2->reserva = $request->reserva;
            $cert2->save();
            $certs2 = Certificado2::where('cod_cert', $request->cod_cert)->get();
            $total = 0;
            if ($certs2) {
                foreach($certs2 as $temp){
                    $total += $temp->ppto_ley + $temp->ppto_mod - $temp->eje_com - $temp->reserva;
                }
                return [$certs2, $total];
            }
            else{
                return [$certs2, $total];
            }
        }
        else{
            $cert2 = new Certificado2();
            $cert2->cod_cert = $request->cod_cert;
            $cert2->da = $request->da;
            $cert2->ue = $request->ue;
            $cert2->prog = $request->prog;
            $cert2->proy = $request->proy;
            $cert2->act = $request->act;
            $cert2->ff = $request->ff;
            $cert2->org = $request->org;
            $cert2->part = $request->part;
            $cert2->gestion = $request->gestion;
            $cert2->ppto_ley = $request->ppto_ley;
            $cert2->ppto_mod = $request->ppto_mod;
            $cert2->eje_com = $request->eje_com;
            $cert2->reserva = $request->reserva;
            $cert2->save();
            $certs2 = Certificado2::where('cod_cert', $request->cod_cert)->get();
            $total = 0;
            if ($certs2) {
                foreach($certs2 as $temp){
                    $total += $temp->ppto_ley + $temp->ppto_mod - $temp->eje_com - $temp->reserva;
                }
                return [$certs2, $total];
            }
            else{
                return [$certs2, $total];
            }
        }
    }

    public function destroy2($id){
        $cert2 = Certificado2::find($id);
        $cert2->delete();
        $certs2 = Certificado2::where('cod_cert', $cert2->cod_cert)->get();
        if ($certs2) {
            return $certs2;
        }
        else{
            return '';
        }
    }

    public function getedit($secuencia,$gestion){
        return view('certificado.edit', compact('secuencia','gestion'));
    }

    public function getcerti($secuencia, $gestion){
        $certificados = Certificado::where('secuencia', $secuencia)->where('gest', $gestion)->orderBy('cod', 'DESC')->get();
        return $certificados;
    } //
}
