<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%threads}}`.
 */
class m200210_215453_create_threads_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%threads}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer()->notNull(),
            'title' => $this->text()->notNull(),
            'body' => $this->string(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp()
        ]);

        //create index for user id
        $this->createIndex(
            'idx-thread-id_user',
            'threads',
            'id_user'
        );

        //create the foreign key
        $this->addForeignKey(
            'fk-thread-id_user',
            'threads',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%threads}}');
    }
}
