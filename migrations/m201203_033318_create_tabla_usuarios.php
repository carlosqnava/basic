<?php

use yii\db\Migration;

/**
 * Class m201203_033318_create_tabla_usuarios
 */
class m201203_033318_create_tabla_usuarios extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('usuarios', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(200),
            'apellidos' => $this->string(200),
            'correo' => $this->string(200),
            'contraseña' => $this->string(200),
            'id_municipio' => $this->integer()->notNull(),
            'id_rol' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-usuarios-id_municipio',
            'usuarios',
            'id_municipio'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-usuarios-id_municipio',
            'usuarios',
            'id_municipio',
            'municipios',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-usuarios-id_rol',
            'usuarios',
            'id_rol'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-usuarios-id_rol',
            'usuarios',
            'id_rol',
            'roles',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('usuarios');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201203_033318_create_tabla_usuarios cannot be reverted.\n";

        return false;
    }
    */
}
