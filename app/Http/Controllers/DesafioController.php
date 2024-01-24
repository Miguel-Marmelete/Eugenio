<?php

namespace App\Http\Controllers;

use App\Models\Jogador;

use App\Models\Configuracao;


class DesafioController extends Controller
{
    function index(){

        // Obter a configuração selecionada
        $configuracaoID = request()->get('configuracoes');
        $configuracao = Configuracao::find($configuracaoID);

        // Obter o jogador selecionado
        $jogadorID = request()->get('jogadores');
        $jogador = Jogador::find($jogadorID);

        $tempo_config = ($configuracao->Tempo_Configuracao);

        return view('desafio', [
            'configuracao' => $configuracao,
            'jogador' => $jogador,
            'tempo_config' => $tempo_config
        ]);
    }

    function configClassification(){

    }
}
