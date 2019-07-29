<?php

use yii\db\Migration;

/**
 * Handles adding logo to table `{{%human}}`.
 */
class m190728_082007_add_logo_column_to_human_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%human}}', 'logo', $this->string(128));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%human}}', 'logo');
    }
}
