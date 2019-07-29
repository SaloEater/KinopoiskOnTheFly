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
 * @property int $mraa_rating
 * @property string $description
 * @property string $tagline
 *
 * @property Human $producer
 * @property FilmsActors[] $filmsActors
 * @property Human[] $actors
 * @property FilmsGenres[] $filmsGenres
 * @property Genre[] $genres
 * @property FilmsUserRatings[] $filmsUserRatings
 * @property UserRating[] $userRatings
 * @property UsersFavoriteFilms[] $usersFavoriteFilms
 * @property User[] $users
 */
class Film extends \yii\db\ActiveRecord
{

    public const RATING_G = 1;
    public const RATING_PG = 2;
    public const RATING_PG13 = 3;
    public const RATING_R = 4;
    public const RATING_NC17 = 5;

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
            [['rating', 'user_rating', 'mraa_rating'], 'number'],
            [['duration'], 'safe'],
            [['title', 'country'], 'string', 'max' => 64],
            [['logo', 'tagline'], 'string', 'max' => 128],
            [['description'], 'string'],
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
            'title' => 'Название',
            'logo' => 'Промо',
            'producer_id' => 'Продюсер',
            'rating' => 'Рейтинг',
            'country' => 'Страна',
            'publish_year' => 'Год выпуска',
            'duration' => 'Продолжительность',
            'user_rating' => 'User Rating',
            'genre' => 'Жанры',
            'mraa_rating' => 'Рейтинг MPAA',
            'tagline' => 'Слоган'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmsAwards()
    {
        return $this->hasMany(FilmsAwards::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAwards()
    {
        return $this->hasMany(Award::className(), ['id' => 'award_id'])->viaTable('films_awards', ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmsGenres()
    {
        return $this->hasMany(FilmsGenres::className(), ['film_id' => 'id']);
    }

    public function getGenres()
    {
        return $this->hasMany(Genre::className(), ['id' => 'genre_id'])->viaTable('films_genres',
            ['film_id' => 'id']);
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
    public function getMraaRating()
    {
        return $this->hasMany(MraaRating::className(), ['id' => 'mraa_rating']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersFavoriteFilms()
    {
        return $this->hasMany(UsersFavoriteFilms::className(), ['film_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('users_favorite_films', ['film_id' => 'id']);
    }
}
