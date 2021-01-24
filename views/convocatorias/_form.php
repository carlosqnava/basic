<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Convocatorias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="convocatorias-form">

    

    <?php $form = ActiveForm::begin([
        "method" => "post",
        "enableClientValidation" => true,
        "options" => ["enctype" => "multipart/form-data"],
        ]);
    ?>
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'es',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'fecha_termino')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'es',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'file[]')->fileInput() ?>

    

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
