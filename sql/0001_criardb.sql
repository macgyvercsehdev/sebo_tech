# Criar um DB chamado "projectdb" somente se ele não existir.
CREATE DATABASE IF NOT EXISTS projectdb;

# Criar uma tabela chamada "livros".
CREATE TABLE livros
(
    id                 INT AUTO_INCREMENT,
    titulo             VARCHAR(200)           NOT NULL,
    autor              VARCHAR(200)           NOT NULL,
    descricao          TEXT                   NULL,
    data_lancamento    DATE                   NOT NULL,
    imagem             VARCHAR(200)           NULL,
    ultima_atualizacao DATETIME DEFAULT NOW() NOT NULL,
    categoria          VARCHAR(200)           NOT NULL,
    CONSTRAINT livros_pk
        PRIMARY KEY (id)
);

CREATE TABLE newsletter
(
    id    INT AUTO_INCREMENT,
    email VARCHAR(200) NOT NULL,
    CONSTRAINT newsletter_pk
        PRIMARY KEY (id)
);
ALTER DATABASE projectdb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE newsletter CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE livros CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
