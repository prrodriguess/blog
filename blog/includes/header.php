<?php

use \App\Session\Login;

// Dados do usuario logado
$usuarioLogado = Login::getUserLogged();

// Detalhes do usuario logado
$usuario = $usuarioLogado ? 
                  $usuarioLogado['nome'].'<a href="logout.php class="text-light font-weight-bold ml-2">Sair</a>' :
                  'Visitante <a href="login.php" class="text-light font-weight-bold ml-2">Entrar</a>';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Blog Paulo</title>
  </head>
  <body class="text-dark" style="background-color: #bcccca;">

    <div class="container">

      <div class="jumbotron bg-light p-3">
        <h1>Bem vindo ao Blog</h1>
        <h6>Aqui você pode escrever suas postagens.</h6>
      </div>

      <hr class="border-light">

      <div class="d-flex justify-content-start">
        <?=$usuario?>
      </div>

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="register.php">Nova postagem</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Mais
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Profissional</a></li>
                  <li><a class="dropdown-item" href="#">Artigos</a></li>
                  <li><a class="dropdown-item" href="#">Notícia</a></li>
                  <li><a class="dropdown-item" href="#">Tecnologia</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Contato</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="text" name="procurar" placeholder="Procurar" value="<?=$procurar?>">
              <button class="btn btn-outline-success" type="submit">Procurar</button>
            </form>
          </div>
        </div>
      </nav>

