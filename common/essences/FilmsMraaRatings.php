<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "films_mraa_ratings".
 *
 * @property int $film_id
 * @property int $mraa_rating_id
 *
 * @property Film $film
 * @property MraaRating $mraaRating
 */
class FilmsMraaRatings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'films_mraa_ratings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['film_id', 'mraa_rating_id'], 'required'],
            [['film_id', 'mraa_rating_id'], 'integer'],
            [['film_id', 'mraa_rating_id'], 'unique', 'targetAttribute' => ['film_id', 'mraa_rating_id']],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Film::className(), 'targetAttribute' => ['film_id' => 'id']],
            [['mraa_rating_id'], 'exist', 'skipOnError' => true, 'targetClass' => MraaRating::className(), 'targetAttribute' => ['mraa_rating_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'film_id' => 'Film ID',
            'mraa_rating_id' => 'Mraa Rating ID',
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
    public function getMraaRating()
    {
        return $this->hasOne(MraaRating::className(), ['id' => 'mraa_rating_id']);
    }
}
