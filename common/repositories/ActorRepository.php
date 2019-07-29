<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 28.07.2019
 * Time: 14:06
 */

namespace common\repositories;


use common\essences\Human;

class ActorRepository extends HumanRepository
{
    public function findAll()
    {
        $people = $this->_findAll($this->innerRecord, ['role_id' => Human::ROLE_ACTOR]);
        return $people;
    }
}