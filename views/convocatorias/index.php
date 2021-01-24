<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Convocatorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="convocatorias-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registro de Convocatorias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'descripcion',
            'fecha',
            'fecha_termino',
            'ruta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
