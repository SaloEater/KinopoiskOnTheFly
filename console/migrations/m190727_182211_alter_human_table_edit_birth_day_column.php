<?php

use yii\db\Migration;

/**
 * Class m190727_182211_alter_human_table_edit_birth_day_column
 */
class m190727_182211_alter_human_table_edit_birth_day_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('human', 'birth_day', $this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190727_182211_alter_human_table_edit_birth_day_column cannot be reverted.\n";

        return false;
    }
    */
}
