<?php

namespace common\essences;

use common\behaviors\TransliteratorSlugBehaviour;

/**
 * This is the model class for table "genre".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 *
 * @property FilmsGenres[] $filmsGenres
 * @property Film[] $films
 */
class Genre extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => TransliteratorSlugBehaviour::class,
                'attribute' => 'name',
                'transliterator' => 'Russian-Latin/BGN; Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFC;',
                'forceUpdate' => true
            ]
        ];
}
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmsGenres()
    {
        return $this->hasMany(FilmsGenres::className(), ['genre_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(Film::className(), ['id' => 'film_id'])->viaTable('films_genres', ['genre_id' => 'id']);
    }
}
