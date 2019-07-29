<?php

use yii\db\Migration;

/**
 * Handles adding description to table `{{%film}}`.
 */
class m190728_072748_add_description_column_to_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%film}}', 'description', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%film}}', 'description');
    }
}
