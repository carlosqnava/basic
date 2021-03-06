<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\models\Municipio;
use app\models\Roles;

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
        

        $rolSuperAdmin = new Roles();
        $rolSuperAdmin->setIsNewRecord(true);
        $rolSuperAdmin->id = 1;

        $rolSuperAdmin->nombre = 'Super Administrador';
        $rolSuperAdmin->save();

        $rolAdmin = new Roles();
        $rolAdmin->setIsNewRecord(true);
        $rolAdmin->id = 2;

        $rolAdmin->nombre = 'Administrador General';
        $rolAdmin->save();

        $rolCoordinador = new Roles();
        $rolCoordinador->setIsNewRecord(true);
        $rolCoordinador->id = 3;

        $rolCoordinador->nombre = 'Coordinador de Liga';
        $rolCoordinador->save();

        $rolComisario = new Roles();
        $rolComisario->setIsNewRecord(true);
        $rolComisario->id = 4;

        $rolComisario->nombre = 'Comisario Municipal';
        $rolComisario->save();

        $rolArbitro = new Roles();
        $rolArbitro->setIsNewRecord(true);
        $rolArbitro->id = 5;

        $rolArbitro->nombre = 'Arbitro';
        $rolArbitro->save();

        $rolDeportista = new Roles();
        $rolDeportista->setIsNewRecord(true);
        $rolDeportista->id = 6;

        $rolDeportista->nombre = 'Deportista';
        $rolDeportista->save();

        $rolEntrenador = new Roles();
        $rolEntrenador->setIsNewRecord(true);
        $rolEntrenador->id = 7;

        $rolEntrenador->nombre = 'Entrenador';
        $rolEntrenador->save();

    }
}