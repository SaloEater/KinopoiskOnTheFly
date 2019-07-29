<?php

use yii\db\Migration;

/**
 * Handles adding tagline to table `{{%film}}`.
 */
class m190728_081216_add_tagline_column_to_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%film}}', 'tagline', $this->string(128));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%film}}', 'tagline');
    }
}
