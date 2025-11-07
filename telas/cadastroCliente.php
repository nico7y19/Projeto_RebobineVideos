<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/cadastroC.css" />
    <title>Locadora de Filmes</title>
</head>

<body>
    <div class="login-container">
        <h2>Registre-se aqui</h2>

        <form method="POST">

            <div class="formulario">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required />
            </div>

            <div class="formulario">
                <label for="dataNas">Data de nascimento:</label>
                <input class="data" type="date" id="dataNas" name="dataNas" required />
            </div>

            <div class="formulario">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required />
            </div>

            <div class="formulario">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required />
            </div>

            <button type="submit">Registrar</button>
        </form>
    </div>

    <?php
    require_once '../bancoDados/bancoDados.php';
    require_once '../classes/cliente.php';
    require_once '../DAO/clienteDAO.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nome = $_POST['nome'];
        $dataNasc = $_POST['dataNas'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];

        // Hash da senha para segurança
        $hashSenha = password_hash($senha, PASSWORD_BCRYPT);

        // Validação básica
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p>Email inválido!</p>";
            exit;
        }
        // Cria o objeto Cliente e ClienteDAO
        $cliente = new cliente(0, $nome, $dataNasc, $email, $hashSenha);
        $clienteDAO = new ClienteDAO(getDbConnection());

        // Prepara os dados para inserção
        $clienteData = [
            'id' => $cliente->getId(),
            'nomeC' => $cliente->getNomeC(),
            'Y-m-d' => $cliente->getDataNascimento()->format('Y-m-d'),
            'email' => $cliente->getEmail(),
            'senha' => $cliente->getSenha()
        ];
        // Tenta criar o cliente no banco de dados
        if ($clienteDAO->create($clienteData)) {
            // Redireciona para a página principal após o registro bem-sucedido
            header('Location: login.php');
            exit();
        } else {
            // Exibe mensagem de erro caso o registro falhe
            echo "<script>alert('Erro ao registrar cliente..');
                    window.location.href = 'login.php';
            </script>";
        }

    }
    ?>
</body>

</html>