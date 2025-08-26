<?php
// Para rodar no terminal:
    // 1 - Garanta que vc esteja na pasta: 
        // cd practicing-basic\fourth-refactored
    // 2 - php run_all_tests.php

$baseDir = __DIR__ . DIRECTORY_SEPARATOR . "test" . DIRECTORY_SEPARATOR;

$tests = [
    "test_connection.php",
    "test_create_user.php",
    "test_user_controller.php",
    "test_user_model.php",
    "test_user_view.php"
];

// Cores ANSI (funciona no PowerShell e Linux/Mac)
// Se não aparecer colorido no seu terminal, dá pra desativar
$green  = "\033[32m";
$red    = "\033[31m";
$yellow = "\033[33m";
$blue   = "\033[34m";
$reset  = "\033[0m";

$results = [];
$successCount = 0;
$failCount = 0;

foreach ($tests as $test) {
    $filePath = $baseDir . $test;

    echo "\n$blue====================================================$reset\n";
    echo " Executando: $yellow$test$reset\n";
    echo "$blue====================================================$reset\n";

    exec("php \"$filePath\" 2>&1", $output, $returnVar);

    $results[$test] = [
        "output" => $output,
        "status" => $returnVar
    ];

    if ($returnVar === 0) {
        $successCount++;
    } else {
        $failCount++;
    }

    $output = [];
}

echo "\n\n$blue====================================================$reset\n";
echo " RELATÓRIO FINAL DE TESTES\n";
echo "$blue====================================================$reset\n\n";

foreach ($results as $file => $data) {
    $statusText = $data["status"] === 0 ? "{$green}✅ SUCESSO{$reset}" : "{$red}❌ FALHOU{$reset}";

    echo "📂 Arquivo: $yellow$file$reset\n";
    echo implode("\n", $data["output"]);
    echo "\n----------------------------------------------------\n";
    echo "Status: $statusText\n";
    echo "$blue====================================================$reset\n\n";
}

// Resumo final
echo "\n$blue====================================================$reset\n";
echo "📊 RESUMO FINAL\n";
echo "$blue====================================================$reset\n";
echo "   {$green}✅ Sucessos: $successCount{$reset}\n";
echo "   {$red}❌ Falhas:   $failCount{$reset}\n";
echo "----------------------------------------------------\n";

if ($failCount > 0) {
    echo "   Resultado geral: {$red}ALGUNS TESTES FALHARAM{$reset}\n";
} else {
    echo "   Resultado geral: {$green}TODOS OS TESTES PASSARAM! 🎉{$reset}\n";
}
echo "$blue====================================================$reset\n";
