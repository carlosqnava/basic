<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read Usuarios|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $correo;
    public $contraseña;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and contraseña are both required
            [['correo', 'contraseña'], 'required', 'message' => 'Este campo no puede ir vacío'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['contraseña', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'correo' => 'Correo Electrónico',
            'contraseña' => 'Contraseña',
            'rememberMe' => 'Recuérdame',            
        ];
    }
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->contraseña)) {
                $this->addError($attribute, 'Contraseña incorrecta.');
            }
            
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Usuarios::findByCorreo($this->correo);
        }
        return $this->_user;
    }
}
