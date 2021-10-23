<?php 

//cria o banco de dados, se já tiver criado, só carrega as infos
$criar = new SQLite3("livros.db");


//vai limpar tudo que tem antes
$sql = 'DROP TABLE IF EXISTS livros';

//Vai verificar se já existe, se existir, apaga
if ($criar->exec($sql)) {
    echo "\nTabela livros apagada\n"; 
}

//cria uma tabela para armazenar as informações
$sql = "CREATE TABLE livros (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        titulo VARCHAR(200) NOT NULL,
        autor VARCHAR(200),
        descricao TEXT,
        data_lancamento datetime NULL,
        imagem VARCHAR(200),
        ultima_atualizacao datetime,
        categoria VARCHAR(200) NOT NULL
    )
";
if ($criar->exec($sql)) {
    echo "\nTabela criada\n"; 
}else {
    echo "\nErro ao criar tabela livros\n";
}

$sql = "INSERT INTO livros (id, titulo, autor, descricao, imagem, ultima_atualizacao, categoria)
VALUES (
        0,
        'Guia de sobrevivencia do profissional moderno',
        'Macgyver Cseh',
        'Os softwares da SAP estão presentes nas grandes e médias corporações que criam produtos consumidos por nós diariamente. Isso tudo foi construído ao longo de mais de 30 anos de trabalho, com o apoio de uma linguagem de programação proprietária amplamente utilizada, o ABAP',
        'imagens/abap-featured_large.png',
        datetime('now'),
        'Python'
    )
";

if ($criar->exec($sql)) {
    echo "\nlivros inseridos\n"; 
}else {
    echo "\nErro ao inserir livros\n";
}


$sql = "INSERT INTO livros (id, titulo, autor, descricao, imagem, ultima_atualizacao, categoria)
VALUES (
        1,
        'Edicao e organizacao de fotos com Adobe Lightroom - Casa do Codigo',
        'Macgyver Cseh',
        'A fotografia digital chegou e, com ela, uma série de novos estudos e técnicas para apresentarmos os mais diferenciados ti- pos de imagem. Os fotógrafos analógicos, se assim podemos chamá-los, estão cada vez mais sendo vistos como uma espécie em extinção. Todo dia aparecem novas fer- ramentas tecnológicas proporcionando soluções antes inimagináveis a alguns cliques de distância.',
        'imagens/adobe-lightroom-featured_large.png',
        datetime('now'),
        'Lightroom'
    )
";

if ($criar->exec($sql)) {
    echo "\nlivro 2 inseridos\n"; 
}else {
    echo "\nErro ao inserir livro 2\n";
}










?>