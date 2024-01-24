<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Configuracao;

class ConfiguracaoController extends Controller
{
    function getAllConfigs(){
        
        return view('configuracoes')->with('configuracoes', Configuracao::all());        

    }
    function setConfig(Request $request){
        session(['configId' => $request->input('configId')]);
        return view('Home');

    }
}
