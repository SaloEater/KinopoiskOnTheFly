<?php

use yii\db\Migration;

/**
 * Handles adding image_url to table `{{%user}}`.
 */
class m190730_091247_add_image_url_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'image_url', $this->string(128));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'image_url');
    }
}
