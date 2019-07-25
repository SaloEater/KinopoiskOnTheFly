<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "films_actors".
 *
 * @property int $film_id
 * @property int $actor_id
 *
 * @property Human $actor
 * @property Film $film
 */
class FilmsActors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'films_actors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['film_id', 'actor_id'], 'required'],
            [['film_id', 'actor_id'], 'integer'],
            [['film_id', 'actor_id'], 'unique', 'targetAttribute' => ['film_id', 'actor_id']],
            [['actor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Human::className(), 'targetAttribute' => ['actor_id' => 'id']],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Film::className(), 'targetAttribute' => ['film_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'film_id' => 'Film ID',
            'actor_id' => 'Actor ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActor()
    {
        return $this->hasOne(Human::className(), ['id' => 'actor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Film::className(), ['id' => 'film_id']);
    }
}
