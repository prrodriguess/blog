<?php

include __DIR__.'/vendor/autoload.php';

use \App\Entity\Post;
use \App\Session\Login;

// Requisita o usuário a estar logado para poder acessar
Login::requireLogin();

$procurar = filter_input(INPUT_GET, 'procurar', FILTER_SANITIZE_STRING);

$postagens = Post::getPosts();

$condicoes = [
  strlen($procurar) ? 'titulo LIKE "%'.$procurar.'%"' : null
];

echo "<pre>";
print_r($condicoes);
echo "</pre>";


include __DIR__.'/includes/header.php';
include __DIR__.'/index.php';
include __DIR__.'/includes/footer.php';

?>