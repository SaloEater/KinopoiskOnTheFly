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
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('{{%human}}');
    }
}
