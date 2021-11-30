<!DOCTYPE html>
<html lang="en">
<?php include("views/templates/html_head.php"); ?>
<body>
<?php include("views/templates/menu.php"); ?>
<div class="container-fluid" style="background-color: rgb(236, 234, 226);">
    <?php include("views/templates/banner.php"); ?>
    <div class="card" style="max-width: 800px; margin:0 auto;">
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
    <?php include("views/templates/footer.php"); ?>
</div>

</body>

</html>