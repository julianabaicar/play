<?php
require_once __DIR__ . "/../view/UserView.php";
require_once __DIR__ . "/../model/UserModel.php";

class UserController
{
    // responsabilidade única da classe: controlar o fluxo entre Model e View

    public function index()
    {
        // responsabilidade: carregar a tela inicial com botão e lista
        $model = new UserModel('', '', '');
        $users = $model->listAllUsers();

        $view = new UserView();
        $view->index();
        $view->renderList($users);
    }

    public function create()
    {
        // responsabilidade: exibir o formulário de criação de usuário
        $view = new UserView();
        $view->renderForm();
    }

    public function save()
    {
        // responsabilidade: salvar os dados de um novo usuário
        $nome = $_POST['nome'] ?? '';
        $email = $_POST['email'] ?? '';
        $telefone = $_POST['telefone'] ?? '';

        $model = new UserModel($nome, $email, $telefone);
        $id = $model->saveUser();
        
        $view = new UserView();
        $view->render(
            $model->get_nome(),
            $model->get_email(),
            $model->get_telefone()
        );
    }

    public function list()
    {
        // responsabilidade: listar todos os usuários
        $model = new UserModel('', '', '');
        $users = $model->listAllUsers();

        $view = new UserView();
        $view->renderList($users);
    }

    public function delete($id)
    {
        // responsabilidade: deletar um usuário
        $model = new UserModel('', '', '');
        $model->deleteUser($id);

        header("Location: index.php?action=index");
        exit;
    }

    public function edit($id)
    {
        // responsabilidade: exibir o formulário de edição de usuário
        $model = new UserModel('', '', '');
        $user = $model->getUserById($id);

        $view = new UserView();
        $view->renderEditForm($user);
    }
}