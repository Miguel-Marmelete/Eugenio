<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classificacao;
use App\Models\Sessao;
use App\Models\Teste;
use App\Models\Jogador;

class ClassificacaoAtualController extends Controller
{
    function index(Request $request){

        // Obter a sessão atual
        $sessionId = session("sessionId");
        $sessao = Sessao::where('PK_Sessao',$sessionId)->first();

        //Obter os dados passados por url
        $wpm = $request->input('wpm');
        $correctWords = $request->input('correctWords');
        $incorrectWords = $request->input('incorrectWords');
        $timePassed = $request->input('timePassed');
        $pontuacaoFinal = $request->input('pontuacaoFinal');
        $PK_Configuracao = session("configId");
        $PK_Jogador = $request->input('jogador');

        // Criar uma nova classificação, na BD, baseada nesses dados
        $classificacao = new Classificacao();
        $classificacao->WPM = $wpm;
        $classificacao->QTD_Erros = $incorrectWords;
        $classificacao->QTD_Certas = $correctWords;
        $classificacao->Tempo = $timePassed;
        $classificacao->Pontuacao_Final = $pontuacaoFinal;
        $classificacao->save();

        // Obter o teste que do utilizador para esta configuração
       $thisTest = Teste::where('FK_Sessao', session("sessionId"))
            ->where('FK_Configuracao', $PK_Configuracao)
            ->where('FK_Jogador', $PK_Jogador)
            ->first();
            /*
            $teste = new Teste();
            $teste->FK_Sessao = $sessionId;
            $teste->FK_Configuracao = $PK_Configuracao;
            $teste->FK_Jogador = $PK_Jogador;
            $teste->FK_Classificacao = $classificacao->PK_Classificacao;
            $teste->save();*/


        //debug
        //if ($thisTest === null) {return view('Home');}
        // Colocar a classificação criada no teste (Anteriormente era null)
        $thisTest->update(['FK_Classificacao' => $classificacao->PK_Classificacao]);

        
        // Obter as classificações do utilizador
        /*
        $classificacoes = Classificacao::join('Teste', 'Classificacao.PK_Classificacao', '=', 'Teste.FK_Classificacao')
            ->join('Jogador', 'Teste.FK_Jogador', '=', 'Jogador.PK_Jogador')
            ->join('Sessao', 'Teste.FK_Sessao', '=', 'Sessao.PK_Sessao')
            ->where('Sessao.PK_Sessao', $sessao)
            ->get(['Teste.FK_Configuracao as id_configuracao','Jogador.Nome as Nome_Jogador', 'Jogador.PK_Jogador as id_jogador', 'Classificacao.*']);
        */
        //echo $classificacoes;

        return view('classificacao-config', [
            'classificacao' => $classificacao,
            'NomeJogador' => Jogador::find($PK_Jogador)->Nome,
            'idConfiguracao' => $PK_Configuracao
        ]);

    }
}
