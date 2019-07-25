<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%films_awards}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%film}}`
 * - `{{%award}}`
 */
class m190725_104406_create_junction_table_for_film_and_award_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%films_awards}}', [
            'film_id' => $this->integer(),
            'award_id' => $this->integer(),
            'PRIMARY KEY(film_id, award_id)',
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-films_awards-film_id}}',
            '{{%films_awards}}',
            'film_id'
        );

        // add foreign key for table `{{%film}}`
        $this->addForeignKey(
            '{{%fk-films_awards-film_id}}',
            '{{%films_awards}}',
            'film_id',
            '{{%film}}',
            'id',
            'CASCADE'
        );

        // creates index for column `award_id`
        $this->createIndex(
            '{{%idx-films_awards-award_id}}',
            '{{%films_awards}}',
            'award_id'
        );

        // add foreign key for table `{{%award}}`
        $this->addForeignKey(
            '{{%fk-films_awards-award_id}}',
            '{{%films_awards}}',
            'award_id',
            '{{%award}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%film}}`
        $this->dropForeignKey(
            '{{%fk-films_awards-film_id}}',
            '{{%films_awards}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-films_awards-film_id}}',
            '{{%films_awards}}'
        );

        // drops foreign key for table `{{%award}}`
        $this->dropForeignKey(
            '{{%fk-films_awards-award_id}}',
            '{{%films_awards}}'
        );

        // drops index for column `award_id`
        $this->dropIndex(
            '{{%idx-films_awards-award_id}}',
            '{{%films_awards}}'
        );

        $this->dropTable('{{%films_awards}}');
    }
}
