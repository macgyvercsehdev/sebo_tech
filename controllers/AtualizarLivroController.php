<?php

include_once("models/Livro.php");

/**
 * Classe responsável por atualizar livros.
 */
class AtualizarLivroController
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
     * Recebe os parametros, limpa-os e atualiza no banco.
     */
    public function invoke()
    {
        $livro = filter_input(INPUT_GET, 'livro', FILTER_SANITIZE_NUMBER_INT);
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        // Checar se existe algo antes de atualizar e redicionar.
        if ($id) {
            // Carregar os dados pré existentes no DB.
            $this->livro->carregarDados($id);
            $uploaddir = "views/static/img/"; // Pasta static do server provisório
            if(!empty($_FILES["imagem"]) && $_FILES['imagem']['size']!== 0)
            $uploadfile = $uploaddir . basename($_FILES['imagem']['name']); // Local final (diretório + nome)
            $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
            $autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);
            $str_data_lancamento = strtotime(filter_input(INPUT_POST, 'data_lancamento', FILTER_SANITIZE_STRING));
            $data_lancamento = date('Y-m-d', $str_data_lancamento);
            $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
            if(!empty($_FILES["imagem"]) && $_FILES['imagem']['size']!== 0)
            $imagem = $_FILES['imagem']['name'];
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

            $this->livro->setTitulo($titulo);
            $this->livro->setAutor($autor);
            $this->livro->setDataLancamento($data_lancamento);
            $this->livro->setCategoria($categoria);
            $this->livro->setDescricao($descricao);
            if(!empty($_FILES["imagem"]) && $_FILES['imagem']['size']!== 0) {
                move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadfile); // Move arquivo para diretório final.
                $this->livro->setImagem($imagem);
            }
            // Marcar ultima atualizacação
            $ultima_atualizacao = date('Y-m-d H:i:s');
            $this->livro->setUltimaAtualizacao($ultima_atualizacao);
            $this->livro->atualizar();
            echo "<h1>Atualizado com sucesso!</h1>";
            echo "<script>window.location = '/'</script>";
            die();
        } else {
            $this->livro->setId($livro);
            $this->mostrar($this->livro->listarUm());
        }
    }

    /**
     * @param $results
     * Pega os resultados do PDO.fetchAll() e transforma em HTML.
     */
    private
    function mostrar($results)
    {
        foreach ($results as $livro) {
            echo '<div class="row">';
            echo '<div class="col-md6">';
            echo '<input type="hidden" name="id" value="' . $livro['id'] . '"/>';
            echo '<label for="titulo" class="form-label">Nome do Livro</label>';
            echo '<input type="text" name="titulo" class="form-control" required value="' . $livro["titulo"] . '"/>';
            echo '</div>';
            echo '<div class="col-md6">';
            echo '<label for="autor" class="form-label">Autor</label>';
            echo '<input type="text" name="autor" class="form-control" value="' . $livro['autor'] . '">';
            echo '</div>';
            echo '<div class="col-md6">';
            echo '<label for="data_lancamento" class="form-label">Data de lançamento</label>';
            echo '<input type="date" name="data_lancamento" class="form-control" value="' . $livro['data_lancamento'] . '"/>';
            echo '</div>';
            echo '</div>';
            echo '<div class="row">';
            echo '<div class="col-md6">';
            echo '<label for="categoria" class="form-label">Categoria</label>';
            echo '<select name="categoria" class="form-select" aria-label="Default select example" selected="' . $livro['categoria'] . '"/>';
            echo '<!-- Pode ser gerado dinamicamente pela controladora se categoria for uma tabela própria -->';
            echo '<option selected>Selecione:</option>';
            echo '<option value="Python">Python</option>';
            echo '<option value="PHP">PHP</option>';
            echo '<option value="Java">Java</option>';
            echo '<option value="C#">C#</option>';
            echo '</select>';
            echo '</div>';
            echo '<div class="col-md6">';
            echo '<label for="imagem" class="form-label">Capa do Livro</label>';
            echo '<input type="hidden" name="MAX_FILE_SIZE" value="3000000"/>';
            echo '<input name="imagem" type="file" class="form-control" >';
            echo '</div>';
            echo '</div>';
            echo '<div class="mb-3">';
            echo '<label for="descrição" class="form-label">Descrição</label>';
            echo '<textarea class="form-control" name="descricao" rows="4" required>' . $livro['descricao'] . '</textarea>';
            echo '</div>';
        }
    }


}