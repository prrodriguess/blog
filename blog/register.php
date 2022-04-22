<?php

include __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastre uma postagem');
define('SUBMIT','Criar Postagem');

use \App\Entity\Post;
use \App\Session\Login;

// Requisita o usuário a estar logado para poder acessar
Login::requireLogin();


$obPost = new Post;


// VALIDATION
if(isset($_POST['title'], $_POST['category'], $_POST['description'])) {
    
    $obPost = new Post;
    $obPost->title          = $_POST['title'];
    $obPost->category       = $_POST['category'];
    $obPost->description    = $_POST['description'];
    $obPost->register();

    header('location: index.php?status=create-success');
    exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/form-create.php';
include __DIR__.'/includes/footer.php';

?>