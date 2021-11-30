<?php

include_once("models/Livro.php");

/**
 * Classe responsável por criar livros.
 */
class CriarLivroController
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
     * Recebe os parametros, limpa-os e cria no banco.
     */
    public function invoke()
    {
        $uploaddir = "views/static/img/"; // Pasta static do server provisório
        if(!empty($_FILES["imagem"]))
        $uploadfile = $uploaddir . basename($_FILES['imagem']['name']); // Local final (diretório + nome)
        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
        $autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);
        $str_data_lancamento = strtotime(filter_input(INPUT_POST, 'data_lancamento', FILTER_SANITIZE_STRING));
        $data_lancamento = date('Y-m-d', $str_data_lancamento);
        $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
        if(!empty($_FILES["imagem"]))
        $imagem = $_FILES['imagem']['name'];
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        $ultima_atualizacao = date('Y-m-d H:i:s');
        $this->livro->setTitulo($titulo);
        $this->livro->setAutor($autor);
        $this->livro->setDataLancamento($data_lancamento);
        $this->livro->setCategoria($categoria);
        if(!empty($_FILES["imagem"]))
        $this->livro->setImagem($imagem);
        $this->livro->setDescricao($descricao);
        $this->livro->setUltimaAtualizacao($ultima_atualizacao);
        // Checar se existe algo antes de criar e redicionar.
        if ($titulo) {
            $this->livro->criar();
            move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadfile); // Move arquivo para diretório final.
            echo "<h1>Criado com sucesso!</h1>";
            echo "<script>window.location = '/'</script>";
            die();
        }
    }
}

