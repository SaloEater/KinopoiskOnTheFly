<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "film".
 *
 * @property int $id
 * @property string $title
 * @property string $logo
 * @property int $producer_id
 * @property double $rating
 * @property string $country
 * @property int $publish_year
 * @property string $duration
 * @property double $user_rating
 *
 * @property Human $producer
 * @property FilmsActors[] $filmsActors
 * @property Human[] $actors
 * @property FilmsGenres[] $filmsGenres
 * @property Genre[] $genres
 * @property FilmsMraaRatings[] $filmsMraaRatings
 * @property MraaRating[] $mraaRatings
 * @property FilmsUserRatings[] $filmsUserRatings
 * @property UserRating[] $userRatings
 */
class Film extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'film';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['producer_id', 'publish_year'], 'integer'],
            [['rating', 'user_rating'], 'number'],
            [['duration'], 'safe'],
            [['title', 'logo', 'country'], 'string', 'max' => 64],
            [['producer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Human::className(), 'targetAttribute' => ['producer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'logo' => 'Logo',
            'producer_id' => 'Producer ID',
            'rating' => 'Rating',
            'country' => 'Country',
            'publish_year' => 'Publish Year',
            'duration' => 'Duration',
            'user_rating' => 'User Rating',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducer()
    {
        return $this->hasOne(Human::className(), ['id' => 'producer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmsActors()
    {
        return $this->hasMany(FilmsActors::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActors()
    {
        return $this->hasMany(Human::className(), ['id' => 'actor_id'])->viaTable('films_actors', ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmsGenres()
    {
        return $this->hasMany(FilmsGenres::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenres()
    {
        return $this->hasMany(Genre::className(), ['id' => 'genre_id'])->viaTable('films_genres', ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmsMraaRatings()
    {
        return $this->hasMany(FilmsMraaRatings::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMraaRatings()
    {
        return $this->hasMany(MraaRating::className(), ['id' => 'mraa_rating_id'])->viaTable('films_mraa_ratings', ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmsUserRatings()
    {
        return $this->hasMany(FilmsUserRatings::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRatings()
    {
        return $this->hasMany(UserRating::className(), ['id' => 'user_rating_id'])->viaTable('films_user_ratings', ['film_id' => 'id']);
    }
}
