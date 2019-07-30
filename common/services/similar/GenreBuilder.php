<?php


namespace common\services\similar;


use common\essences\FilmsGenres;
use common\essences\Genre;
use InvalidArgumentException;
use yii\db\ActiveQuery;

class GenreBuilder extends IBuilder
{
    /**
     * Condition must looks like ['id' => your genre id]
     *
     * @param ActiveQuery $query
     * @param array $condition
     * @return ActiveQuery
     */
    public function joinToQuery(ActiveQuery $query, array $condition): ActiveQuery
    {
        if (!isset($condition['id'])) {
            throw new InvalidArgumentException('Не указано айди жанра');
        }
        return $query->innerJoin(FilmsGenres::tableName(), 'film.id = film_id')
            ->innerJoin(Genre::tableName(), 'genre_id = genre.id AND genre.id = '.$condition['id']);
    }
}