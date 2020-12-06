<?php

use app\models\Municipios;
use app\models\Roles;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = 'Modificar Usuario: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?php 
            $municipios = ArrayHelper::map(Municipios::find()->all(), 'id', 'nombre');
            
        ?> 
        <?= $form->field($model, 'id_municipio')->dropDownList($municipios) ?>
    
    </div>

    <div class="form-group">
        <?php 
            $roles = ArrayHelper::map(Roles::find()->all(), 'id', 'nombre');
            
        ?> 
        <?= $form->field($model, 'id_rol')->dropDownList($roles) ?>
    
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
