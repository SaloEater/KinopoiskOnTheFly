<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%comment}}`
 * - `{{%page_type}}`
 * - `{{%user}}`
 */
class m190725_075900_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'content' => $this->text(),
            'parent_id' => $this->integer()->defaultValue(null),
            'table_id' => $this->integer(),
            'page_id' => $this->integer(),
            'user_id' => $this->integer(),
        ]);

        // creates index for column `parent_id`
        $this->createIndex(
            '{{%idx-comment-parent_id}}',
            '{{%comment}}',
            'parent_id'
        );

        // add foreign key for table `{{%comment}}`
        $this->addForeignKey(
            '{{%fk-comment-parent_id}}',
            '{{%comment}}',
            'parent_id',
            '{{%comment}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-comment-user_id}}',
            '{{%comment}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-comment-user_id}}',
            '{{%comment}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%comment}}`
        $this->dropForeignKey(
            '{{%fk-comment-parent_id}}',
            '{{%comment}}'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            '{{%idx-comment-parent_id}}',
            '{{%comment}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-comment-user_id}}',
            '{{%comment}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-comment-user_id}}',
            '{{%comment}}'
        );

        $this->dropTable('{{%comment}}');
    }
}
