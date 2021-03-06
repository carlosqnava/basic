<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="https://incufidez.zacatecas.gob.mx/wp-content/uploads/2019/02/LOGO-NUEVO.png" style="display:inline; horizontal-align: top; height:150%;" > Torneos Estatales',
        //'brandLabel' => Yii::$app->name,
        'brandUrl' => ['/site/index'],
        'options' => [
            'class' => 'my-navbar navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            
            //['label' => 'Convocatorias', 'url' => ['/convocatorias/index']],
            //['label' => 'Archivos', 'url' => ['/archivos/index']],
            !Yii::$app->user->isGuest ?(
                Yii::$app->user->identity->id_rol ==  1 || Yii::$app->user->identity->id_rol == 2 || Yii::$app->user->identity->id_rol == 4?(
                    ['label' => 'Usuarios', 'url' => ['/usuarios/index']]
                ) : (
                    ['label' => 'Subir Archivos', 'url' => ['/site/upload']]
                ) 
            ) : (
                    ['label' => 'Iniciar Sesión', 'url' => ['/site/login']]
            )
            , 

            !Yii::$app->user->isGuest ?(
                Yii::$app->user->identity->id_rol ==  1 || Yii::$app->user->identity->id_rol == 4?(
                    ['label' => 'Archivos', 'url' => ['/archivos/index']]
                ) : (
                    ['label' => 'Contacto', 'url' => ['/site/contact']]
                ) 
            ) : (
                    ''
            )
            ,

            !Yii::$app->user->isGuest ?(
                Yii::$app->user->identity->id_rol ==  1 || Yii::$app->user->identity->id_rol == 2?(
                    ['label' => 'Convocatorias', 'url' => ['/convocatorias/index']]
                ) : (
                    ''
                ) 
            ) : (
                    ''
            )
            ,
            
            
            
            Yii::$app->user->isGuest ? (
                ['label' => 'Contacto', 'url' => ['/site/contact']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->nombre . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
            
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Gobierno del Estado de Zacatecas 2016 - 2021 </p>

        <p class="pull-right">Aviso de Privacidad.</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

