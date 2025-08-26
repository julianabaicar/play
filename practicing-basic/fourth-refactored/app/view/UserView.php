<?php

class UserView
{
    // responsabilidade única da classe: exibir as views relacionadas ao usuário
    
    private $basePath;

    public function __construct()
    {
        // garante o caminho correto para resources
        $this->basePath = __DIR__ . "/../resources/";
    }

    public function index()
    {
        include $this->basePath . "button_create_user.html"; // chama o formulário
    }

    public function renderForm()
    {
        include $this->basePath . "form_create_user.html"; # formulario de cadastro de novo usuário
    }

    public function render($nome, $email, $telefone)
    {
        include $this->basePath . "created_user_data.html"; # exibe os dados recém cadastrados
    }

    public function renderList($users)
    {
        include $this->basePath . "list_all_users.html"; # lista usuários cadastrados em uma tabela
    }

    public function renderEditForm($user)
    {
        include $this->basePath . "form_update_user.html"; # exibe formulário preenchido para edição
    }
}