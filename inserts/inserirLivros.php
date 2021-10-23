<?php 

$titulo = $_POST['titulo'];
$autor =  $_POST['autor'];
$data_lancamento =  $_POST['data_lancamento'];
$categoria =  $_POST['categoria'];
$imagem =  $_POST['imagem'];
$descricao =  $_POST['descricao'];


$criar = new SQLite3("../livros.db");

$sql = "INSERT INTO livros (titulo, autor, descricao, data_lancamento, imagem, ultima_atualizacao, categoria)
VALUES (
        '$titulo',
        '$autor',
        '$descricao',
        '$data_lancamento',
        'imagens/$imagem',
        datetime('now'),
        '$categoria'
    )
";

if ($criar->exec($sql)) {
    header("Location: ../index.php"); 
}else {
    echo "\nErro ao inserir livros\n";
}






?>