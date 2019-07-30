<?php

namespace common\repositories;

use common\essences\Award;

class AwardRepository extends IRepository
{
    private $innerRecord;

    public function __construct(Award $innerRecord)
    {
        $this->innerRecord = $innerRecord;
    }

    public function findAll()
    {
        $objects = $this->_findAll($this->innerRecord, []);

        return $objects;
    }
}