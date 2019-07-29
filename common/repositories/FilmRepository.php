<?php

namespace common\repositories;

use common\essences\Film;
use common\essences\FilmsActors;
use common\essences\Human;
use http\Exception\InvalidArgumentException;
use yii\db\Query;

class FilmRepository extends IRepository
{

    private $innerRecord;

    public function __construct(Film $innerRecord)
    {
        $this->innerRecord = $innerRecord;
    }

    public function getById(string $id)
    {
        $film = $this->_getBy($this->innerRecord, ['id' => $id]);

        return $film;
    }

    public function findByIDs(array $ids)
    {
        $films = $this->_findAll($this->innerRecord, ['id' => $ids]);

        return $films;
    }

    public function getTopIDsByHuman(Human $human, int $top)
    {
        $query = (new Query())
            ->select('film.id')
            ->from(Film::tableName());
        if ($human->isActor()) {
            $query->innerJoin(
                FilmsActors::tableName(),
                'film_id=film.id AND actor_id='.$human->id);
        } else if ($human->isProducer()) {
            $query->where([
                'producer_id' => $human->id
            ]);
        } else {
            throw new InvalidArgumentException('Не указана карьера');
        }
        $query->limit($top)->orderBy(['film.rating' => SORT_DESC]);

        $command = $query->createCommand()->getRawSql();

        return $query->all();
    }
}
