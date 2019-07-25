<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%human}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%role}}`
 */
class m190725_080443_create_human_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%human}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
            'role_id' => $this->integer(),
            'birth_day' => $this->timestamp(),
            'birth_place' => $this->string(64),
        ]);

        // creates index for column `role_id`
        $this->createIndex(
            '{{%idx-human-role_id}}',
            '{{%human}}',
            'role_id'
        );

        // add foreign key for table `{{%role}}`
        $this->addForeignKey(
            '{{%fk-human-role_id}}',
            '{{%human}}',
            'role_id',
            '{{%role}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%role}}`
        $this->dropForeignKey(
            '{{%fk-human-role_id}}',
            '{{%human}}'
        );

        // drops index for column `role_id`
        $this->dropIndex(
            '{{%idx-human-role_id}}',
            '{{%human}}'
        );

        $this->dropTable('{{%human}}');
    }
}
