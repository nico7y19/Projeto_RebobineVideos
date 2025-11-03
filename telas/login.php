<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/login.css" />
  <title>Locadora de Filmes</title>
</head>

<body>
  <div class="login-container">
    <h2>Login</h2>

    <form method="POST">

      <div class="formulario">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required />
      </div>

      <div class="formulario">
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required />
      </div>

      <button type="submit">Entrar</button>
    </form>

    <p class="labelRegistro">
      Não possui uma conta? <a class="registre" href="cadastroCliente.php">Registre-se aqui</a>
    </p>

  </div>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once '../bancoDados/bancoDados.php';
  require_once '../DAO/clienteDAO.php';

  $nome = $_POST['username'];
  $senha = $_POST['password'];

  $clienteDAO = new ClienteDAO(getDbConnection());
  if ($clienteDAO->login($nome, $senha)) {
    // Inicia a sessão e armazena o nome do usuário na sessão
    $clienteLogado = $clienteDAO->login($nome, $senha);
    //Metodo session_start do proprio php 
    session_start();
    $_SESSION['nome'] = $clienteLogado->getNomeC();
    $_SESSION['id_cliente'] = $clienteLogado->getId();

    // Redireciona para a página principal após o login bem-sucedido
    header('Location: principal.php');
    exit();
  } else {
    echo "<p>Login falhou. Verifique suas credenciais.</p>";
  }

}


?>