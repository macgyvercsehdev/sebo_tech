<?php

include_once("models/Livro.php");

/**
 * Classe que lida com LIST e RETRIEVE dos livros.
 */
class ListaLivroController
{
    private $livro;

    /**
     *  Instancia o modelo e executa o código.
     */
    public function __construct()
    {
        $this->livro = new Livro();
        $this->invoke();
    }

    /**
     * Função para ler parametros e decidir o que será exibido.
     */
    public function invoke()
    {
        # Verificar se URL contém parametros para titulo e categoria.
        # filter_input() retorna nulo caso eles não exista. Se ambos forem nulos, então retornará todos.
        $titulo = filter_input(INPUT_GET, 'titulo', FILTER_SANITIZE_STRING);
        $categoria = filter_input(INPUT_GET, 'categoria', FILTER_SANITIZE_STRING);
        if ($titulo) {
            $this->mostrar($this->livro->buscarCampo("titulo", $titulo));
        } elseif ($categoria) {
            $this->mostrar($this->livro->buscarCampo("categoria", $categoria));
        } else {
            $this->mostrar($this->livro->listarTodos());
        }

    }

    /**
     * @param $results
     * Pega os resultados do PDO.fetchAll() e transforma em HTML.
     */
    private function mostrar($results)
    {
        foreach ($results as $livro) {
            echo '<div class="col-md-4">';
            echo '<div class="card mb-3" style="max-width: 100%;">';
            echo '<div class="row g-0">';
            echo '<div class="col-md-4">';
            echo '<img width=300 heigth=400 src="' . $livro['imagem'] . '" class="img-fluid rounded-start" alt="...">';
            echo '</div>';
            echo '<div class="col-md-8">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $livro["titulo"] . '</h5>';
            echo '<p class="card-text">' . $livro["descricao"] . '</p>';
            echo '<p class="card-text"><small class="text-muted">Livro criado em: ' . $livro["ultima_atualizacao"] . '</small></p>';
            echo '<p class="card-text"><small class="text-muted">Data de lançamento do livro: ' . $livro["data_lancamento"] . '</small></p>';
            echo '<a href="#" class="card-link">' . $livro["categoria"] . '</a>';
            echo '<form method="get" action="/atualizar_livro.php">';
            echo '<input type="hidden" value="' . $livro['id'] . '" name="livro">';
            echo '<button type="submit" class="btn btn-primary">Editar</button>';
            echo '</form>';
            echo '<form method="post">';
            echo '<input type="hidden" value="' . $livro['id'] . '" name="delete">';
            echo '<button type="submit" class="btn btn-danger">Deletar</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

    }

}

