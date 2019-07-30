<?php


namespace common\services\similar;


use InvalidArgumentException;
use yii\db\ActiveQuery;

class NameBuilder extends IBuilder
{
    /**
     * Condition must looks like ['title' => your name]
     *
     * @param ActiveQuery $query
     * @param array $condition
     * @return ActiveQuery
     */
    public function joinToQuery(ActiveQuery $query, array $condition): ActiveQuery
    {
        if (!isset($condition['title'])) {
            throw new InvalidArgumentException('Не указано название фильма');
        }
        return $query->andWhere(['like', 'title', $condition['title']]);
    }
}