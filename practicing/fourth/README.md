# Quarto passo: Estruturar o projeto de CRUD no padrão MVC com conexão ao banco de dados MySQL

### Estrutura do Projeto

```bash
fourth
├── controller
│   └── UserController.php # Conecta Model e View, possui dois metodos index: formulario e salvar
├── model
│   └── UserModel.php # Classe que representa o modelo de dados do usuário e interage com o banco de dados
│   └── ConnectionDB.php # Classe que gerencia a conexão com o banco de dados
│   └── env.php # Carrega as variáveis de ambiente do arquivo .env
├── view
│   └── UserView.php # Redireciona a tela inicial para index.html e renderiza os dados do usuário no metodo Render quando chamado
│   └── list.html # Página para listar os usuários
│   └── data.html # Página para exibir os dados de um usuário recem cadastrado
├── test
│   └── test_connection.php # Arquivo para testar a conexão com o banco de dados
├── .env # variáveis para a conexão no banco de dados
├── .gitignore # Usado para ignorar arquivos ao subir para o git, como arquivos com dados sensiveis como o .env
├── index.php # Ponto de entrada da aplicação, direciona para UserController
├── form.html # Formulário HTML para entrada de dados do usuário
├── README.md
```
