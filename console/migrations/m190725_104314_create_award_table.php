<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%award}}`.
 */
class m190725_104314_create_award_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%award}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
            'icon' => $this->string(64),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%award}}');
    }
}
