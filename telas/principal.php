<?php
require_once '../dao/filmeDAO.php';
require_once '../bancoDados/bancoDados.php';

$filmeDAO = new filmeDAO(getDbConnection());
$categoria = $_GET['categoria'] ?? 'todos';

if ($categoria === 'todos') {
  $filmes = $filmeDAO->getAllFilmes();
} else {
  $filmes = $filmeDAO->getFilmePorCategoria($categoria);
}



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
      <a class="navbar-brand" href="#">Rebobine Vídeo</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Sair</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Gêneros
            </a>

            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="?categoria=todos">Todos</a></li>
              <li><a class="dropdown-item" href="?categoria=Terror">Terror</a></li>
              <li><a class="dropdown-item" href="?categoria=Mistério">Mistério</a></li>
              <li><a class="dropdown-item" href="?categoria=Romance">Romance</a></li>
              <li><a class="dropdown-item" href="?categoria=Ficção Científica">Ficção Científica</a></li>
              <li><a class="dropdown-item" href="?categoria=Aventura">Aventura</a></li>
              <li><a class="dropdown-item" href="?categoria=Ação">Ação</a></li>
              <li><a class="dropdown-item" href="?categoria=Drama">Drama</a></li>
              <li><a class="dropdown-item" href="?categoria=Guerra">Guerra</a></li>
              <li><a class="dropdown-item" href="?categoria=Suspense">Suspense</a></li>
              <li><a class="dropdown-item" href="?categoria=Crime">Crime</a></li>
            </ul>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <!--Barra de pesquisa fim-->
  <h1 class="tituloClassico">Clássicos do cinema</h1>
  <!--Filmes em clássicos começo-->

  <div id="carouselExampleFade" class="carousel slide carousel-fade mx-5 my-5  borda-piscando" data-bs-ride="carousel"
    data-bs-interval="3000">
    <div class="carousel-inner">

      <div class="carousel-item active" style="height: 500px">
        <img src="../imagem/foto2.jpg" class="d-block w-100 h-100" />
      </div>

      <div class="carousel-item " style="height: 500px">
        <img src="../imagem/fato.webp" class="d-block w-100 h-100" />
      </div>

      <div class="carousel-item " style="height: 500px">
        <img src="../imagem/foto10.jpg" class="d-block w-100 h-100" />
      </div>

      <div class="carousel-item " style="height: 500px">
        <img src="../imagem/foto11.webp" class="d-block w-100 h-100" />
      </div>

      <div class="carousel-item " style="height: 500px">
        <img src="../imagem/foto12.jpg" class="d-block w-100 h-100" />
      </div>
    </div>


  </div>
  <!--Filmes em clássicos fim-->
  <h1>Filmes para aluguel</h1>

  <div class="container-fluid py-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 px-3">
      <?php foreach ($filmes as $filme): ?>
        <div class="col">
          <div class="card h-100">
            <img src="<?php echo htmlspecialchars($filme['imagem']); ?>" class="card-img-top card-img-2"
              alt="<?php echo htmlspecialchars($filme['nome']); ?>" />

            <div class="card-body">
              <h5 class="card-title"><?php echo htmlspecialchars($filme['nome']); ?></h5>
              <p class="card-text">
                <?php echo htmlspecialchars($filme['categoria']); ?> • <?php echo $filme['ano']; ?><br>
                <strong>R$ <?php echo number_format($filme['valor'], 2, ',', '.'); ?></strong>
              </p>
              <div class="button btn-wrapper d-flex justify-content-center">
                <!--vai para pagina de locação passando o id do filme selecionado através da url da página-->
                <a href="alugarFilme.php?id=<?php echo $filme['id']; ?>">
                  <p class="btnAlugar">Alugar</p>
                </a>

              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>

</html>