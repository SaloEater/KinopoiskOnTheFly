<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "human".
 *
 * @property int $id
 * @property string $name
 * @property int $role_id
 * @property string $birth_day
 * @property string $birth_place
 *
 * @property Film[] $producedFilms
 * @property FilmsActors[] $filmsActors
 * @property Film[] $films
 */
class Human extends \yii\db\ActiveRecord
{
    public const ROLE_PRODUCER = 1;
    public const ROLE_ACTOR = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'human';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['role_id', 'default', 'value' => self::ROLE_ACTOR],
            ['role_id', 'in', 'range' => [self::ROLE_PRODUCER, self::ROLE_ACTOR]],
            [['birth_day'], 'safe'],
            [['name', 'birth_place'], 'string', 'max' => 64],
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
            'role_id' => 'Role ID',
            'birth_day' => 'Birth Day',
            'birth_place' => 'Birth Place',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducedFilms()
    {
        return $this->hasMany(Film::className(), ['producer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmsActors()
    {
        return $this->hasMany(FilmsActors::className(), ['actor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(Film::className(), ['id' => 'film_id'])->viaTable('films_actors', ['actor_id' => 'id']);
    }
}
