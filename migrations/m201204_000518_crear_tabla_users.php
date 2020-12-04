<?php

use yii\db\Migration;

/**
 * Class m201204_000518_crear_tabla_users
 */
class m201204_000518_crear_tabla_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string(50)->notNull(),
            'email' => $this->string(80)->notNull(),
            'password' => $this->string(250)->notNull(),
            'authKey' => $this->string(250)->notNull(),
            'accessToken' => $this->string(250)->notNull(),
            'activate' => $this->integer(1)->notNull()->defaultValue('0'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201204_000518_crear_tabla_users cannot be reverted.\n";

        return false;
    }
    */
}
