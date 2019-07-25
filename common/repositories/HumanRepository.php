<?php

namespace common\repositories;

use common\essences\Human;

class HumanRepository extends IRepository
{
    protected $innerRecord;
    protected $roleRepository;

    public function __construct(Human $innerRecord, RoleRepository $roleRepository)
    {
        $this->innerRecord = $innerRecord;
        $this->roleRepository = $roleRepository;
    }

}