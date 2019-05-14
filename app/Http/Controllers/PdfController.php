<?php

namespace App\Http\Controllers;

use App\Certificado;
use App\Certificado2;
use App\CatProg;
use App\ClasGast;
use App\Das;
use App\Ff;
use App\Partidas;
use App\Org;
use NumerosEnLetras;

use Illuminate\Http\Request;

class PdfController extends Controller
{
  //   public function github (){
 	// return \PDF::loadFile('https://github.com/')->stream('github.pdf'); 


 	public function print1($secuencia, $gestion) {
		 
		// $headerHtml = view()->make('partial.head')->render();
		// $footerHtml = view()->make('partial.foot')->render();
		$query = Certificado2::join('ff','certificado2.ff', '=', 'ff.ff')
						->where('certificado2.cod_cert', 10549)
						->where('certificado2.gestion', $gestion)
						->where('ff.gestion', $gestion)
						->groupBy('certificado2.ff');
		$certificado = Certificado::where('secuencia',$secuencia)->where('gest',$gestion)->first();
		$cer = Certificado2::where('cod_cert',$certificado->cod)->where('gestion',$gestion)->get();
		$fft = Ff::where('gestion',$gestion)->get();
		
		$certificado1 = Certificado::where('gest',$gestion)->get();
		$certifica2 = Certificado2::where('gestion',$gestion)->get();
		$certificado2 = Certificado2::where('cod_cert',$certificado->cod)->where('gestion',$gestion)->first();
		$gast = ClasGast::where('class_gast', $certificado->tipo)->where('gestion',$gestion)->first();
		$enBolivianos= NumerosEnLetras::convertir(1988208.91,'Bolivianos',false,'Centavos');
		$leagues = Certificado2::whereHas('ff', function($query) use ($fft) {
			$query->where('country_name', $country);
	})->get();

		for ($i=0; $i < count($cer); $i++) { 
			//$ff = Ff::where('ff',$cer[$i]->ff)->where('gestion',$gestion)->first();		
			if ($i == 0) {
				$ftn1 = Ff::where('ff',$cer[$i]->ff)->where('gestion',$gestion)->first();		
			}
			elseif ($i == 1) {
				$ftn2 = Ff::where('ff',$cer[$i]->ff)->where('gestion',$gestion)->first();		
			}
			elseif ($i == 2) {
				$ftn2 = Ff::where('ff',$cer[$i]->ff)->where('gestion',$gestion)->first();		
			}
			elseif ($i == 3) {
				$ftn2 = Ff::where('ff',$cer[$i]->ff)->where('gestion',$gestion)->first();		
			}
			elseif ($i == 4) {
				$ftn2 = Ff::where('ff',$cer[$i]->ff)->where('gestion',$gestion)->first();		
			}
		}
		// $cer2 = Certificado2::where('cod_cert',$certificado->cod)->where('gestion',$gestion)
		// 			->union($ftn1)
		// 			->get();

		
		$pageName = 'reporte_certificacion_1.pdf';
		$pageMargins = [5, 5, 5, 5];
		$cer->aux = 'sss';
		$cer = (object)$cer; 
		$data = [
			'fhs' => now(),
			'fs' => now()->format('d/m/Y'),
			'ys' => now()->format('Y'),
			'pq' => 'mundo',
			'cert' => $certificado,
			'das' => Das::where('da', $certificado->da)->where('ue', $certificado->ue)->where('gestion', $gestion)->first(),
			'cat_prog' => CatProg::where('da', $certificado->da)->where('ue', $certificado->ue)->where('gestion', $gestion)->first(),
			'cert2' => $certificado2,
			'cer' => $cer,
			// 'cer2' =>$cer2,
			// 'ff' => $size,
			'query' => $query,
			'ff1' => $ftn1,
			'ff2' => $ftn2,
			'enBolivianos' => $enBolivianos,
			'clasgast' => $gast,
			// 'org' => $orga,
			// 'partidas' => $partidas,
			//'certif' => $certif,
			// 'ff' => Ff::where('ff',$certificado2->ff)->where('gestion', $gestion)->first(),
			// 'org' => Org::where('org',$certificado2->org)->where('gestion', $gestion)->first(),
			// 'partidas' => Partidas::where('objgast',$certificado2->part)->where('gestion', $gestion)->first(),
			// 'das' => Das::where('da',$cert)->where('gestion',$gestion)->first(),
		// 'guia_internacion' => GuiaInternacion::with('productor', 'productor.departamento_extension', 'vehiculo', 'marca', 'color')->find($id),
		];
		return \PDF::loadView('print.reportcert1', $data)
		// ->setOption('header-html', $headerHtml)
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
		// $headerHtml = view()->make('partial.head')->render();
		// $footerHtml = view()->make('partial.foot')->render();
		$certificado = Certificado::where('secuencia',$secuencia)->where('gest',$gestion)->first();
		$certificado2 = Certificado2::where('cod_cert',$certificado->cod)->where('gestion',$gestion)->first();
		$cer = Certificado2::where('cod_cert',$certificado->cod)->where('gestion',$gestion)->get();
		$ftn = Ff::where('gestion',$gestion)->get();
		$gast = ClasGast::where('class_gast', $certificado->tipo)->where('gestion',$gestion)->first();
		$enBolivianos= NumerosEnLetras::convertir(1988208.91,'Bolivianos',false,'Centavos');
		// $certif = Certificado2::join("certificado2.ff", '=', $ftn)->first();
		$pageMargins = [5, 5, 5, 5];
		$pageName = 'reporte_certificacion_1.pdf';
		$data = [
			'fhs' => now(),
			'fs' => now()->format('d/m/Y'),
			'ys' => now()->format('Y'),
			'pq' => 'mundo',
			'cert' => $certificado,
			'das' => Das::where('da', $certificado->da)->where('ue', $certificado->ue)->where('gestion', $gestion)->first(),
			'cat_prog' => CatProg::where('da', $certificado->da)->where('ue', $certificado->ue)->where('gestion', $gestion)->first(),
			'cert2' => $certificado2,
			'cer' => $cer,
			//'ff' => $ftn,
			'enBolivianos' => $enBolivianos,
			'clasgast' => $gast,
			// 'org' => $orga,
			// 'partidas' => $partidas,
			// 'certif' => $certif,
			// 'ff' => Ff::where('ff',$certificado2->ff)->where('gestion', $gestion)->first(),
			// 'org' => Org::where('org',$certificado2->org)->where('gestion', $gestion)->first(),
			// 'partidas' => Partidas::where('objgast',$certificado2->part)->where('gestion', $gestion)->first(),
			// 'das' => Das::where('da',$cert)->where('gestion',$gestion)->first(),
		// 'guia_internacion' => GuiaInternacion::with('productor', 'productor.departamento_extension', 'vehiculo', 'marca', 'color')->find($id),
		];
		return \PDF::loadView('print.reportcert2', $data)
		// ->setOption('header-html', $headerHtml)
		// ->setOption('footer-html', $footerHtml)
		->setOption('page-size','Letter','landscape')
		->setOption('margin-top', $pageMargins[0])
		->setOption('margin-right', $pageMargins[1])
		->setOption('margin-bottom', $pageMargins[2])
		->setOption('margin-left', $pageMargins[3])
		->setOption('encoding', 'utf-8')
		->stream($pageName);
		
	 } //
	 
	 
}
