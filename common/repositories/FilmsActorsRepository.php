<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 28.07.2019
 * Time: 13:50
 */

namespace common\repositories;


use common\essences\FilmsActors;

class FilmsActorsRepository extends IRepository
{
    private $innerRecord;

    public function __construct(FilmsActors $innerRecord)
    {
        $this->innerRecord = $innerRecord;
    }

    public function findByIDs(int $actor_id, int $film_id)
    {
        $object = $this->_findBy($this->innerRecord, ['actor_id' => $actor_id, 'film_id' => $film_id]);
        return $object;
    }
}