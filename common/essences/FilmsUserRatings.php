<?php

namespace common\essences;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "films_user_ratings".
 *
 * @property int $film_id
 * @property int $user_rating_id
 *
 * @property Film $film
 * @property UserRating $userRating
 */
class FilmsUserRatings extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'films_user_ratings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['film_id', 'user_rating_id'], 'required'],
            [['film_id', 'user_rating_id'], 'integer'],
            [['film_id', 'user_rating_id'], 'unique', 'targetAttribute' => ['film_id', 'user_rating_id']],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Film::className(), 'targetAttribute' => ['film_id' => 'id']],
            [['user_rating_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserRating::className(), 'targetAttribute' => ['user_rating_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'film_id' => 'Film ID',
            'user_rating_id' => 'User Rating ID',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Film::className(), ['id' => 'film_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getUserRating()
    {
        return $this->hasOne(UserRating::className(), ['id' => 'user_rating_id']);
    }
}
