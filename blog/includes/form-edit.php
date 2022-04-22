<?php

// tentei este ternário para resolver o problema de editar quando seleciona a mesma categoria mas não deu certo.
$category = $obPost->category == "" ? $obPost->category : $obPost->category

?>

<main class="bg-light mt-5 p-3">

    <h2 class="mt-3"><?=TITLE?></h2>    
    <p>Data de postagem: <?=$obPost->date?></p>

    <form method="post">

        <div class="form-group mb-3 mt-5">
            <label>Título:</label>
            <input type="text" class="form-control" name="title" value="<?=$obPost->title?>">
        </div>
        
        <div class="form-group mb-3">
            <label class="form-check-label">Categoria:</label>
                <select class="form-select" name="category">
                    <option selected>- <?=$category?> -</option>
                    <option>Profissional</option>
                    <option>Artigo</option>
                    <option>Notícia</option>
                    <option>Tecnologia</option>
                </select>
        </div>

        <div class="mb-3">
            <label>Escreva seu texto aqui:</label>
            <textarea class="form-control" name="description" rows="3"><?=$obPost->description?></textarea>
        </div>

        <div class="mb-3">
            <label>Atualizar data de postagem:</label>
            <input type="date" name="date">
        </div>
        
        <button type="submit" class="btn btn-primary"><?=SUBMIT?></button>

        <a href="index.php">
            <button class="btn btn-danger">Voltar</button>
        </a>
    </form>

</main>