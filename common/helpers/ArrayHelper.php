<?php

namespace common\helpers;

use yii\db\ActiveRecord;

class ArrayHelper
{
    /**
     * @param ActiveRecord[] $array
     * @param string $valueField
     * @param string $keyField
     * @return array
     */
    public static function prepareARArrayForDropdownList(
        array $array,
        string $valueField,
        string $keyField = 'id'
        )
    {
        if (!is_array($array)) {
            return [];
        }
        if (empty($array)) {
            return $array;
        }
        return array_reduce($array, function(array $carry, $role) use ($valueField, $keyField) {
            $carry[] = [$role->$keyField => $role->$valueField];
            return $carry;
        }, []);
    }
}