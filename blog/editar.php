<?php

include __DIR__.'/vendor/autoload.php';

define('TITLE','Editar postagem');
define('SUBMIT','Atualizar');

use \App\Entity\Post;
use \App\Session\Login;

// Requisita o usuário a estar logado para poder acessar
Login::requireLogin();

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
  }
  
  //consulta a postagem
  $obPost = Post::getPost($_GET['id']);
  
  // Validação da postagem
  if(!$obPost instanceof Post){
    header('location: index.php?status=edit-error');
    exit;
  }
  
  //VALIDAÇÃO DO POST
  if(isset($_POST['title'],$_POST['category'],$_POST['description'],$_POST['date'])){
  
    $obPost->title    = $_POST['title'];
    $obPost->category     = $_POST['category'];
    $obPost->description = $_POST['description'];
    $obPost->date = $_POST['date'];
    $obPost->atualizar();
  
    header('location: index.php?status=edit-success');
    exit;
  }

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/form-edit.php';
include __DIR__.'/includes/footer.php';

?>