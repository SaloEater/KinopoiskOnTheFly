<?php

namespace common\essences;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "human".
 *
 * @property int $id
 * @property string $name
 * @property int $role_id
 * @property string $birth_day
 * @property string $birth_place
 * @property string $logo
 *
 * @property Film[] $producedFilms
 * @property FilmsActors[] $filmsActors
 * @property Film[] $films
 */
class Human extends ActiveRecord
{
    public const ROLE_PRODUCER = 1;
    public const ROLE_ACTOR = 2;

    public function getRoleName() : string
    {
        switch($this->role_id) {
            case self::ROLE_PRODUCER: {
                return 'Режисёр';
            }
            case self::ROLE_ACTOR: {
                return 'Актёр';
            }
            default: {
                throw new \DomainException('Не указана роль');
            }
        }
    }

    public function isActor()
    {
        return $this->role_id==self::ROLE_ACTOR;
    }

    public function isProducer()
    {
        return $this->role_id==self::ROLE_PRODUCER;
    }

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
            [['logo'], 'string', 'max' => 128],
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
            'birth_day' => 'Дата рождения',
            'birth_place' => 'Место рождения',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getProducedFilms()
    {
        return $this->hasMany(Film::className(), ['producer_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getFilmsActors()
    {
        return $this->hasMany(FilmsActors::className(), ['actor_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getFilms()
    {
        return $this->hasMany(Film::className(), ['id' => 'film_id'])->viaTable('films_actors', ['actor_id' => 'id']);
    }
}
