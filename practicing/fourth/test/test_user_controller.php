<?php
require_once(__DIR__ . "/../controller/UserController.php");

// para rodar esteja na dentro da pasta test: cd play\practicing\fourth\test
// depois execute: php test_user_controller.php

function assertContains($needle, $haystack, $message = '') {
    if (strpos($haystack, $needle) === false) {
        echo "❌ FAIL: $message\n";
    } else {
        echo "✅ PASS: $message\n";
    }
}

function testIndex() {
    $controller = new UserController();
    ob_start();
    $controller->index();
    $output = ob_get_clean();
    assertContains('<form', $output, 'Index should render form');
    assertContains('Lista de Usuários', $output, 'Index should show user list');
}

function testSave() {
    $_POST['nome'] = 'Ju Teste';
    $_POST['email'] = 'ju@example.com';
    $_POST['telefone'] = '999999999';

    $controller = new UserController();
    ob_start();
    $controller->save();
    $output = ob_get_clean();
    assertContains('ju@example.com', $output, 'Save should include new user email');
}

function testList() {
    $controller = new UserController();
    ob_start();
    $controller->list();
    $output = ob_get_clean();
    assertContains('Lista de Usuários', $output, 'List should render user list');
}

function runTests() {
    echo "=== Rodando testes ===\n";
    testIndex();
    testSave();
    testList();
    echo "=== Fim dos testes ===\n";
}

runTests();
