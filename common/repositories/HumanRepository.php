<?php

namespace common\repositories;

use common\essences\Human;

class HumanRepository extends IRepository
{
    protected $innerRecord;

    public function __construct(Human $innerRecord)
    {
        $this->innerRecord = $innerRecord;
    }

    public function getById(int $id)
    {
        $human = $this->_getBy($this->innerRecord, ['id' => $id]);

        return $human;
    }


}