<!DOCTYPE html>
<html lang="en">

<?php include ("includes/head.php"); ?>

<body style="background-color: rgb(236, 234, 226);">
    <?php include ("includes/menu.php"); ?>
    <div class="container-fluid  mt-5" style="background-color: rgb(236, 234, 226);">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Nome do Livro</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="col">
                            <label for="exampleInputPassword1" class="form-label">Autor</label>
                            <input type="text"class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="col">
                            <label for="exampleInputPassword1" class="form-label">Data de lançamento</label>
                            <input type="date"class="form-control" id="exampleInputPassword1">
                        </div>
                    </div>
                    <div class="row">
                    <div class="col">
                            <label for="exampleInputPassword1" class="form-label">Tipo de Livro</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Selecione:</option>
                                <option value="1">Python</option>
                                <option value="2">PHP</option>
                                <option value="3">JAVA</option>
                                <option value="3">C#</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="capa_livro" class="form-label">Capa do Livro</label>
                            <input type="file" class="form-control" id="exampleInputPassword1">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Gostaria de receber mais informações da nossa loja por e-mail?</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
        <?php include ("includes/footer.php"); ?>

    </div>

</body>

</html>