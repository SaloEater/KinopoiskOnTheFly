<?php
namespace common\repositories;

use common\essences\FilmsGenres;

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

    public function findAllWithGenres(array $genres)
    {
        $objects = $this->_findAll($this->innerRecord, ['genre_id' => $genres]);

        return $objects;
    }
}