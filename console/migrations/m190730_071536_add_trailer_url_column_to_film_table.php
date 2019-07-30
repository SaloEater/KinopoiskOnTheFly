<?php

use yii\db\Migration;

/**
 * Handles adding trailer_url to table `{{%film}}`.
 */
class m190730_071536_add_trailer_url_column_to_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%film}}', 'trailer_url', $this->string(128));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%film}}', 'trailer_url');
    }
}
