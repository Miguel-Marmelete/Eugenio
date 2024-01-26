<!DOCTYPE html>
<html>
<head>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">

    <title>Circuito de Testes Eugénio</title>

</head>

<body class="bg-gray-200 align-items justify-content border-test">


<div class="first-container border-test">

    <div class="border-test logo-container">
        <img src="{{asset('images/00-ÍconeEugénio.png')}}" class="custom-logo" alt="Eugenio Logo"/>
    </div>


    <div class="border-test h1-title-container"><h1
            class="md:text-6xl text-xl font-bold text-blue-700 text-center border-test ">
            Circuito de Testes
            Eugénio</h1></div>

    <div class="border-test end-session-container">
        @if(session()->has('sessionId'))

            <div>
                {{ session('sessionName') }}
            </div>

            <div>
                <button type="submit" id="getSessionsBtn"
                        class="end-session-button"
                        onclick="location.href='/clearSession'">Terminar Sessão
                </button>
            </div>
        @endif

    </div>
</div>

<div class="container mx-auto h-full border-test mt-10">
    <div class="container mx-auto text-center">

        @if(session()->has('configId'))
            {{ session('configId') }}
        @endif
        <?php

        if (session()->has('sessionId')) {
            echo session('sessionId');
            echo '<button id="realizar-inscricoes-button"
            class="text-white font-bold py-2 px-4 rounded-full"
            onclick="location.href=\'' . url('realizar-inscricoes') . '\'">Realizar Inscrições</button>';
            echo '<button class="text-white font-bold py-2 px-4 rounded-full"
            onclick="location.href=\'' . url('iniciar-desafio') . '\'">Iniciar Desafio</button>';
            echo '<button class="text-white font-bold py-2 px-4 rounded-full"
            onclick="location.href=\'' . url('ver-resultados') . '\'" >Ver Resultados</button>';

        } else {
            echo '<button type="submit" id="create-session-button"
            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">Criar Sessao</button>';
            echo '<button type="submit" id="getSessionsBtn"
            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4
            rounded-full" onclick="location.href=\'/getSessions\'">Escolher Sessão</button>';

        }
        ?>
        <button id="configBtn"
                class="{{--bg-green-500 hover:bg-green-600 text-white--}} font-bold py-2 px-4 rounded-full"
                onclick="location.href='/getAllConfigs'">Configurações
        </button>


        <!--<button type="submit" id="create-session-button" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">Criar Sessão</button>-->
        <!--<button type="submit" id="getSessionsBtn" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full" onclick="location.href='/getSessions'">Escolher Sessão</button>-->


        <!-- <button id="realizar-inscricoes-button" class=" text-white font-bold py-2 px-4 rounded-full" onclick="location.href='{{url('realizar-inscricoes')}}'">Realizar Inscrições</button> -->
        <!-- <button class=" text-white font-bold py-2 px-4 rounded-full" onclick="location.href='{{url('iniciar-desafio')}}'" >Iniciar Desafio</button> -->
        <!-- <button class="text-white font-bold py-2 px-4 rounded-full" onclick="location.href='{{url('ver-resultados')}}'" >Ver Resultados</button> -->
        <!-- <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full" onclick="window.open('', '_self', ''); window.close();" >Sair</button> -->

    </div>
</div>
<script src="{{ asset('js/home_scripts.js') }}"></script>
</body>
</html>
