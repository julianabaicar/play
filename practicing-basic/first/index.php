<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Usuário</title>
</head>

<body>
    <form method="post" action="">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name">
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <br>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone">
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    // Verifica se a requisição HTTP recebida é do tipo POST.
    // Isso é importante para garantir que o código dentro do bloco só será executado quando o formulário for enviado,
    // evitando que ações como validação ou processamento de dados ocorram em requisições GET ou outros métodos.

    // GET: busca dados do servidor;
    // POST: envia dados para o servidor;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = [
            'nome' => isset($_POST['name']) ? trim($_POST['name']) : '',
            'email' => isset($_POST['email']) ? trim($_POST['email']) : '',
            'telefone' => isset($_POST['telefone']) ? trim($_POST['telefone']) : ''
        ];

        echo "<div>";
        foreach ($user as $key => $value) {
            echo htmlspecialchars(ucfirst($key) . ": $value") . "<br>";
        }
        echo "</div>";
    }
    ?>

</body>
</html>