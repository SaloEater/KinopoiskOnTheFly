<?php

namespace common\repositories;

use common\essences\FilmsAwards;

class FilmsAwardsRepository extends IRepository
{
    private $innerRecord;

    public function __construct(FilmsAwards $innerRecord)
    {
        $this->innerRecord = $innerRecord;
    }

    public function findByIDs(int $actor_id, int $film_id)
    {
        $object = $this->_findBy($this->innerRecord, ['award_id' => $actor_id, 'film_id' => $film_id]);
        return $object;
    }

}