<?php
require_once(__DIR__ . "/../app/model/UserModel.php");

// para rodar esteja na dentro da pasta test: cd play\practicing\fourth\test
// depois execute: php test_user_model.php

function assertEquals($expected, $actual, $message = '') {
    if ($expected !== $actual) {
        echo "❌ FAIL: $message\n";
    } else {
        echo "✅ PASS: $message\n";
    }
}

function testSaveUser() {
    $user = new UserModel("Teste Model", "model@example.com", "123456789");
    $id = $user->saveUser();
    assertEquals(true, is_numeric($id), "saveUser should return a numeric ID");
}

function testListAllUsers() {
    $user = new UserModel("Listar", "listar@example.com", "987654321");
    $user->saveUser();
    $users = $user->listAllUsers();
    assertEquals(true, is_array($users), "listAllUsers should return an array");
}

function testGetUserById() {
    $user = new UserModel("Buscar", "buscar@example.com", "111222333");
    $id = $user->saveUser();
    $found = $user->getUserById($id);
    assertEquals("buscar@example.com", $found['email'], "getUserById should return correct user");
}

function testUpdateUser() {
    $user = new UserModel("Atualizar", "atualizar@example.com", "444555666");
    $id = $user->saveUser();
    $user->updateUser($id, "Novo Nome", "novo@example.com", "000111222");
    $updated = $user->getUserById($id);
    assertEquals("Novo Nome", $updated['nome'], "updateUser should change user name");
}

function testDeleteUser() {
    $user = new UserModel("Apagar", "apagar@example.com", "777888999");
    $id = $user->saveUser();
    $user->deleteUser($id);
    $deleted = $user->getUserById($id);
    assertEquals(false, $deleted, "deleteUser should remove user");
}

function runModelTests() {
    echo "=== Testes da Model ===\n";
    testSaveUser();
    testListAllUsers();
    testGetUserById();
    testUpdateUser();
    testDeleteUser();
    echo "=== Fim dos testes da Model ===\n";
}

runModelTests();