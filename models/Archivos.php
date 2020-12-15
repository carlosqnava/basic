<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "archivos".
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 *
 * @property UsuarioArchivo[] $usuarioArchivos
 */
class Archivos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'archivos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion'], 'required'],
            [['nombre'], 'string', 'max' => 80],
            [['descripcion'], 'string', 'max' => 200],
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
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[UsuarioArchivos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioArchivos()
    {
        return $this->hasMany(UsuarioArchivo::className(), ['id_archivo' => 'id']);
    }
}
