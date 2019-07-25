<?php

use yii\db\Migration;

/**
 * Handles adding slug to table `{{%film}}`.
 */
class m190725_103255_add_slug_column_to_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%film}}', 'slug', $this->string(64));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%film}}', 'slug');
    }
}
