<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Archivos */

$this->title = 'Registro de Archivos';
$this->params['breadcrumbs'][] = ['label' => 'Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="archivos-create">

    <h1>Registro de Archivos</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
