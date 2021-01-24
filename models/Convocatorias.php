<?php

namespace app\models;

use yii\web\UploadedFile;

use Yii;
use yii\helpers\Url;

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
    public $file;
    

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
            [['fecha_termino'], 'safe'],
            [['nombre'],'required', 'message' => 'Campo nombre requerido'],
            [['fecha'],'required', 'message' => 'Campo fecha requerido'],
            [['fecha_termino'],'required', 'message' => 'Campo fecha requerido'],
            [['descripcion'],'required', 'message' => 'Campo descripcion requerido'],
            ['nombre', 'match', 'pattern' => "/^.{3,50}$/", 'message' => 'Mínimo 3 caracteres y máximo 50 caracteres'],
            ['descripcion', 'match', 'pattern' => "/^.{3,70}$/", 'message' => 'Mínimo 3 caracteres y máximo 70 caracteres'],
            
            [['file'], 'file', 
            'skipOnEmpty' => true,
            'tooBig' => 'El tamaño máximo permitido es 1MB', //Error
            'minSize' => 1, //10 Bytes
            'tooSmall' => 'El tamaño mínimo permitido son 1 BYTES', //Error
            'extensions' => 'jpeg, png, jpg',
            'wrongExtension' => 'El archivo {file} no contiene una extensión permitida {extensions}', //Error
            'maxFiles' => 1,
            'tooMany' => 'El máximo de archivos permitidos son {limit}', //Error
       ],
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
            'fecha_termino' => 'Fecha Finalización',
            'file' => 'Seleccionar Imagen:',
        ];
    }

    
}
