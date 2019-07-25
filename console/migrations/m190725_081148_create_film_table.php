<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%film}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%human}}`
 */
class m190725_081148_create_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%film}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64),
            'logo' => $this->string(64),
            'producer_id' => $this->integer(),
            'rating' => $this->decimal(4,2),
            'country' => $this->string(64),
            'publish_year' => $this->integer(4),
            'duration' => $this->time(),
            'user_rating' => $this->decimal(4,2),
            'mraa_rating' => $this->integer()
        ]);

        // creates index for column `producer_id`
        $this->createIndex(
            '{{%idx-film-producer_id}}',
            '{{%film}}',
            'producer_id'
        );

        // add foreign key for table `{{%human}}`
        $this->addForeignKey(
            '{{%fk-film-producer_id}}',
            '{{%film}}',
            'producer_id',
            '{{%human}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%human}}`
        $this->dropForeignKey(
            '{{%fk-film-producer_id}}',
            '{{%film}}'
        );

        // drops index for column `producer_id`
        $this->dropIndex(
            '{{%idx-film-producer_id}}',
            '{{%film}}'
        );

        $this->dropTable('{{%film}}');
    }
}
