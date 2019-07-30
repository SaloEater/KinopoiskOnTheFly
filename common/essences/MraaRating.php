<?php

namespace common\essences;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "mraa_rating".
 *
 * @property int $id
 * @property string $name
 * @property string $icon
 * @property string $tooltip
 *
 */
class MraaRating extends ActiveRecord
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

}
