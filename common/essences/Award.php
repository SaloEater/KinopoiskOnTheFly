<?php

namespace common\essences;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "award".
 *
 * @property int $id
 * @property string $name
 * @property string $icon
 *
 * @property FilmsAwards[] $filmsAwards
 * @property Film[] $films
 */
class Award extends ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'award';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getFilmsAwards()
    {
        return $this->hasMany(FilmsAwards::className(), ['award_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getFilms()
    {
        return $this->hasMany(Film::className(), ['id' => 'film_id'])->viaTable('films_awards', ['award_id' => 'id']);
    }

    public function __toString()
    {
        return (string)$this->id;
    }
}
