<?php

namespace common\repositories;

use common\essences\User;

class UserRepository extends IRepository
{
    private $innerRecord;

    public function __construct(User $innerRecord)
    {
        $this->innerRecord = $innerRecord;
    }

    /**
     * @param string $username
     * @return User
     * @throws NotFoundException
     */
    public function getByUsername($username)
    {
        $user = $this->getBy($this->innerRecord, ['username' => $username]);
        return $user;
    }

}