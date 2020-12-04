<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\models\Municipio;

class SeedController extends Controller
{
    public function actionIndex()
    {
        $faker = \Faker\Factory::create();
        $municipios= array(
            'Apozol', 
            'Apulco', 
            'Atolinga', 
            'Benito Juárez', 
            'Calera', 
            'Cañitas de Felipe Pescador', 
            'Concepción Del Oro', 
            'Cuauhtémoc', 
            'Chalchihuites', 
            'Fresnillo', 
            'Trinidad García de la Cadena', 
            'Genaro Codina', 
            'General Enrique Estrada', 
            'General Francisco R. Murguía', 
            'El Plateado de Joaquín Amaro', 
            'General Pánfilo Natera', 
            'Guadalupe', 
            'Huanusco', 
            'Jalpa', 
            'Jerez', 
            'Jiménez Del Teul', 
            'Juan Aldama', 
            'Juchipila', 
            'Loreto', 
            'Luis Moya', 
            'Mazapil', 
            'Melchor Ocampo', 
            'Mezquital Del Oro', 
            'Miguel Auza', 
            'Momax', 
            'Monte Escobedo', 
            'Morelos', 
            'Moyahua de Estrada', 
            'Nochistlán de Mejía', 
            'Noria de Ángeles', 
            'Ojocaliente', 
            'Pánuco', 
            'Pinos', 
            'Río Grande', 
            'Sain Alto', 
            'El Salvador', 
            'Sombrerete', 
            'Susticacán', 
            'Tabasco', 
            'Tepechitlán', 
            'Tepetongo', 
            'Teúl de González Ortega', 
            'Tlaltenango de Sánchez Román', 
            'Valparaíso', 
            'Vetagrande', 
            'Villa de Cos', 
            'Villa García', 
            'Villa González Ortega', 
            'Villa Hidalgo', 
            'Villanueva', 
            'Zacatecas', 
            'Trancoso', 
            'Santa María de la Paz', 
        );
        
        $municipio = new Municipio();
        var_dump(sizeof($municipios));
        for ( $i = 0; $i <= sizeof($municipios); $i++ )
        {
            $municipio->setIsNewRecord(true);
            $municipio->id = null;

            $municipio->nombre = $municipios[$i];
            $municipio->save();
        }

    }
}