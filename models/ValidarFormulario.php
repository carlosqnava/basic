<?php

namespace app\models;
use Yii;
use yii\base\model;

class ValidarFormulario extends model{
    public $nombre;
    public $email;

    public function rules()
    {
        return [
            ['nombre','required', 'message' => 'Campo nombre requerido'],
            ['nombre','match', 'pattern' => "/^.{3,50}$/", 'message' => 'Mínimo 3 y máximo 50 carácteres'],
            ['nombre','match', 'pattern' => "/^.[0-9a-z]+$/i", 'message' => 'Solo se aceptan letras y números'],
            ['email','required', 'message' => 'Campo email requerido'],
            ['email','email', 'message' => 'Formato email no válido']
        ];
    }

    public function attributeLabels()
    {
        return [
            'nombre' => 'Nombre:',
            'email' => 'Email:',
        ];
    }
}