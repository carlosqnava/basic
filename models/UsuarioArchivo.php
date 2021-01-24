<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_archivo".
 *
 * @property int $id
 * @property int $id_usuario
 * @property int $id_archivo
 * @property string|null $ruta
 *
 * @property Archivos $archivo
 * @property Usuarios $usuario
 */
class UsuarioArchivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario_archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_archivo'], 'required'],
            [['id_usuario', 'id_archivo'], 'integer'],
            [['ruta'], 'string', 'max' => 200],
            [['id_archivo'], 'exist', 'skipOnError' => true, 'targetClass' => Archivos::className(), 'targetAttribute' => ['id_archivo' => 'id']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_usuario' => 'Id Usuario',
            'id_archivo' => 'Id Archivo',
            'ruta' => 'Ruta',
        ];
    }

    /**
     * Gets query for [[Archivo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArchivo()
    {
        return $this->hasOne(Archivos::className(), ['id' => 'id_archivo']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'id_usuario']);
    }
}
