<?php

use app\models\Municipios;
use app\models\Roles;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contraseña')->passwordInput(['maxlength' => true]) ?>

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
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
