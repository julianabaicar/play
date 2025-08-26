    <?php
    require_once __DIR__ . '/../app/controller/UserController.php';

    $controller = new UserController();
    $action = $_GET['action'] ?? null;

    // CRIAR NOVO USUÁRIO
    if ($action === 'create') {
        $controller->create();
        exit;
    }

    // SALVAR NOVO USUÁRIO
    if ($action === 'save' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'] ?? '';
        $email = $_POST['email'] ?? '';
        $telefone = $_POST['telefone'] ?? '';

        $controller->save(); // chama o método que já existe no UserController
        exit;
    }


    // DELETE via POST
    if ($action === 'delete') {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $controller->delete($id);
        } else {
            echo "ID não informado.";
        }
        exit;
    }

    // EDITAR - mostrar formulário
    if ($action === 'edit' && isset($_GET['id'])) {
        $controller->edit($_GET['id']);
        exit;
    }

    // ATUALIZAR - salvar alterações
    if ($action === 'update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'] ?? null;
        $nome = $_POST['nome'] ?? '';
        $email = $_POST['email'] ?? '';
        $telefone = $_POST['telefone'] ?? '';

        if ($id) {
            $model = new UserModel($nome, $email, $telefone);
            $model->updateUser($id, $nome, $email, $telefone);
            header("Location: index.php?action=index");
        } else {
            echo "ID não informado.";
        }
        exit;
    }


    // TELA INICIAL — lista de usuários
    if (!$action || $action === 'index' || $action === 'list') {
        $controller->index();
        exit;
    }

    // Se ação desconhecida
    echo "Ação '$action' não reconhecida.";