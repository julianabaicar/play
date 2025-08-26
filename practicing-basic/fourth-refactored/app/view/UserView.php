<?php

class UserView
{
    private $basePath;

    public function __construct()
    {
        // garante o caminho correto para resources
        $this->basePath = __DIR__ . "/../resources/";
    }

    public function index()
    {
        include $this->basePath . "button_create.html"; // chama o formulário
    }

    public function renderForm()
    {
        include $this->basePath . "form.html";
    }

    public function render($nome, $email, $telefone)
    {
        include $this->basePath . "data.html"; # exibe os dados recém cadastrados
    }

    public function renderList($users)
    {
        include $this->basePath . "list.html"; # lista usuários cadastrados em uma tabela
    }

    public function renderEditForm($user)
    {
        include $this->basePath . "form_update.html"; # exibe formulário preenchido para edição
    }
}
