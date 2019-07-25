<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users_favorite_films}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%film}}`
 * - `{{%user}}`
 */
class m190725_104923_create_junction_table_for_users_and_favorite_films_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users_favorite_films}}', [
            'film_id' => $this->integer(),
            'user_id' => $this->integer(),
            'PRIMARY KEY(film_id, user_id)',
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-users_favorite_films-film_id}}',
            '{{%users_favorite_films}}',
            'film_id'
        );

        // add foreign key for table `{{%film}}`
        $this->addForeignKey(
            '{{%fk-users_favorite_films-film_id}}',
            '{{%users_favorite_films}}',
            'film_id',
            '{{%film}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-users_favorite_films-user_id}}',
            '{{%users_favorite_films}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-users_favorite_films-user_id}}',
            '{{%users_favorite_films}}',
            'user_id',
            '{{%user}}',
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
            '{{%fk-users_favorite_films-film_id}}',
            '{{%users_favorite_films}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-users_favorite_films-film_id}}',
            '{{%users_favorite_films}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-users_favorite_films-user_id}}',
            '{{%users_favorite_films}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-users_favorite_films-user_id}}',
            '{{%users_favorite_films}}'
        );

        $this->dropTable('{{%users_favorite_films}}');
    }
}
