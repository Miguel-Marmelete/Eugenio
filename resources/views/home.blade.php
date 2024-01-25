<!DOCTYPE html>
<html>
  <head>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
      button{
        background-color: blue
      }
      button:hover{
        background-color: cadetblue
      }
      .title {
        text-align: center;
        font-size: 4rem;
        margin-bottom: 2rem;
      }
      #successMessage {
        display: none;
      }
      .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
      }
      .container > button {
        margin: 1rem 0;
        font-size: 2rem;
        padding: 1.5rem 3rem;
        width: 50%;
        text-align: center;
      }
      .container > button:last-child {
        background-color: red;
      }
      @media (max-width: 1080px) {
        .container > button {
          font-size: 1.5rem;
          padding: 1rem 2rem;
        }
      }
      @media (max-width: 720px) {
        .container > button {
          font-size: 1.25rem;
          padding: 0.75rem 1.5rem;
        }
      }
    </style>
  </head>
  
  <body class="bg-gray-200 align-items justify-content">
    <div class="container mx-auto h-full">
      <?php
        echo '<button type="submit" id="getSessionsBtn" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full" onclick="location.href=\'/clearSession\'">Terminar Sessão</button>';
        ?>
      <h1 class="md:text-6xl text-xl font-bold text-blue-700 text-center mt-20">Circuito de Testes Eugénio</h1>
      <div class="container mx-auto text-center">

        @if(session()->has('configId'))
            {{ session('configId') }}
        @endif
        <?php
        
          if (session()->has('sessionId')) {
              echo session('sessionId');
              echo '<button id="realizar-inscricoes-button" class="text-white font-bold py-2 px-4 rounded-full" onclick="location.href=\''.url('realizar-inscricoes').'\'">Realizar Inscrições</button>';
              echo '<button class="text-white font-bold py-2 px-4 rounded-full" onclick="location.href=\''.url('iniciar-desafio').'\'">Iniciar Desafio</button>';
              echo '<button class="text-white font-bold py-2 px-4 rounded-full" onclick="location.href=\''.url('ver-resultados').'\'" >Ver Resultados</button>';

          } else {
              echo '<button type="submit" id="create-session-button" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">Criar Sessao</button>';
              echo '<button type="submit" id="getSessionsBtn" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full" onclick="location.href=\'/getSessions\'">Escolher Sessão</button>';
              
          }
        ?>
        <button id="configBtn" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full" onclick="location.href='/getAllConfigs'">Configurações</button>


        
        <!--<button type="submit" id="create-session-button" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">Criar Sessão</button>-->
        <!--<button type="submit" id="getSessionsBtn" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full" onclick="location.href='/getSessions'">Escolher Sessão</button>-->
        
        
        <!-- <button id="realizar-inscricoes-button" class=" text-white font-bold py-2 px-4 rounded-full" onclick="location.href='{{url('realizar-inscricoes')}}'">Realizar Inscrições</button> -->
        <!-- <button class=" text-white font-bold py-2 px-4 rounded-full" onclick="location.href='{{url('iniciar-desafio')}}'" >Iniciar Desafio</button> -->
        <!-- <button class="text-white font-bold py-2 px-4 rounded-full" onclick="location.href='{{url('ver-resultados')}}'" >Ver Resultados</button> -->
        <!-- <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full" onclick="window.open('', '_self', ''); window.close();" >Sair</button> -->

      </div>
    </div>
  </body>
</html>

<script>
  // Script botão 'Criar Sessão'
  document.getElementById("create-session-button").addEventListener("click", function(e) {
  e.preventDefault();

  //prompt para colcoar a password
  var sessionName = prompt("Digite seu nome da sessão:");
 
  var password = prompt("Insira a password");
  



  if (password === "admin") { // Se a password estiver correta
   
    setTimeout(function() {
      document.getElementById("create-session-button").innerHTML = "Criar Sessão"; //Alteração do texto do botão depois da mensagem de sucesso ser apresentada
      document.getElementById("create-session-button").style.backgroundColor = ""; //Alteração da cor de background do botão da mensagem de sucesso ser apresentada
      //utilizar o post aqui com o endpoint para poder enviar o nome da sessao
      location.href="/criar-sessao?sessionName=" + encodeURIComponent(sessionName);
      alert("sessao criada com sucesso");
      location.href="/";

      
    }, 2000);
  } else { // Se a password estiver incorreta
    document.getElementById("create-session-button").innerHTML = "Senha incorreta"; //Alteração do texto do botão
    document.getElementById("create-session-button").style.backgroundColor = "red"; //Alteração da cor de background do botão

    setTimeout(function() {
      document.getElementById("create-session-button").innerHTML = "Criar Sessão"; //Alteração do texto do botão depois da mensagem de erro ser apresentada
      document.getElementById("create-session-button").style.backgroundColor = ""; //Alteração da cor de background do botão da mensagem de erro ser apresentada
    }, 2000);
  }
});
</script>
