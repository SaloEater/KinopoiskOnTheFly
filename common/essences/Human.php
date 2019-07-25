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
 * @property Film[] $films
 * @property FilmsActors[] $filmsActors
 * @property Film[] $films0
 * @property Role $role
 */
class Human extends \yii\db\ActiveRecord
{
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
            [['role_id'], 'integer'],
            [['birth_day'], 'safe'],
            [['name', 'birth_place'], 'string', 'max' => 64],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['role_id' => 'id']],
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
    public function getFilms()
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
    public function getFilms0()
    {
        return $this->hasMany(Film::className(), ['id' => 'film_id'])->viaTable('films_actors', ['actor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }
}
