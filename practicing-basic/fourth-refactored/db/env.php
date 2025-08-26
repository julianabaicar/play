<?php
function carregarEnv($caminho = __DIR__ . '/../.env') {
    if (!file_exists($caminho)) {
        throw new Exception(".env não encontrado em: $caminho");
    }

    $linhas = file($caminho, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($linhas as $linha) {
        if (str_starts_with(trim($linha), '#') || !str_contains($linha, '=')) continue;
        list($chave, $valor) = explode('=', $linha, 2);
        putenv(trim($chave) . '=' . trim($valor));
    }   
}