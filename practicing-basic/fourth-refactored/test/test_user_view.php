<?php
require_once(__DIR__ . "/../app/view/UserView.php");

// para rodar esteja na dentro da pasta test: cd play\practicing\fourth\test
// depois execute: php test_user_view.php

function assertContains($needle, $haystack, $message = '') {
    if (strpos($haystack, $needle) === false) {
        echo "❌ FAIL: $message\n";
    } else {
        echo "✅ PASS: $message\n";
    }
}

function testRenderIndex() {
    $view = new UserView();

    ob_start();
    $view->index(); // deve incluir form.html
    $output = ob_get_clean();

    assertContains('<form', $output, "index deve incluir um formulário");
    assertContains('type="submit"', $output, "formulário deve ter botão de submit");
}

function testRenderList() {
    $view = new UserView();
    $users = [
        ['nome' => 'Ana', 'email' => 'ana@email.com', 'telefone' => '123456789'],
        ['nome' => 'Bruno', 'email' => 'bruno@email.com', 'telefone' => '987654321']
    ];

    ob_start();
    $view->renderList($users); // deve incluir list.html
    $output = ob_get_clean();

    assertContains('<table', $output, "renderList deve incluir uma tabela");
    assertContains('Ana', $output, "renderList deve mostrar nome do usuário");
}

function testRenderEditForm() {
    $view = new UserView();
    $user = ['nome' => 'Carlos', 'email' => 'carlos@email.com', 'telefone' => '111222333'];

    ob_start();
    $view->renderEditForm($user); // deve incluir form_update.html
    $output = ob_get_clean();

    assertContains('value="Carlos"', $output, "form_update deve estar preenchido com nome");
    assertContains('<form', $output, "form_update deve conter um formulário");
}

function runViewTests() {
    echo "=== Testes da View ===\n";
    testRenderIndex();
    testRenderList();
    testRenderEditForm();
    echo "=== Fim dos testes da View ===\n";
}

runViewTests();
