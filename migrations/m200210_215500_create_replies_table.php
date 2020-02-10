<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%replies}}`.
 */
class m200210_215500_create_replies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%replies}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer()->notNull(),
            'id_thread' => $this->integer()->notNull(),
            'body' => $this->text(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp()
        ]);

        $this->createIndex(
            'idx-reply-id_user',
            'replies',
            'id_user'
        );

        $this->createIndex(
            'idx-reply-id_thread',
            'replies',
            'id_thread'
        );

        $this->addForeignKey(
            'fk-reply-id_user',
            'replies',
            'id_user',
            'users',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-reply-id_thread',
            'replies',
            'id_thread',
            'threads',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-reply-id_user',
            'replies'
        );

        $this->dropForeignKey(
            'fk-reply-id_thread',
            'replies'
        );

        $this->dropIndex(
            'idx-reply-id_user',
            'replies'
        );

        $this->dropIndex(
            'idx-reply-id_thread',
            'replies'
        );
        $this->dropTable('{{%replies}}');
    }
}
