<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?= $msg ?>

<h3>Subir archivos</h3>



<?php foreach ($archivos as $archivo): ?>

<div class="col-sm-3">
    <div class="card border-dark mb-3" style="width: 20rem;">
        
        <div class="card-body">
          <h5 class="card-title"><?= $archivo->nombre ?></h5>
          <p class="card-text"><?= $archivo->descripcion ?></p>
          <?php $form = ActiveForm::begin([
               "method" => "post",
               "enableClientValidation" => true,
               "options" => ["enctype" => "multipart/form-data"],
               ]);
          ?>

          <?= $form->field($model, "file[]")->fileInput(['multiple' => true]) ?>

          <?= Html::submitButton("Subir", ["class" => "btn btn-primary"]) ?>

          <?php $form->end() ?>
            
        </div>
    </div>
</div>
<?php endforeach; ?>