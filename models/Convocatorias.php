<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "convocatorias".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property string|null $fecha
 */
class Convocatorias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'convocatorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['nombre'],'required', 'message' => 'Campo nombre requerido'],
            [['fecha'],'required', 'message' => 'Campo fecha requerido'],
            [['descripcion'],'required', 'message' => 'Campo descripcion requerido'],
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
            'fecha' => 'Fecha',
        ];
    }
}
