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
class Usuarios extends \yii\db\ActiveRecord 
{
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
            [['nombre', 'apellidos', 'correo', 'contraseña', 'id_municipio', 'id_rol'], 'required', 'message' => 'Campo requerido'],
            ['nombre', 'match', 'pattern' => "/^.{3,50}$/", 'message' => 'Mínimo 3 y máximo 50 caracteres'],
            ['apellidos', 'match', 'pattern' => "/^.{3,80}$/", 'message' => 'Mínimo 3 y máximo 80 caracteres'],
            ['correo', 'match', 'pattern' => "/^.{5,80}$/", 'message' => 'Mínimo 5 y máximo 80 caracteres'],
            [['nombre', 'apellidos', 'correo', 'contraseña'], 'required'],
            ['correo', 'email', 'message' => 'Formato no válido'],
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
            'nombre' => 'Nombre',
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
    
}
