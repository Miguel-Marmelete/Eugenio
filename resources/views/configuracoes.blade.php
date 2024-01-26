<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://unpkg.com/tailwindcss@^2.2/dist/tailwind.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <title>Configurações</title>

</head>

<body class="bg-gray-200">

<div class="h1-title-container">
    <h1 class="md:text-6xl text-xl font-bold text-blue-700 text-center mt-12">
        Configurações</h1>
</div>

<div class="mx-auto p-8 bg-white rounded-lg shadow-lg lg:w-1/2 w-full mx-auto my-16">
    <form action="/setConfig" method="POST" class="mb-10">
        <label for="configOptions" class="block text-gray-700 text-sm font-bold mb-2">Escolha uma Configuração:</label>
        <select id="configId" name="configId" class="w-full border p-2 rounded">
            <?php foreach ($configuracoes as $configuracao): ?>
            <option value="<?php echo $configuracao->PK_Configuracao; ?>"><?php echo $configuracao->Titulo; ?></option>
            <?php endforeach; ?>
        </select>

        <div class="mb-20">
            <button type="submit" id="confirmSessionBtn"
                    class="mt-4 bg-green-500 hover:bg-green-600
                text-white font-bold py-2 px-4 rounded-full float-right"
            >Escolher
                Configuração
            </button>
        </div>
    </form>

    <form method="POST" action="/adicionarConfiguracao" class="mb-8">
        <div class="mb-4">
            <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
            <input type="text" name="titulo" class="w-full border p-2 rounded"
                   placeholder="Insira o nome da nova configuração" required>
        </div>

        <div class="mb-4">
            <label for="tempo_configuracao" class="block text-gray-700 text-sm font-bold mb-2">Tempo de
                Configuração:</label>
            <input type="time" name="tempo_configuracao" class="w-full border p-2 rounded" value="00:02:00" required>
        </div>

        <div class="mb-4">
            <label for="texto" class="block text-gray-700 text-sm font-bold mb-2">Texto:</label>
            <textarea name="texto" class="w-full border p-2 rounded" rows="4"
                      placeholder="Escreva o texto da nova configuração" required></textarea>
        </div>
        <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full float-right">
            Adicionar
        </button>

    </form>

    <div class="menu-btn-container-configurations">
        <div class=".main-menu-btn-second-div">
            <a href="/" class="block text-center">
                <button type="button"
                        class="mt-4 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-full">
                    Ir para o Menu Inicial
                </button>
            </a>
        </div>
    </div>

</div>
</body>
</html>
