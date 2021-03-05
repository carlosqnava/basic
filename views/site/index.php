<?php

/* @var $this yii\web\View */
use yii\bootstrap;
$this->title = 'Torneos Estatales INCUFIDEZ';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Lista de Convocatorias</h1>

        <p class="lead">Revisa las convocatorias de las diferentes disciplinas</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Convocatorias Disponibles</a></p>
    </div>

    <div class="body-content">

        <div class="row">
        <?php foreach ($convocatorias as $convocatoria): ?>

                <div class="col-sm-3">
                    <div class="card border-dark mb-3" style="width: 20rem;">
                        <img src="../<?= $convocatoria->ruta ?>" class="card-img-top img-fluid img-thumbnail " style="width: 80%;"  alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $convocatoria->nombre ?></h5>
                            <p class="card-text"><?= $convocatoria->descripcion ?></p>
                            <a href="#" class="btn btn-primary">Ver detalles</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>


