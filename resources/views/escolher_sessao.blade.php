<form action="/setSession" method="GET">
    <label for="sessionOptions">Escolha uma Sessão:</label>
    <select id="sessionId" name="sessionId">
        <?php foreach($sessions as $session): ?>
            <option value="<?php echo $session->PK_Sessao; ?>"><?php echo $session->Name; ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit" id="confirmSessionBtn">Escolher Sessão</button>
</form>
