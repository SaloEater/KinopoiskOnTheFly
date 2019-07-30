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

    /**
     * @param array $array
     * @param int $maximum
     * @return array|mixed
     */
    public static function Rand(array $array, int $maximum)
    {
        if (empty($array)) {
            return [];
        }

        $randomIndexes = array_rand($array, min(count($array), $maximum));
        $randomArray = [];
        if (is_array($randomIndexes)) {
            foreach ($randomIndexes as $index) {
                $randomArray[] = $array[$index];
            }
        } else {
            $randomArray[] = $array[$randomIndexes];
        }
        return $randomArray;
    }
}