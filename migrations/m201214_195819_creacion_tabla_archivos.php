<?php

use yii\db\Migration;

/**
 * Class m201214_195819_creacion_tabla_archivos
 */
class m201214_195819_creacion_tabla_archivos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('archivos', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(80)->notNull(),
            'descripcion' => $this->string(200)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('archivos');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201214_195819_creacion_tabla_archivos cannot be reverted.\n";

        return false;
    }
    */
}
