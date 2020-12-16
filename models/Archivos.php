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
            [['nombre'],'required', 'message' => 'Campo nombre requerido'],
            [['descripcion'],'required', 'message' => 'Campo fecha requerido'],
            ['nombre', 'match', 'pattern' => "/^.{3,50}$/", 'message' => 'Mínimo 3 caracteres y máximo 50 caracteres'],
            ['descripcion', 'match', 'pattern' => "/^.{3,70}$/", 'message' => 'Mínimo 3 caracteres y máximo 70 caracteres'],
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
            'descripcion' => 'Descripción',
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
