<div class="container-fluid">
    <h1 class="text-center">Artículos</h1>
    <div class="row">

        <?php foreach ($articles as $article): ?>

            <div class="col-sm-4">
                <div class="card">
                    <img src="<?php echo RUTA_FRONT; ?>img/articulos/<?php echo $article->imagen; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $article->getTitle(); ?>
                        </h5>
                        <p><strong>
                                <?php echo formatearFecha($article->getCreateAt()); ?>
                            </strong></p>
                        <p class="card-text">
                            <?php echo textoCorto($article->getText()); ?>
                        </p>
                        <a href="detalle.php?id=<?php echo $article->getId(); ?>" class="btn btn-primary">Ver más</a>
                    </div>
                    image
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>