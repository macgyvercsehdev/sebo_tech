<!-- Footer -->
<?php
require_once("controllers/CriarNewsletterController.php")
?>
<footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-facebook-f"></i
                ></a>

            <!-- Twitter -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-twitter"></i
                ></a>

            <!-- Google -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-google"></i
                ></a>

            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-instagram"></i
                ></a>

            <!-- Linkedin -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-linkedin-in"></i
                ></a>

            <!-- Github -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-github"></i
                ></a>
        </section>
        <!-- Section: Social media -->

        <!-- Section: Form -->
        <section class="">
            <form action="" method="POST">
                <!--Grid row-->
                <div class="row d-flex justify-content-center">
                    <!--Grid column-->
                    <div class="col-auto">
                        <p class="pt-2">
                            <strong>Inscreva-se para nossa newsletter</strong>
                        </p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-5 col-12">
                        <!-- Email input -->
                        <div class="form-outline form-white mb-4">
                            <input type="email" id="email" name="email" class="form-control"/>
                            <label class="form-label" for="email">Endereço de e-mail</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-auto">
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-outline-light mb-4">
                            Inscreva-se
                        </button>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </form>
        </section>
        <!-- Section: Form -->
        <?php new CriarNewsletterController ?>
        <!-- Section: Text -->
        <section class="mb-4">
            <p>
                Todos os itens listados são meramente ilustrativos. Este site não comercializa ou distribuí o material
                presente.
            </p>
            <p>Para propósitos educativos. Direitos autorais pertencem aos autores dos itens.</p>
        </section>
        <!-- Section: Text -->


    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © <?php echo date("Y"); ?> Copyright:
        <a class="text-white" href="/">SeboTech</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->