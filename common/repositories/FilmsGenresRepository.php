<?php
namespace common\repositories;

use common\essences\FilmsGenres;
use yii\db\ActiveQuery;
use yii\db\Query;

class FilmsGenresRepository extends IRepository
{
    private $innerRecord;

    public function __construct(FilmsGenres $innerRecord)
    {
        $this->innerRecord = $innerRecord;
    }

    public function findByIDs(int $genre_id, int $film_id)
    {
        $object = $this->_findBy($this->innerRecord, ['genre_id' => $genre_id, 'film_id' => $film_id]);
        return $object;
    }

    public function findAllIDsWithGenres(array $genres)
    {
        $objects = new Query();
        $objects->select('film_id')->from($this->innerRecord::tableName());

        $objects->where(['genre_id'=>$genres]);

        $objects->groupBy('film_id');
        $objects->having('COUNT(*) = '.count($genres));

        $command = $objects->createCommand()->getRawSql();

        return $objects->all();
    }
}