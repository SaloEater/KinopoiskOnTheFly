<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%films_genres}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%film}}`
 * - `{{%genre}}`
 */
class m190725_081619_create_junction_table_for_film_and_genre_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%films_genres}}', [
            'film_id' => $this->integer(),
            'genre_id' => $this->integer(),
            'PRIMARY KEY(film_id, genre_id)',
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-films_genres-film_id}}',
            '{{%films_genres}}',
            'film_id'
        );

        // add foreign key for table `{{%film}}`
        $this->addForeignKey(
            '{{%fk-films_genres-film_id}}',
            '{{%films_genres}}',
            'film_id',
            '{{%film}}',
            'id',
            'CASCADE'
        );

        // creates index for column `genre_id`
        $this->createIndex(
            '{{%idx-films_genres-genre_id}}',
            '{{%films_genres}}',
            'genre_id'
        );

        // add foreign key for table `{{%genre}}`
        $this->addForeignKey(
            '{{%fk-films_genres-genre_id}}',
            '{{%films_genres}}',
            'genre_id',
            '{{%genre}}',
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
            '{{%fk-films_genres-film_id}}',
            '{{%films_genres}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-films_genres-film_id}}',
            '{{%films_genres}}'
        );

        // drops foreign key for table `{{%genre}}`
        $this->dropForeignKey(
            '{{%fk-films_genres-genre_id}}',
            '{{%films_genres}}'
        );

        // drops index for column `genre_id`
        $this->dropIndex(
            '{{%idx-films_genres-genre_id}}',
            '{{%films_genres}}'
        );

        $this->dropTable('{{%films_genres}}');
    }
}
