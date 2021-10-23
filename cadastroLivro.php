<!DOCTYPE html>
<html lang="en">

<?php include ("includes/head.php"); ?>

<body style="background-color: rgb(236, 234, 226);">
    <?php include ("includes/menu.php"); ?>
    <div class="container-fluid  mt-5" style="background-color: rgb(236, 234, 226);">
        <div class="card">
            <div class="card-body">
                <form action="inserts/inserirLivros.php" method="POST">
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Nome do Livro</label>
                            <input type="text" name="titulo" class="form-control" required>
                        </div>
                        <div class="col">
                            <label for="exampleInputPassword1" class="form-label">Autor</label>
                            <input type="text"  name="autor" class="form-control">
                        </div>
                        <div class="col">
                            <label for="exampleInputPassword1" class="form-label">Data de lançamento</label>
                            <input type="date"  name="data_lancamento" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                    <div class="col">
                            <label for="exampleInputPassword1" class="form-label">Categoria</label>
                            <select name="categoria" class="form-select" aria-label="Default select example">
                                <option selected>Selecione:</option>
                                <option value="Python">Python</option>
                                <option value="PHP">PHP</option>
                                <option value="JAVA">JAVA</option>
                                <option value="C#">C#</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="capa_livro" class="form-label">Capa do Livro</label>
                            <input name="imagem" type="file" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                        <textarea class="form-control" name="descricao" rows="4" required></textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">Gostaria de receber mais informações da nossa loja por e-mail?</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
        <?php include ("includes/footer.php"); ?>

    </div>

</body>

</html>