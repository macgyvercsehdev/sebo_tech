<!DOCTYPE html>
<html lang="en">

<?php include ("includes/head.php"); ?>

<body>
  <?php include ("includes/menu.php"); ?>
    <div class="container-fluid" style="background-color: rgb(236, 234, 226);">
        <?php include ("includes/header.php"); ?>
        <div class="card text">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Python</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">JAVA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">C#</a>
                    </li>
                    <li>
                    <form class="d-flex">
                        <input class="form-control me-2" type="buscar" placeholder="Buscar" aria-label="Buscar">
                        <button class="btn btn-success" type="submit">Buscar</button>
                    </form>
                    </li>
                </ul>
            </div>
            <?php include ("includes/listagem.php"); ?>
        </div>
        
    </div>
    <?php include ("includes/footer.php"); ?>


</body>

</html>