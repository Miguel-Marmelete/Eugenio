<!DOCTYPE html>
<html>
  <head>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
      
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
      <div class="container mx-auto h-full">

        <form action="/setConfig" method="POST">
            <label for="configOptions">Escolha uma Configuração:</label><br>
            <select id="configId" name="configId">
                <?php foreach($configuracoes as $configuracao): ?>
                    <option value="<?php echo $configuracao->PK_Configuracao; ?>"><?php echo $configuracao->Titulo; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" id="confirmSessionBtn">Escolher Configuração</button>
        </form>

      </div>
      
      <div class="container">
          <form method="POST" action="/adicionarConfiguracao">
  
              <div class="form-group">
                  <label for="titulo">Título:</label>
                  <input type="text" name="titulo" class="form-control" required>
              </div>
  
              <div class="form-group">
                  <label for="tempo_configuracao">Tempo de Configuração:</label>
                  <input type="time" name="tempo_configuracao" class="form-control" value="00:02:00" required>
              </div>
  
              <div class="form-group">
                  <label for="texto">Texto:</label>
                  <textarea name="texto" class="form-control" rows="4" required></textarea>
              </div>
  
              <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
      </div>

    </div>
  </body>
</html>

