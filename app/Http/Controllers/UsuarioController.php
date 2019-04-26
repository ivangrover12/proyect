<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        // $certificados = Certificado::orderBy('secuencia', 'ASC')->get();
        return view('usuario.index', compact('usuario'));
    }//
     public function getuser(){
        $result = User::all();
        return $result;
    } //   
}
