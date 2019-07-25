<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%films_user_ratings}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%film}}`
 * - `{{%user_rating}}`
 */
class m190725_083004_create_junction_table_for_film_and_user_rating_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%films_user_ratings}}', [
            'film_id' => $this->integer(),
            'user_rating_id' => $this->integer(),
            'PRIMARY KEY(film_id, user_rating_id)',
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-films_user_ratings-film_id}}',
            '{{%films_user_ratings}}',
            'film_id'
        );

        // add foreign key for table `{{%film}}`
        $this->addForeignKey(
            '{{%fk-films_user_ratings-film_id}}',
            '{{%films_user_ratings}}',
            'film_id',
            '{{%film}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_rating_id`
        $this->createIndex(
            '{{%idx-films_user_ratings-user_rating_id}}',
            '{{%films_user_ratings}}',
            'user_rating_id'
        );

        // add foreign key for table `{{%user_rating}}`
        $this->addForeignKey(
            '{{%fk-films_user_ratings-user_rating_id}}',
            '{{%films_user_ratings}}',
            'user_rating_id',
            '{{%user_rating}}',
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
            '{{%fk-films_user_ratings-film_id}}',
            '{{%films_user_ratings}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-films_user_ratings-film_id}}',
            '{{%films_user_ratings}}'
        );

        // drops foreign key for table `{{%user_rating}}`
        $this->dropForeignKey(
            '{{%fk-films_user_ratings-user_rating_id}}',
            '{{%films_user_ratings}}'
        );

        // drops index for column `user_rating_id`
        $this->dropIndex(
            '{{%idx-films_user_ratings-user_rating_id}}',
            '{{%films_user_ratings}}'
        );

        $this->dropTable('{{%films_user_ratings}}');
    }
}
