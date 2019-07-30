<?php


namespace common\services\similar;


use common\essences\User;
use common\essences\UsersFavoriteFilms;
use InvalidArgumentException;
use yii\db\ActiveQuery;

class UserFavoritesBuilder extends IBuilder
{
    /**
     * Condition must looks like ['id' => your user id]
     *
     * @param ActiveQuery $query
     * @param array $condition
     * @return ActiveQuery
     */
    public function joinToQuery(ActiveQuery $query, array $condition): ActiveQuery
    {
        if (!isset($condition['id'])) {
            throw new InvalidArgumentException('Не указано айди пользователя');
        }
        return $query->innerJoin(UsersFavoriteFilms::tableName(), 'film.id = film_id')
            ->innerJoin(User::tableName(), 'user_id = user'.$condition['id']);
    }
}