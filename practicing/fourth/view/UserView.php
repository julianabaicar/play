<?php

class UserView
{
    public function index()
    {
        include(__DIR__ . "/../form.html"); // chama o formulário
    }

    public function render($nome, $email, $telefone)
    {
        include "data.html"; # exibe os dados recem cadastrados
    }

    public function renderList($users)
    {
        include "list.html"; # lista usuarios cadastrado em uma tabela
    }

    public function renderEditForm($user)
{
    include "form_update.html"; # exibe formulario ja preenchido com os dados do usuário e editável
}

}