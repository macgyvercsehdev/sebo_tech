<!DOCTYPE html>
<html lang="pt-br">
<?php require_once("controllers/CriarLivroController.php") ?>
<?php new CriarLivroController; ?>
<?php include("views/templates/html_head.php"); ?>
<body style="background-color: rgb(236, 234, 226);">
<?php include("views/templates/menu.php"); ?>
<div class="container-fluid  mt-5" style="background-color: rgb(236, 234, 226);">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md6">
                        <label for="titulo" class="form-label">Nome do Livro</label>
                        <input type="text" name="titulo" class="form-control" required>
                    </div>
                    <div class="col-md6">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" name="autor" class="form-control">
                    </div>
                    <div class="col-md6">
                        <label for="data_lancamento" class="form-label">Data de lançamento</label>
                        <input type="date" name="data_lancamento" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md6">
                        <label for="categoria" class="form-label">Categoria</label>
                        <select name="categoria" class="form-select" aria-label="Default select example">
                            <!-- Pode ser gerado dinamicamente pela controladora se categoria for uma tabela própria -->
                            <option selected>Selecione:</option>
                            <option value="Python">Python</option>
                            <option value="PHP">PHP</option>
                            <option value="Java">Java</option>
                            <option value="C#">C#</option>
                        </select>
                    </div>
                    <div class="col-md6">
                        <label for="imagem" class="form-label">Capa do Livro</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="3000000"/>
                        <input name="imagem" type="file" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="descrição" class="form-label">Descrição</label>
                    <textarea class="form-control" name="descricao" rows="4" required></textarea>
                </div>
                <!--                <div class="mb-3 form-check">-->
                <!--                    <input type="checkbox" class="form-check-input">-->
                <!--                    <label class="form-check-label">Gostaria de receber mais informações da nossa loja por-->
                <!--                        e-mail?</label>-->
                <!--                </div>-->
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
    <?php include("views/templates/footer.php"); ?>
</div>

</body>

</html>