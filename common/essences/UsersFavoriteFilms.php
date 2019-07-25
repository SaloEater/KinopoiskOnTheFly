<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "users_favorite_films".
 *
 * @property int $film_id
 * @property int $user_id
 *
 * @property Film $film
 * @property User $user
 */
class UsersFavoriteFilms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_favorite_films';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['film_id', 'user_id'], 'required'],
            [['film_id', 'user_id'], 'integer'],
            [['film_id', 'user_id'], 'unique', 'targetAttribute' => ['film_id', 'user_id']],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Film::className(), 'targetAttribute' => ['film_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'film_id' => 'Film ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Film::className(), ['id' => 'film_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
