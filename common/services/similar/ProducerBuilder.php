<?php


namespace common\services\similar;


use common\essences\Human;
use yii\db\ActiveQuery;

class ProducerBuilder extends IBuilder
{
    /**
     * Condition must looks like ['id' => your producer id]
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
        return $query->innerJoin(Human::tableName(), 'producer_id = human.id AND human.id='.$condition['id']);
    }
}