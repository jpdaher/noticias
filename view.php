<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Notícias - News API</title>
</head>
<body>
    <div class="container-fluid bg-light">

        <!-- Cabeçalho do site -->
        <div class="row p-3 header bg-dark">
            <div class="col-md-6">
                <a class="text-light" href="index.php"><h1>Notícias - News API</h1></a>
                <h5 class="text-secondary"><em>Notícias da BBC (em inglês) ordenadas por popularidade</em></h5>
                <h5 class="text-secondary">Aplicação feita por: <a class="text-secondary" href="github.com/jpdaher">João Pedro Bernardo</a></h5>
                <h5 class="text-warning">AVISO: Devido a um limite da API, só é possível exibir até a quinta página (resultado Nº 500)</h5>
            </div>
            <div class="col-md-6 d-flex  flex-row-reverse align-items-center">
                <form class="d-flex" action="index.php" method="GET">
                    <input class="form-control me-2" type="search" name="search" placeholder="Ex.: Songs">
                    <button class="btn btn-light" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>

        <!-- Contagem de resultados e página atual -->
        <div class="row p-2">
            <div class="col-sm-6">
                <h4>Exibindo <?=count($articles)?> de <?=$response->totalResults?> notícias</h4>
            </div>
            <div class="col-sm-6 d-flex flex-row-reverse">
                <h4>Página <?=isset($_GET['page'])? $_GET['page'] : 1?> de <?=max($pageCount, 1)?></h4>
            </div>
        </div>

        <!-- Geração de cards -->
        <div class="row">
            <?php foreach ($articles as $article) : ?>
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img class="card-img-top" src="<?=$article->urlToImage?>" alt="article image">
                        <div class="card-body">
                            <h4 class="card-title"><?=$article->title?></h4>
                            <p class="card-text"><?=$article->description?></p>
                            <a class="btn btn-primary" href="<?=$article->url?>" target="_blank">Ver matéria</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Botões de troca de página -->
        <div class="row d-flex justify-content-center">
            <?php for ($i = 1; $i <= $pageCount; $i++) : ?>
                <a href="<?=$pageChangeParams . $i?>" class="btn btn-dark me-1 mb-3" style="width: 40px"><?= $i ?></a>
            <?php endfor; ?>
        </div>
    </div>
</body>
</html>