<?php

namespace common\essences;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "films_awards".
 *
 * @property int $film_id
 * @property int $award_id
 *
 * @property Award $award
 * @property Film $film
 */
class FilmsAwards extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'films_awards';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['film_id', 'award_id'], 'required'],
            [['film_id', 'award_id'], 'integer'],
            [['film_id', 'award_id'], 'unique', 'targetAttribute' => ['film_id', 'award_id']],
            [['award_id'], 'exist', 'skipOnError' => true, 'targetClass' => Award::className(), 'targetAttribute' => ['award_id' => 'id']],
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
            'award_id' => 'Award ID',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getAward()
    {
        return $this->hasOne(Award::className(), ['id' => 'award_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Film::className(), ['id' => 'film_id']);
    }
}
