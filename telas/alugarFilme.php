<?php
require_once '../classes/locacao.php';
require_once '../DAO/locacaoDAO.php';
//A Session serve para manter os dados do cliente logado
session_start();

// Captura as datas do formulário (se houver)
$dataLocacao = $_POST['data_locacao'] ?? date('Y-m-d');
$dataDevolucao = $_POST['data_devolucao'] ?? '';
$qtdDias = 0;
$valorTotal = 0.0;

// Verifica se recebeu o ID do filme na URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID do filme não informado.");
}
$filmeId = $_GET['id'];

// Conexão com o banco de dados
require_once '../bancoDados/bancoDados.php';
require_once '../DAO/filmeDAO.php';
$filmeDAO = new filmeDAO(getDbConnection());
$filmeSelecionado = $filmeDAO->getFilmePorId($filmeId);

// Extrai os dados do filme retornado
$tituloFilme = $filmeSelecionado['nome'];
$anoFilme = $filmeSelecionado['ano'];
$generoFilme = $filmeSelecionado['categoria'];
$precoDia = $filmeSelecionado['valor'];
$imagem = $filmeSelecionado['imagem'];


// Calcula a diferença entre as datas, se ambas estiverem definidas
if (!empty($dataDevolucao)) {
    $inicio = new DateTime($dataLocacao);
    $fim = new DateTime($dataDevolucao);
    $intervalo = $inicio->diff($fim);
    $qtdDias = $intervalo->days;
    if ($qtdDias < 0)
        $qtdDias = 0;
    $valorTotal = $qtdDias * $precoDia;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Locação de Filme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/alugarFilme.css" />

</head>

<body>

    <!-- Placeholder do cabeçalho -->
    <div class="header-placeholder"></div>

    <div class="container container-locacao">
        <h3 class="text-center mb-4">Locação de Filme</h3>

        <!-- Card do Filme -->
        <!-- Card do Filme (layout horizontal) -->
        <div class="filme-card d-flex flex-column flex-md-row align-items-center p-3">
            <!-- Imagem -->
            <div class="filme-img me-md-3 mb-3 mb-md-0">
                <img src="<?= htmlspecialchars($imagem !== '0' ? $imagem : 'imagem/padrao.webp') ?>" alt="Capa do filme"
                    class="img-fluid rounded" style="max-height: 300px; width: auto;">
            </div>

            <!-- Informações -->
            <div class="filme-info text-center text-md-start">
                <h5 class="fw-bold text-warning"><?= htmlspecialchars($tituloFilme) ?>
                    (<?= htmlspecialchars($anoFilme) ?>)</h5>
                <p class="mb-1">Gênero: <?= htmlspecialchars($generoFilme) ?></p>
                <p class="mb-1">Preço por dia: R$ <?= number_format($precoDia, 2, ',', '.') ?></p>
            </div>
        </div>
        <!-- Formulário -->
        <form method="POST" action="">
            <div class="form-section">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="data_locacao" class="form-label">Data de Locação</label>
                        <input type="date" id="data_locacao" name="data_locacao" class="form-control"
                            value="<?= htmlspecialchars($dataLocacao) ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="data_devolucao" class="form-label">Data de Devolução</label>
                        <input type="date" id="data_devolucao" name="data_devolucao" class="form-control"
                            value="<?= htmlspecialchars($dataDevolucao) ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Quantidade de Dias</label>
                        <input type="text" class="form-control" value="<?= $qtdDias ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Valor Total</label>
                        <input type="text" class="form-control"
                            value="R$ <?= number_format($valorTotal, 2, ',', '.') ?>" readonly>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <button type="submit" name="click" value="cancelar"
                        class="btn btn-alugar px-4 py-2">Cancelar</button>
                    <button type="submit" name="click" value="calcular"
                        class="btn btn-alugar px-4 py-2">Calcular</button>
                    <button type="submit" name="click" value="confirmar" class="btn btn-alugar px-4 py-2">Confirmar
                        Locação</button>
                </div>
            </div>
        </form>
    </div>

    <?php

    // Processa o formulário
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Ação dos botões
        if (isset($_POST['click'])) {
            //Se for o botão confirmar
            if ($_POST['click'] === 'confirmar') {

                // Aqui a lógica para salvar a locação no banco de dados
                $dataLocacao = $_POST['data_locacao'];
                $dataDevolucao = $_POST['data_devolucao'];
                $cliente_id = $_SESSION['id_cliente']; // ID do cliente armazenado na sessão
    
                $locacao = new locacao(0, $filmeId, $cliente_id, $dataLocacao, $dataDevolucao);
                $locacaoDAO = new locacaoDAO(getDbConnection());

                if ($locacaoDAO->salvarLocacao($locacao)) {

                    echo "<script>
                        alert('Locação concluída com sucesso!');
                        window.location.href = 'principal.php';
                        </script>";

                } else {
                    echo "<script>alert('Locação ocorreu um erro, tente novamente!');</script>";

                }

            } elseif ($_POST['click'] === 'cancelar') {
                header("Location: principal.php");
                exit;
            }
        }


    }
    ?>

</body>

</html>