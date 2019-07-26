<?php

namespace common\services\similar;

use common\essences\FilmsActors;
use yii\db\ActiveQuery;

class ActorBuilder extends IBuilder
{
    /**
     * Condition must looks like ['id' => your actor id]
     *
     * @param ActiveQuery $query
     * @param array $condition
     * @return ActiveQuery
     */
    public function joinToQuery(ActiveQuery $query, array $condition): ActiveQuery
    {
        if (!isset($condition['id'])) {
            throw new \InvalidArgumentException('Не указано айди режисера');
        }
        return $query->innerJoin(FilmsActors::tableName(), 'film.id=film_id AND actor_id='.$condition['id']);
    }
}