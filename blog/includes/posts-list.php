<?php

    $notification = '';
        if(isset($_GET['status'])){
            switch ($_GET['status']){

                case 'create-success':
                    $notification = '<div class="alert alert-success">Postagem criada com sucesso !</div>';
                    break;

                case 'edit-success':
                    $notification = '<div class="alert alert-success">Postagem atualizada com sucesso !</div>';
                    break;

                case 'edit-error':
                    $notification = '<div class="alert alert-danger">Postagem não foi atualizada.</div>';
                    break;

                case 'delete-success':
                    $notification = '<div class="alert alert-success">Postagem apagada com sucesso !</div>';
                    break;

                case 'delete-error':
                    $notification = '<div class="alert alert-danger">Postagem não foi deletada.</div>';
                    break;

            }
        }

    $resultados = '';
    foreach($postagens as $post){
    $resultados .= '<div class="card mb-2">
                        <h5 class="card-header"></h5>
                        <div class="card-body">
                            <div class="row">
                                <h5 class="card-title col-10">'.$post->title.'</h5>
                                <p class="col-2">Postagem: '.date('d/m/Y', strtotime ($post->date)).'</p>
                            </div>

                            <p>Categoria: '.($post->category).'</p>

                            <p class="card-text">Descrição: '.$post->description.'</p>

                            <a href="editar.php?id='.$post->id.'">
                                <button type="button" class="btn btn-primary">Editar</button>
                            </a>
                            <a href="deletar.php?id='.$post->id.'">
                                <button type="button" class="btn btn-danger">Excluir</button>
                            </a>
                        </div>
                    </div>';
    }

    $resultados = strlen($resultados) ? $resultados : '<div class="text-center">
                                                            <h5>Nenhuma postagem recente.</h5>
                                                       </div>'
?>


<main>

<?=$notification?>

  <section>
        <body>
            <div class="row">
                <h3 class="text-dark col-8 mt-5 mb-3">Postagens recentes</h3>
                <h3 class="text-dark col-4 mt-5 mb-3">Avaliações</h3>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="">
                        <?=$resultados?>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card mb-2 p-1 text-center" style="width: 22rem; height: 16rem;">
                        <div class="text-center">
                            <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" style="border-radius: 50%; width: 150px; height: 150px; object-fit: cover;" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Luiza Almeida</h5>
                            <p class="card-text">Adoro tecnologia e por isso sempre estou escrevendo postagens sobre o assunto.</p>
                        </div>
                    </div>

                    <div class="card mb-2 p-1 text-center" style="width: 22rem; height: 16rem;">
                        <div class="text-center">
                            <img src="https://images.unsplash.com/photo-1488161628813-04466f872be2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80" style="border-radius: 50%; width: 150px; height: 150px; object-fit: cover;" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Jonas Augusto</h5>
                            <p class="card-text">Estou por dentro de tudo que acontece a minha volta e gosto de publicar notícias.</p>
                        </div>
                    </div>
                </div>

            </div>
        </body>
  </section>


</main>