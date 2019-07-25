<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%films_actors}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%film}}`
 * - `{{%human}}`
 */
class m190725_081723_create_junction_table_for_film_and_human_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%films_actors}}', [
            'film_id' => $this->integer(),
            'actor_id' => $this->integer(),
            'PRIMARY KEY(film_id, actor_id)',
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-films_actors-film_id}}',
            '{{%films_actors}}',
            'film_id'
        );

        // add foreign key for table `{{%film}}`
        $this->addForeignKey(
            '{{%fk-films_actors-film_id}}',
            '{{%films_actors}}',
            'film_id',
            '{{%film}}',
            'id',
            'CASCADE'
        );

        // creates index for column `actor_id`
        $this->createIndex(
            '{{%idx-films_actors-actor_id}}',
            '{{%films_actors}}',
            'actor_id'
        );

        // add foreign key for table `{{%human}}`
        $this->addForeignKey(
            '{{%fk-films_actors-actor_id}}',
            '{{%films_actors}}',
            'actor_id',
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
        // drops foreign key for table `{{%film}}`
        $this->dropForeignKey(
            '{{%fk-films_actors-film_id}}',
            '{{%films_actors}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-films_actors-film_id}}',
            '{{%films_actors}}'
        );

        // drops foreign key for table `{{%human}}`
        $this->dropForeignKey(
            '{{%fk-films_actors-actor_id}}',
            '{{%films_actors}}'
        );

        // drops index for column `actor_id`
        $this->dropIndex(
            '{{%idx-films_actors-actor_id}}',
            '{{%films_actors}}'
        );

        $this->dropTable('{{%films_actors}}');
    }
}
