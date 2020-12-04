<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Alumnos extends ActiveRecord{
    
    public static function getDb()
    {
        return Yii::$app->db; //Aqui accedo a la configuracion que establecio en db.php
    }
    
    public static function tableName()
    {
        return 'alumnos';
    }
    
}