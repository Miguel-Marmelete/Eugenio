<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título da Página</title>
</head>
<body>

    <form action="/setSession" method="GET">
        <label for="sessionId">Escolha uma Sessão:</label>
        <select id="sessionId" name="sessionId">
            <?php foreach($sessions as $session): ?>
                <option value="<?php echo $session->PK_Sessao; ?>"><?php echo $session->Name; ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit" id="confirmSessionBtn">Escolher Sessão</button>
    </form>

    <a href="/">
        <button type="button">Menu Inicial</button>
    </a>
</body>
</html>
