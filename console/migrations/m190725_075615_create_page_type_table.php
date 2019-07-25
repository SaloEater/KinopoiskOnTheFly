<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page_type}}`.
 */
class m190725_075615_create_page_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%page_type}}');
    }
}
