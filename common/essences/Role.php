<?php

namespace common\essences;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property int $id
 * @property string $name
 *
 * @property Human[] $humans
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 64],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHumans()
    {
        return $this->hasMany(Human::className(), ['role_id' => 'id']);
    }
}
