<?php

use yii\db\Migration;

/**
 * Handles adding slug to table `{{%genre}}`.
 */
class m190725_142146_add_slug_column_to_genre_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%genre}}', 'slug', $this->string(64));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%genre}}', 'slug');
    }
}
