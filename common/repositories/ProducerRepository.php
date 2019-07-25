<?php

namespace common\repositories;

use common\essences\Human;
use Yii;

class ProducerRepository extends HumanRepository
{
    public function findAll()
    {
        $people = $this->_findAll($this->innerRecord, ['role_id' => Human::ROLE_PRODUCER]);
        return $people;
    }
}