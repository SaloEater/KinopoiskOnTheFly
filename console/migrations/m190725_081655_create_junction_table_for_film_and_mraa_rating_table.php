<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%films_mraa_ratings}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%film}}`
 * - `{{%mraa_rating}}`
 */
class m190725_081655_create_junction_table_for_film_and_mraa_rating_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%films_mraa_ratings}}', [
            'film_id' => $this->integer(),
            'mraa_rating_id' => $this->integer(),
            'PRIMARY KEY(film_id, mraa_rating_id)',
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-films_mraa_ratings-film_id}}',
            '{{%films_mraa_ratings}}',
            'film_id'
        );

        // add foreign key for table `{{%film}}`
        $this->addForeignKey(
            '{{%fk-films_mraa_ratings-film_id}}',
            '{{%films_mraa_ratings}}',
            'film_id',
            '{{%film}}',
            'id',
            'CASCADE'
        );

        // creates index for column `mraa_rating_id`
        $this->createIndex(
            '{{%idx-films_mraa_ratings-mraa_rating_id}}',
            '{{%films_mraa_ratings}}',
            'mraa_rating_id'
        );

        // add foreign key for table `{{%mraa_rating}}`
        $this->addForeignKey(
            '{{%fk-films_mraa_ratings-mraa_rating_id}}',
            '{{%films_mraa_ratings}}',
            'mraa_rating_id',
            '{{%mraa_rating}}',
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
            '{{%fk-films_mraa_ratings-film_id}}',
            '{{%films_mraa_ratings}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-films_mraa_ratings-film_id}}',
            '{{%films_mraa_ratings}}'
        );

        // drops foreign key for table `{{%mraa_rating}}`
        $this->dropForeignKey(
            '{{%fk-films_mraa_ratings-mraa_rating_id}}',
            '{{%films_mraa_ratings}}'
        );

        // drops index for column `mraa_rating_id`
        $this->dropIndex(
            '{{%idx-films_mraa_ratings-mraa_rating_id}}',
            '{{%films_mraa_ratings}}'
        );

        $this->dropTable('{{%films_mraa_ratings}}');
    }
}
