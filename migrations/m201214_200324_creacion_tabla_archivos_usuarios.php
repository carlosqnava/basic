<?php

use yii\db\Migration;

/**
 * Class m201214_200324_creacion_tabla_archivos_usuarios
 */
class m201214_200324_creacion_tabla_archivos_usuarios extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('usuario_archivo', [
            'id' => $this->primaryKey(),
            'id_usuario' => $this->integer()->notNull(),
            'id_archivo' => $this->integer()->notNull(),
            'ruta' => $this->string(200),
        ]);

        $this->createIndex(
            'idx-usuarios-id_usuarios',
            'usuario_archivo',
            'id_usuario'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-usuarios-id_usuario',
            'usuario_archivo',
            'id_usuario',
            'usuarios',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-archivos-id_archivo',
            'usuario_archivo',
            'id_archivo'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-usuarios-id_archivo',
            'usuario_archivo',
            'id_archivo',
            'archivos',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('usuario_archivo');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201214_200324_creacion_tabla_archivos_usuarios cannot be reverted.\n";

        return false;
    }
    */
}
