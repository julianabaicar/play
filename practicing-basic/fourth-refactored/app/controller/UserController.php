<?php
require_once __DIR__ . "/../view/UserView.php";
require_once __DIR__ . "/../model/UserModel.php";

class UserController
{
    public function index()
    {
        // responsabilidade: carregar a tela inicial com botão e lista
        $model = new UserModel('', '', '');
        $users = $model->listAllUsers();

        $view = new UserView();
        $view->index();            // primeiro exibe o botão de criar usuário
        $view->renderList($users); // depois renderiza a lista de usuários
    }

    public function create()
    {
        $view = new UserView();
        $view->renderForm();
    }

    public function save()
    {
        $nome = $_POST['nome'] ?? '';
        $email = $_POST['email'] ?? '';
        $telefone = $_POST['telefone'] ?? '';

        $model = new UserModel($nome, $email, $telefone);
        $id = $model->saveUser(); // grava no banco
        
        $view = new UserView();
        $view->render(
            $model->get_nome(),
            $model->get_email(),
            $model->get_telefone()
        );

    }

    public function list()
    {
        $model = new UserModel('', '', '');
        $users = $model->listAllUsers();

        $view = new UserView();
        $view->renderList($users);
    }

    public function delete($id)
    {
        $model = new UserModel('', '', '');
        $model->deleteUser($id);

        header("Location: index.php?action=index");
        exit;
    }

    public function edit($id)
    {
        $model = new UserModel('', '', '');
        $user = $model->getUserById($id);

        $view = new UserView();
        $view->renderEditForm($user); // novo método na view
    }
}
