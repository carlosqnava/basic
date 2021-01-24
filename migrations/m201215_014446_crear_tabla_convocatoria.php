<?php

use yii\db\Migration;

/**
 * Class m201215_014446_crear_tabla_convocatoria
 */
class m201215_014446_crear_tabla_convocatoria extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('convocatorias', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(200),
            'descripcion' => $this->string(300),
            'fecha' => $this->dateTime(),
            'fecha_termino' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('convocatorias');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201215_014446_crear_tabla_convocatoria cannot be reverted.\n";

        return false;
    }
    */
}
