<?php

include_once("models/Livro.php");

/**
 * Classe responsável por deletar livros.
 */
class DeletarLivroController
{
    private $livro;

    /**
     * Instancia uma cópia do livro e envia-o para o banco.
     */
    public function __construct()
    {
        $this->livro = new Livro();
        $this->invoke();
    }

    /**
     * Recebe os parametros, limpa-os e deleta na banco.
     */
    public function invoke()
    {
        $id = filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_STRING);
        // Checar se existe algo antes de criar e redicionar.
        if ($id) {
            $this->livro->deletar($id);
            echo "<h1>Deletado com sucesso!</h1>";
            echo "<script>window.location = '/'</script>";
            die();
        }
    }
}

