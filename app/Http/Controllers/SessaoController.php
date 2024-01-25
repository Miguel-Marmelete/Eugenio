<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sessao;
use Illuminate\Support\Facades\Session;


class SessaoController extends Controller
{
    public function criarSessao(Request $request)
    {
        // Criar uma nova sessão
        $sessao = new Sessao();
        $sessao->Name = $request->query('sessionName');
        $sessao->Data_sessao = now();
        $sessao->save();
        session(['sessionId' => Sessao::latest('PK_Sessao')->first()->PK_Sessao]);
        return View('Home',['sessionId' => $sessao->PK_Sessao]);
    }
    public function clearSession(){
        Session::flush();
        return view('Home');
    }

    public function setSession(Request $request){
        session(['sessionId' => $request->query('sessionId')]);
        return view('Home');
    }
    public function getAllSessions(){
        return view('escolher_sessao')->with('sessions', Sessao::all());
        //return response()->json(Sessao::all());
    }
}