<main class="bg-light mt-5 p-3">

    <h2 class="mt-3">Deletar postagem</h2>    

    <form method="post">

        <div class="form-group">
            <p>Tem certeza que quer excluir esta postagem ? <strong><?=$obPost->title?></strong></p>
        </div>

        <div class="form-group">
            <a href="index.php">
                <button class="btn btn-primary">Cancelar</button>
            </a>

            <button type="submit" name="deletar" class="btn btn-danger">Deletar</button>
        </div>
        
    </form>

</main>