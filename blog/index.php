<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Post;
use \App\Session\Login;

// Requisita o usuário a estar logado para poder acessar
Login::requireLogin();

// procurar
$procurar = filter_input(INPUT_GET, 'procurar', FILTER_SANITIZE_STRING);

// condicoes sql
$requesitos = [
  strlen($procurar) ? 'title LIKE "%'.str_replace(' ','%',$procurar).'%"' : null
];


// clausula where
$where = implode('  AND  ',$requesitos);

$postagens = Post::getPosts($where);

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/carrosel.php';
include __DIR__.'/includes/posts-list.php';
include __DIR__.'/includes/footer.php';

?>