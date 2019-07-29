<?php

use yii\db\Migration;

/**
 * Handles adding disabled to table `{{%comment}}`.
 */
class m190729_110431_add_disabled_column_to_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%comment}}', 'disabled', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%comment}}', 'disabled');
    }
}
