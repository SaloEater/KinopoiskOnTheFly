<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_rating}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m190725_082910_create_user_rating_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_rating}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'rating' => $this->decimal(4,2),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_rating-user_id}}',
            '{{%user_rating}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_rating-user_id}}',
            '{{%user_rating}}',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_rating-user_id}}',
            '{{%user_rating}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_rating-user_id}}',
            '{{%user_rating}}'
        );

        $this->dropTable('{{%user_rating}}');
    }
}
