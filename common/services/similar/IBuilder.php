<?php

namespace common\services\similar;

use common\essences\Film;
use yii\base\BaseObject;
use yii\db\ActiveQuery;

abstract class IBuilder extends BaseObject
{
    public function joinToFilm(array $condition) : ActiveQuery
    {
        return $this->joinToQuery(Film::find()->distinct(), $condition);
    }

    abstract function joinToQuery(ActiveQuery $query, array $condition) : ActiveQuery;
}