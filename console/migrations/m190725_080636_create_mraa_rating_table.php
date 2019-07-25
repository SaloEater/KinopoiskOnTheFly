<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mraa_rating}}`.
 */
class m190725_080636_create_mraa_rating_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mraa_rating}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
            'icon' => $this->string(64),
            'tooltip' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mraa_rating}}');
    }
}
