<?php

use yii\db\Migration;

/**
 * Class m190725_150220_alter_genre_table_edit_name_column
 */
class m190725_150220_alter_genre_table_edit_name_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('genre', 'name', $this->string(64)->unique());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('genre', 'name', $this->string(64));

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190725_150220_alter_genre_table_edit_name_column cannot be reverted.\n";

        return false;
    }
    */
}
