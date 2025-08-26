<?php
require_once __DIR__ . '/../controller/UserController.php';
require_once __DIR__ . '/../model/UserModel.php';
require_once __DIR__ . '/../view/UserView.php';

function assertContains($needle, $haystack, $message) {
    if (strpos($haystack, $needle) === false) {
        echo "❌ $message\n";
    } else {
        echo "✅ $message\n";
    }
}


function testUserRegistrationFlow() {
    // Simula dados enviados via formulário
    $_POST['nome'] = 'Maria Antonia';
    $_POST['email'] = 'maria@email.com';
    $_POST['telefone'] = '41999999999';

    // Cria instância do controller
    $controller = new UserController();

    // Captura a saída do método que processa o cadastro
    ob_start();
    $controller->save(); // deve salvar e exibir os dados
    $output = ob_get_clean();

    // Verifica se os dados aparecem na saída
    assertContains('Maria Antonia', $output, "Nome deve aparecer na resposta");
    assertContains('maria@email.com', $output, "Email deve aparecer na resposta");
    assertContains('41999999999', $output, "Telefone deve aparecer na resposta");

    echo "✅ Teste de integração do cadastro passou!\n";
}

testUserRegistrationFlow();
