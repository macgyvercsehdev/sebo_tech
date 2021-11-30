<!DOCTYPE html>
<html lang="en">
<?php require_once("controllers/AtualizarLivroController.php") ?>
<?php include("views/templates/html_head.php"); ?>
<body style="background-color: rgb(236, 234, 226);">
<?php include("views/templates/menu.php"); ?>
<div class="container-fluid  mt-5" style="background-color: rgb(236, 234, 226);">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <?php new AtualizarLivroController ?>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>
    <?php include("views/templates/footer.php"); ?>
</div>

</body>

</html>