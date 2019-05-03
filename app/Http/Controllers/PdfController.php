<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
  //   public function github (){
 	// return \PDF::loadFile('https://github.com/')->stream('github.pdf'); 


 	public function print1($id) {
		// $headerHtml = view()->make('partial.head')->render();
		// $footerHtml = view()->make('partial.foot')->render();
		$pageMargins = [5, 5, 5, 5];
		$pageName = 'guia_internacion.pdf';
		$data = [
			'pr' => 'hola',
			'pq' => 'mundo'
		// 'guia_internacion' => GuiaInternacion::with('productor', 'productor.departamento_extension', 'vehiculo', 'marca', 'color')->find($id),
		]; 
		return \PDF::loadView('print.ivan', $data)
		// ->setOption('header-html', $headerHtml)
		// ->setOption('footer-html', $footerHtml)
		->setOption('page-size','A4','landscape')
		->setOption('margin-top', $pageMargins[0])
		->setOption('margin-right', $pageMargins[1])
		->setOption('margin-bottom', $pageMargins[2])
		->setOption('margin-left', $pageMargins[3])
		->setOption('encoding', 'utf-8')
		->stream($pageName);
		
 } //
}
