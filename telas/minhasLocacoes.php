<?php
require_once '../DAO/locacaoDAO.php';
require_once '../classes/locacao.php';
require_once '../bancoDados/bancoDados.php';
require_once '../classes/filme.php';
require_once '../DAO/filmeDAO.php';


session_start();

if (!isset($_SESSION['id_cliente'])) {
    echo "<script>alert('Sessão não iniciada ou id_cliente não definido!');
                    window.location.href = 'login.php';
            </script>";
    exit;
}

$cliente_id = $_SESSION['id_cliente'];
$locacaoDAO = new locacaoDAO(getDbConnection());
$filmeDAO = new filmeDAO(getDbConnection());
$listaL = $locacaoDAO->getMinhasLocacao($cliente_id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../css/principal.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <style>
        .card-img-top {
            height: 450px;
            object-fit: contain;
            background-color: #000;

        }

        .card-body {
            background-color: #faec6d;
            border: 3px solid #faec6d;
            display: flex;
            flex-direction: column;

        }

        .btn-wrapper {
            margin-top: auto;
            /* empurra o botão para o final */
        }
    </style>

    <title>Rebobine Vídeo</title>

</head>

<body style="background-color: #1c1c2a">
    <!--Barra de pesquisa começo -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">

            <a class="navbar-brand" href="principal.php">Rebobine Vídeo</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>



        </div>
    </nav>

    <h1 class="tituloClassico">Minhas Locações</h1>

    <div class="container mt-5">

        <table class="table table-dark table-striped text-center align-middle">
            <thead>
                <tr>
                    <th>Filme</th>
                    <th>Data Locação</th>
                    <th>Data Devolução</th>
                    <th>Valor Total</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaL as $locacao): ?>
                    <?php
                    $filme = $filmeDAO->getFilmePorId($locacao['id_filme']);
                    $dataLocacao = date('Y-m-d', strtotime($locacao['data_locacao']));
                    $hoje = date('Y-m-d');
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($filme['nome']) ?></td>
                        <td><?= date('d/m/Y', strtotime($locacao['data_locacao'])) ?></td>
                        <td><?= date('d/m/Y', strtotime($locacao['data_devolucao'])) ?></td>
                        <td>R$ <?= number_format($locacao['valor'], 2, ',', '.') ?></td>
                        <td>
                            <form method="POST" action="minhasLocacoes.php" class="d-inline">
                                <input type="hidden" name="id_locacao" value="<?= $locacao['id'] ?>">
                                <button type="submit" name="acao" value="devolver" class="btn btn-success btn-sm">
                                    <i class="bi bi-check-circle"></i> Devolver
                                </button>
                            </form>
                            <?php if ($dataLocacao == $hoje): ?>
                                <form method="POST" action="minhasLocacoes.php" class="d-inline">
                                    <input type="hidden" name="id_locacao" value="<?= $locacao['id'] ?>">
                                    <button type="submit" name="acao" value="cancelar" class="btn btn-danger btn-sm">
                                        <i class="bi bi-x-circle"></i> Cancelar
                                    </button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recupera o ID da locação e o tipo de ação
        $idLocacao = $_POST['id_locacao'] ?? null;
        $acao = $_POST['acao'] ?? null;
        $locacaoS = $locacaoDAO->getLocacaoPorId($idLocacao);

        if ($idLocacao && $acao) {
            if ($acao === 'devolver') {
                // Chame o método correspondente no DAO
                $locacaoDAO->excluiLocacao($idLocacao);
                echo "<script>alert('Locação devolvida com sucesso!'); window.location.href='minhasLocacoes.php';</script>";
            } elseif ($acao === 'cancelar') {
                $locacaoDAO->excluiLocacao($idLocacao);
                echo "<script>alert('Locação cancelada com sucesso!'); window.location.href='minhasLocacoes.php';</script>";
            }
        }
    }
    ?>
</body>

</html>