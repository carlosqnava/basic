<?php

use yii\db\Migration;

/**
 * Class m201203_033310_create_tabla_roles
 */
class m201203_033310_create_tabla_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('roles', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(200),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('roles');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201203_033310_create_tabla_roles cannot be reverted.\n";

        return false;
    }
    */
}
