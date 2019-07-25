<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "mraa_rating".
 *
 * @property int $id
 * @property string $name
 * @property string $icon
 * @property string $tooltip
 *
 * @property FilmsMraaRatings[] $filmsMraaRatings
 * @property Film[] $films
 */
class MraaRating extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mraa_rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tooltip'], 'string'],
            [['name', 'icon'], 'string', 'max' => 64],
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
            'icon' => 'Icon',
            'tooltip' => 'Tooltip',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmsMraaRatings()
    {
        return $this->hasMany(FilmsMraaRatings::className(), ['mraa_rating_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(Film::className(), ['id' => 'film_id'])->viaTable('films_mraa_ratings', ['mraa_rating_id' => 'id']);
    }
}
