    <?php
    require 'index.html';
    
    // Verifica se a requisição HTTP recebida é do tipo POST.
    // Isso é importante para garantir que o código dentro do bloco só será executado quando o formulário for enviado,
    // evitando que ações como validação ou processamento de dados ocorram em requisições GET ou outros métodos.

    // GET: busca dados do servidor;
    // POST: envia dados para o servidor;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = [
            // Captura os dados do formulário
            // campo = valida se é null(pega valor via post) se não for null 
            // A função trim remove espaços em branco do início e do fim da string.
            'email' => isset($_POST['email']) ? trim($_POST['email']) : '',
            'telefone' => isset($_POST['telefone']) ? trim($_POST['telefone']) : ''
        ];

        // Exibe os dados do usuário de forma segura, prevenindo ataques XSS.
        // A função htmlspecialchars converte caracteres especiais em entidades HTML.
        // Isso impede que scripts maliciosos sejam executados no navegador do usuário.
        foreach ($user as $key => $value) {
            echo htmlspecialchars(ucfirst($key) . ": $value") . "<br>";
        }
    }