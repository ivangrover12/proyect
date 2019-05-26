<?php
namespace App\Http\Controllers;
use App\Certificado;
use App\Certificado2;
use App\CatProg;
use App\ClasGast;
use App\Das;
use App\TipoGasto;
use App\Ff;
use App\Partidas;
use App\Org;
use App\Ej_Gasto;
use App\Doc;
use App\Detall_ega;

use NumerosEnLetras;

use Illuminate\Http\Request;

class PdfController extends Controller
{
  //   public function github (){
 	// return \PDF::loadFile('https://github.com/')->stream('github.pdf'); 


 	public function print1($secuencia, $gestion) {

		$certificado = Certificado::where('secuencia',$secuencia)->where('gest',$gestion)->first();
		$certif = Certificado::where('secuencia',$secuencia)->where('gest',$gestion)->get(); 
		$pr = [];
		foreach ($certif as $c) {
			//$cer .= Certificado2::where('cod_cert',$c->cod)->where('gestion',$gestion)->get();
			// $pr .= $c->cod.',';
			array_push($pr, $c->cod);     		
		}
		// $pr = substr($pr, 0, strlen($pr)-1);
		// $pr .= ']';
		
		$cert = Certificado2::where('gestion',$gestion)->whereIn('cod_cert', $pr)->get();
		
        
		
		//$certificado1 = Certificado::where('gest',$gestion)->whereIn('cod_cert', $pr)->get();
		//$certifica2 = Certificado2::where('gestion',$gestion)->get();
		$certificado2 = Certificado2::where('cod_cert',$certificado->cod)->where('gestion',$gestion)->first();
		$gast = ClasGast::where('class_gast', $certificado->tipo)->where('gestion',$gestion)->first();
		$enBolivianos= NumerosEnLetras::convertir(1988208.91,'Bolivianos',false,'Centavos');
	// 	$leagues = Certificado2::whereHas('ff', function($query) use ($fft) {
	// 		$query->where('country_name', $country);
	// })->get();

		// for ($i=0; $i < count($cer); $i++) { 
		// 	//$ff = Ff::where('ff',$cer[$i]->ff)->where('gestion',$gestion)->first();		
		// 	if ($i == 0) {
		// 		$ftn1 = Ff::where('ff',$cer[$i]->ff)->where('gestion',$gestion)->first();		
		// 	}
		// 	elseif ($i == 1) {
		// 		$ftn2 = Ff::where('ff',$cer[$i]->ff)->where('gestion',$gestion)->first();		
		// 	}
		// 	elseif ($i == 2) {
		// 		$ftn2 = Ff::where('ff',$cer[$i]->ff)->where('gestion',$gestion)->first();		
		// 	}
		// 	elseif ($i == 3) {
		// 		$ftn2 = Ff::where('ff',$cer[$i]->ff)->where('gestion',$gestion)->first();		
		// 	}
		// 	elseif ($i == 4) {
		// 		$ftn2 = Ff::where('ff',$cer[$i]->ff)->where('gestion',$gestion)->first();		
		// 	}
		// }
		// $cer2 = Certificado2::where('cod_cert',$certificado->cod)->where('gestion',$gestion)
		// 			->union($ftn1)
		// 			->get();		
		$headerHtml = view()->make('print.head1')->with('cert',$certificado)->with('hs',now()->format('H:m:s'))->render();
		$pageName = 'reporte_certificacion_1.pdf';
		$pageMargins = [56, 15, 20, 15];
		// $cer->aux = 'sss';
		// $cer = (object)$cer; 
		$data = [
			'fhs' => now(),
			'hs'  => now()->format('H:m:s'),
			'fs' => now()->format('d/m/Y'),
			'ys' => now()->format('Y'),
			'cert' => $certificado,
			'das' => Das::where('da', $certificado->da)->where('ue', $certificado->ue)->where('gestion', $gestion)->first(),
			'cat_prog' => CatProg::where('da', $certificado->da)->where('ue', $certificado->ue)->where('prog',$certificado->prog)->where('proy',$certificado->proy)->where('act',$certificado->act)->where('gestion', $gestion)->first(),
			'cert2' => $certificado2,
			'cer' => $cert,
			'enBolivianos' => $enBolivianos,
			'clasgast' => $gast,
		];
		return \PDF::loadView('print.reportcert1', $data)
		->setOption('header-html', $headerHtml)
		// ->setOption('footer-html', $footerHtml)
		->setOption('page-size','Letter','landscape')
		->setOption('margin-top', $pageMargins[0])
		->setOption('margin-right', $pageMargins[1])
		->setOption('margin-bottom', $pageMargins[2])
		->setOption('margin-left', $pageMargins[3])
		->setOption('encoding', 'utf-8')
		->stream($pageName);
		
	 } //
	 public function print2($secuencia, $gestion) {
		$certificado = Certificado::where('secuencia',$secuencia)->where('gest',$gestion)->first();
		$certif = Certificado::where('secuencia',$secuencia)->where('gest',$gestion)->get(); 
		$pr = [];
		foreach ($certif as $c) {
			//$cer .= Certificado2::where('cod_cert',$c->cod)->where('gestion',$gestion)->get();
			// $pr .= $c->cod.',';
			array_push($pr, $c->cod);     		
		}
		// $pr = substr($pr, 0, strlen($pr)-1);
		// $pr .= ']';
		
		$cert = Certificado2::where('gestion',$gestion)->whereIn('cod_cert', $pr)->get();
		
		$ftn = Ff::where('gestion',$gestion)->get();
		$gast = ClasGast::where('class_gast', $certificado->tipo)->where('gestion',$gestion)->first();
		$enBolivianos= NumerosEnLetras::convertir(1988208.91,'Bolivianos',false,'Centavos');
		$headerHtml = view()->make('print.head1')->with('cert',$certificado)->with('hs',now()->format('H:m:s'))->render();
		$pageMargins = [56, 18, 20, 18];
		$pageName = 'reporte_certificacion_2.pdf';
		$data = [
			'fhs' => now(),
			'fs' => now()->format('d/m/Y'),
			'ys' => now()->format('Y'),
			'pq' => 'mundo',
			'cert' => $certificado,
			'das' => Das::where('da', $certificado->da)->where('ue', $certificado->ue)->where('gestion', $gestion)->first(),
			'cat_prog' => CatProg::where('da', $certificado->da)->where('ue', $certificado->ue)->where('gestion', $gestion)->first(),
			'cer' => $cert,
			'enBolivianos' => $enBolivianos,
			'clasgast' => $gast,

		];
		return \PDF::loadView('print.reportcert2', $data)
		
		->setOption('page-size','Letter','landscape')
		->setOption('margin-top', $pageMargins[0])
		->setOption('margin-right', $pageMargins[1])
		->setOption('margin-bottom', $pageMargins[2])
		->setOption('margin-left', $pageMargins[3])
		->setOption('header-html', $headerHtml)
		->setOption('encoding', 'utf-8')
		->stream($pageName);
		
	 } //reporte de ejecucion
	 public function print3($secuencia, $gestion) {
		$ej_gasto = Ej_Gasto::where('sec',$secuencia)->where('gestion',$gestion)->first();
		$ftn = Ff::where('gestion',$gestion)->get();
		$enBolivianos= NumerosEnLetras::convertir(1988208.91,'Bolivianos',false,'Centavos');
		$mpre='';
		$mcom='';
		$mdev='';
		$mreg='';

		if($ej_gasto->mpre)
		{
			$mpre='checked';
		}
		if($ej_gasto->mcom)
		{
			$mcom='checked';
		}
		if($ej_gasto->mdev)
		{
			$mdev='checked';
		}
		if($ej_gasto->mreg)
		{
			$mreg='checked';
		}
		$headerHtml = view()->make('print.head2')->with('fhs',now())->with('ys',now()->format('Y'))->render();
		$pageMargins = [50, 18, 20, 18];
		$pageName = 'reporte_ejecucion_presupuestaria.pdf';
		$data = [
			'fhs' => now(),
			'fs' => now()->format('d/m/Y'),
			'ys' => now()->format('Y'),
			'mpre' => $mpre,
			'mcom' => $mcom,
			'mdev' => $mdev,
			'mreg' => $mreg,
			'cert' => $ej_gasto,
			'das' => Das::where('da', $ej_gasto->dir)->where('ue', $ej_gasto->ue)->where('gestion', $gestion)->first(),
			'doc' => Doc::where('nro',$ej_gasto->tip)->where('gestion', $gestion)->first(),
			'clas' => TipoGasto::where('tipogasto', $ej_gasto->clas_gasto)->where('gestion', $gestion)->first(),
			'ff' => Ff::where('ff',$ej_gasto->ff)->where('gestion',$gestion)->first(),
			'org' => Org::where('org',$ej_gasto->org)->where('gestion',$gestion)->first(),
			'ega' => Detall_ega::where('cod_prev',$ej_gasto->secu)->where('gestion',$gestion)->get(),
		// 'guia_internacion' => GuiaInternacion::with('productor', 'productor.departamento_extension', 'vehiculo', 'marca', 'color')->find($id),
		];
		return \PDF::loadView('print.reportejec', $data)
		
		// ->setOption('footer-html', $footerHtml)
		->setOption('page-size','Letter','landscape')
		->setOption('margin-top', $pageMargins[0])
		->setOption('margin-right', $pageMargins[1])
		->setOption('margin-bottom', $pageMargins[2])
		->setOption('margin-left', $pageMargins[3])
		->setOption('encoding', 'utf-8')
		->setOption('header-html', $headerHtml)
		->stream($pageName);
		
	 }
	 
	 
}
