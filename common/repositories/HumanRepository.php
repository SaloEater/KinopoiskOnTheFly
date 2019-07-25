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

}