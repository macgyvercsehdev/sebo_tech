<?php

$criar = new SQLite3("livros.db");
$sql = "SELECT * FROM livros";
$livros = $criar->query($sql);

?>

<div class="card-body">
              <div class="row">
              <?php while ($livro = $livros->fetchArray()) : ?>
                <div class="col-md-4">
                    <div class="card mb-3" style="max-width: 100%;">
                    <div class="row g-0">
                      <div class="col-md-4" >
                        <img src="<?= $livro["imagem"] ?>" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title"><?= $livro["titulo"] ?></h5>
                          <p class="card-text"><?= substr($livro["descricao"], 0, 200) ?> ...</p>
                          <p class="card-text"><small class="text-muted">Livro criado em: <?= $livro["ultima_atualizacao"] ?></small></p>
                          <p class="card-text"><small class="text-muted">Data de lançamento do livro: <?= $livro["data_lancamento"] ?></small></p>
                          <a href="#" class="card-link"><?= $livro["categoria"] ?></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile ?>
              </div>
            </div>