<?php

include __DIR__.'/vendor/autoload.php';

define('TITLE','Editar postagem');
define('SUBMIT','Atualizar');

use \App\Entity\Post;
use \App\Session\Login;

// Requisita o usuário a estar logado para poder acessar
Login::requireLogin();

// Validando o id da postagem
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

//Consultando postagem
$obPost = Post::getPost($_GET['id']);

// Validação da Postagem
if(!$obPost instanceof Post){
    header('location: index.php?status=delete-error');
    exit;
}

// Validação do post
if(isset($_POST['deletar'])) {

    $obPost->deletar();
    header('location: index.php?status=delete-success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/delete-post.php';
include __DIR__.'/includes/footer.php';

?>