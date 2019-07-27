<?php

namespace common\repositories;

use common\essences\Film;
use common\essences\Human;
use Yii;
use yii\db\Query;

class ProducerRepository extends HumanRepository
{
    public function findAll()
    {
        $people = $this->_findAll($this->innerRecord, ['role_id' => Human::ROLE_PRODUCER]);
        return $people;
    }

    public function getFilmIDsByID(int $id)
    {
        $filmIDs = (new Query())
            ->select('film.id')
            ->from(Film::tableName())
            ->innerJoin(Human::tableName(), 'producer_id=human.id')
            ->where(['producer_id' => $id]);

        $command = $filmIDs->createCommand()->getRawSql();

        return array_map(function($item) {
            return $item['id'];
        }, $filmIDs->all());
    }
}