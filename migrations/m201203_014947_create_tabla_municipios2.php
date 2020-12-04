<?php

use yii\db\Migration;

/**
 * Class m201203_012138_create_tabla_municipios
 */
class m201203_014947_create_tabla_municipios2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('municipios', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(200),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('municipios');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201203_012138_create_tabla_municipios cannot be reverted.\n";

        return false;
    }
    */
}
