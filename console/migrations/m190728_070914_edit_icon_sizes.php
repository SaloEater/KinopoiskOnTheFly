<?php

use yii\db\Migration;

/**
 * Class m190728_070914_edit_icon_sizes
 */
class m190728_070914_edit_icon_sizes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%mraa_rating}}', 'icon', $this->string(128));
        $this->alterColumn('{{%film}}', 'logo', $this->string(128));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }
}
