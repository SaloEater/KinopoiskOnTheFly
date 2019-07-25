<?php

namespace common\repositories;

use common\essences\Role;
use Yii;

class ProducerRepository extends HumanRepository
{
    public function findAll()
    {
        $humans = $this->_findAll($this->innerRecord, ['role_id' => $this->roleRepository->getByName(Role::$ROLE_PRODUCER)]);
        return $humans;
    }
}