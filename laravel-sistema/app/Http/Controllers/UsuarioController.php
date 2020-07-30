<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(){
        return view('usuario', [
            'texto' => 'Hellow Word do blade',
            'checagem' => true,
            'usuarios' => ['usuario1', 'usuario2', 'usuario3', 'usuario4']
        ]);
    }

}
