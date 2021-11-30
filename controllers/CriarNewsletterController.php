<?php

include_once("models/Newsletter.php");

/**
 * Classe responsável por salvar newsletters.
 */
class CriarNewsletterController
{
    private $newsletter;

    /**
     * Instancia uma cópia do newsletter e envia-o para o banco.
     */
    public function __construct()
    {
        $this->newsletter = new Newsletter();
        $this->invoke();
    }

    /**
     * Recebe os parametros, limpa-os e cria no banco.
     */
    public function invoke()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        if ($email) {
            // Checar se existe algo antes de criar e redicionar.
            $this->newsletter->setEmail($email);
            $this->newsletter->criar();
            echo "<h1>Cadastrado com sucesso!</h1>";
            echo "<script>window.location = '/'</script>";
            die();
        }
    }
}

