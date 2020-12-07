<?php

namespace tests\unit\models;

use app\models\LoginForm;

class LoginFormTest extends \Codeception\Test\Unit
{
    private $model;

    protected function _after()
    {
        \Yii::$app->user->logout();
    }

    public function testLoginVacio()
    {
        $this->model = new LoginForm([
            'correo' => '',
            'contraseña' => '',

        ]);

        expect_not($this->model->login());
        expect_that(\Yii::$app->user->isGuest);
    }

    public function testLoginContrasenaMal()
    {
        $this->model = new LoginForm([
            'correo' => 'aaa@gmail.com',
            'contraseña' => 'aaaee',
        ]);

        expect_not($this->model->login());
        expect_that(\Yii::$app->user->isGuest);
        // expect($this->model->errors)->hasKey('password');
    }

    public function testLoginCorrecto()
    {
        $this->model = new LoginForm([
            'correo' => 'aaa@gmail.com',
            'contraseña' => 'aaa',
        ]);

        expect_that($this->model->login());
        expect_not(\Yii::$app->user->isGuest);
    }

}
