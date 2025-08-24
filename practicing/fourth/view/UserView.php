<?php

class UserView
{
    public function index()
    {
        include "form.html"; // chama o formulário
    }

    public function render($nome, $email, $telefone)
    {
        // Torna as variáveis disponíveis no escopo do include
        include "data.html";
    }

    public function renderList($users)
    {
        // Torna a variável $users acessível no escopo do include
        include "list.html";
    }

    public function renderEditForm($user)
{
    include "form_update.html";
}

}