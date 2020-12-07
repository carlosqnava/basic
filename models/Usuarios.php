<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $apellidos
 * @property string|null $correo
 * @property string|null $contraseña
 * @property int $id_municipio
 * @property int $id_rol
 *
 * @property Municipios $municipio
 * @property Roles $rol
 */
class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface 
{
    public $authKey;
    public $accessToken;
    public $activate;
    public $verification_code;

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'],'required', 'message' => 'Nombre requerido'],
            [['apellidos'],'required', 'message' => 'Apellidos requerido'],
            [['contraseña'],'required', 'message' => 'Contraseña requerida'],
            [['correo'],'required', 'message' => 'Correo requerido'],
            ['nombre', 'match', 'pattern' => "/^.{3,50}$/", 'message' => 'Mínimo 3 caracteres y máximo 50 caracteres'],
            ['apellidos', 'match', 'pattern' => "/^.{3,80}$/", 'message' => 'Mínimo 3 caracteres y máximo 80 caracteres'],
            ['nombre', 'match', 'pattern' =>  "/^[a-z,A-Z,áéíóú,\s]+$/i", 'message' => 'Solo se aceptan letras'],
            ['apellidos', 'match', 'pattern' =>  "/^[a-z,A-Z,áéíóú,\s]+$/i", 'message' => 'Solo se aceptan letras'],
            ['contraseña', 'match', 'pattern' => "/^.{3,15}$/", 'message' => 'Mínimo 3 caracteres y máximo 15 caracteres'],
            ['correo', 'match', 'pattern' => "/^.{5,80}$/", 'message' => 'Mínimo 5 y máximo 80 caracteres'],
            ['correo', 'email', 'message' => 'Formato no válido'],
            ['correo', 'unique', 'message' => 'El correo electrónico ingresado ya está siendo utilizado por otro usuario'],
            [['id_municipio'], 'exist', 'skipOnError' => true, 'targetClass' => Municipios::className(), 'targetAttribute' => ['id_municipio' => 'id']],
            [['id_rol'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['id_rol' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre(s)',
            'apellidos' => 'Apellidos',
            'correo' => 'Correo',
            'contraseña' => 'Contraseña',
            'id_municipio' => 'Municipio',
            'id_rol' => 'Rol',
        ];
    }

    /**
     * Gets query for [[Municipio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipio()
    {
        return $this->hasOne(Municipios::className(), ['id' => 'id_municipio']);
    }

    /**
     * Gets query for [[Rol]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRol()
    {
        return $this->hasOne(Roles::className(), ['id' => 'id_rol']);
    }

    public static function findByCorreo($correo)
    {
        $users = Usuarios::find()
                ->where("correo=:correo", [":correo" => $correo])
                ->all();
        
        foreach ($users as $user) {
            if (strcasecmp($user->correo, $correo) === 0) {
                return new static($user);
            }
        }

        return null;
    }


    public function validatePassword($contraseña)
    {
        /* Valida el password */
        if (crypt($contraseña, $this->contraseña) == $this->contraseña)
        {
        return $contraseña === $contraseña;
        }
    }
}
