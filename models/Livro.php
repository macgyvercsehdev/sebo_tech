<?php

class Livro
{
    private $id;
    private $titulo;
    private $autor;
    private $descricao;
    private $data_lancamento;
    private $imagem;
    private $ultima_atualizacao;
    private $categoria;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param mixed $autor
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getDataLancamento()
    {
        return $this->data_lancamento;
    }

    /**
     * @param mixed $data_lancamento
     */
    public function setDataLancamento($data_lancamento)
    {
        $this->data_lancamento = $data_lancamento;
    }

    /**
     * @return mixed
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * @param mixed $imagem
     */
    public function setImagem($imagem)
    {
        $this->imagem = 'views/static/img/' . $imagem;
    }

    /**
     * @return mixed
     */
    public function getUltimaAtualizacao()
    {
        return $this->ultima_atualizacao;
    }

    /**
     * @param mixed $ultima_atualizacao
     */
    public function setUltimaAtualizacao($ultima_atualizacao)
    {
        $this->ultima_atualizacao = $ultima_atualizacao;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    private function criarCon()
    {
        return new PDO("mysql:host=127.0.0.1;dbname=projectdb", 'root', '');
    }


    /**
     * Create do CRUD.
     * Criar uma entrada no banco.
     */
    public function criar()
    {
        // 'views/static/img/'
        $pdo = $this->criarCon();
        // Prepared Statement -> Previne injeção SQL.
        $statement = $pdo->prepare("
    INSERT INTO livros (titulo, autor, descricao, data_lancamento, imagem, ultima_atualizacao, categoria) 
    VALUES (:titulo, :autor, :descricao, :data_lancamento, :imagem, :ultima_atualizacao, :categoria)");
        $statement->bindParam(":titulo", $this->titulo, PDO::PARAM_STR);
        $statement->bindParam(":autor", $this->autor, PDO::PARAM_STR);
        $statement->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
        $statement->bindParam(":data_lancamento", $this->data_lancamento, PDO::PARAM_STR);
        $statement->bindParam(":imagem", $this->imagem, PDO::PARAM_STR);
        $statement->bindParam(":ultima_atualizacao", $this->ultima_atualizacao, PDO::PARAM_STR);
        $statement->bindParam(":categoria", $this->categoria, PDO::PARAM_STR);
        $statement->execute();
    }

    /**
     * Update do CRUD
     * Atualiza uma entrada no banco.
     */
    public function atualizar()
    {
        $pdo = $this->criarCon();
        $statement = $pdo->prepare("UPDATE livros 
        SET titulo = :titulo, 
            autor = :autor, 
            descricao = :descricao, 
            data_lancamento = :data_lancamento,
            imagem = :imagem,
            ultima_atualizacao = :ultima_atualizacao,
            categoria = :categoria
        WHERE id = :id");
        $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
        $statement->bindParam(":titulo", $this->titulo, PDO::PARAM_STR);
        $statement->bindParam(":autor", $this->autor, PDO::PARAM_STR);
        $statement->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
        $statement->bindParam(":data_lancamento", $this->data_lancamento, PDO::PARAM_STR);
        $statement->bindParam(":imagem", $this->imagem, PDO::PARAM_STR);
        $statement->bindParam(":ultima_atualizacao", $this->ultima_atualizacao, PDO::PARAM_STR);
        $statement->bindParam(":categoria", $this->categoria, PDO::PARAM_STR);
        $statement->execute();
    }

    /**
     * @param $id
     * Delete do CRUD
     * Deleta uma entrada do banco.
     */
    public function deletar($id)
    {
        $pdo = $this->criarCon();
        $statement = $pdo->prepare("DELETE FROM livros WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }

    /**
     * @return array|false
     * Retrieve do CRUD
     * Busca um elemento no banco (get)
     */
    public function listarUm()
    {
        $pdo = $this->criarCon();
        $statement = $pdo->prepare("SELECT * FROM livros WHERE id = :id");
        $statement->bindParam(":id", $this->id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll();
    }

    /**
     * @return array|false
     * Retrieve do CRUD
     * Busca todos os elementos no banco (list)
     */
    public function listarTodos()
    {
        $pdo = $this->criarCon();
        return $pdo->query("SELECT * FROM livros")->fetchAll();
    }

    /**
     * @param $campo
     * @param $valor
     * @return array|false
     * Retrieve do CRUD
     * Busca elementos cujo campo tenha o valor especificado.
     */
    public function buscarCampo($campo, $valor)
    {
        $filtro = "%" . $valor . "%";
        $pdo = $this->criarCon();
        $statement = $pdo->prepare("SELECT * FROM livros WHERE " . $campo . " LIKE :valor");
        $statement->bindParam(":valor", $filtro, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }

    /**
     * @param $id
     * Carrega os resultados no modelo.
     */
    public function carregarDados($id)
    {
        $this->id = $id;
        $valores = $this->listarUm();
        $this->titulo = $valores[0]['titulo'];
        $this->autor = $valores[0]['autor'];
        $this->descricao = $valores[0]['descricao'];
        $this->data_lancamento = $valores[0]['data_lancamento'];
        $this->imagem = $valores[0]['imagem'];
        $this->ultima_atualizacao = $valores[0]['ultima_atualizacao'];
        $this->categoria = $valores[0]['categoria'];
    }


}