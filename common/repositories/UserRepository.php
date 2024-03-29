<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 17.07.2019
 * Time: 10:45
 */

namespace common\repositories;

use common\essences\User;
use RuntimeException;

class UserRepository extends IRepository
{
    private $innerRecord;

    public function __construct(User $innerRecord)
    {
        $this->innerRecord = $innerRecord;
    }

    public function save(User $user)
    {
        if (!$user->save()) {
            throw new RuntimeException('Saving error');
        }
    }

    public function existsByVerificationToken($token)
    {
        return (bool) $this->getByVerificationToken($token);
    }

    public function getByVerificationToken($token)
    {
        if (!($user = $this->_getBy($this->innerRecord, ['verification_token' => $token]))) {
            throw new NotFoundException('User not found');
        }
        return $user;
    }

    public function getByEmail($email)
    {
        $user = $this->_getBy($this->innerRecord, ['email' => $email]);
        return $user;
    }

    public function existsByPasswordToken($token)
    {
        return (bool) $this->getByPasswordToken($token);
    }

    public function getByPasswordToken($token)
    {
        $user = $this->_getBy($this->innerRecord, ['password_reset_token' => $token]);
        return $user;
    }

    public function getByUsername($username)
    {
        $user = $this->_getBy($this->innerRecord, ['username' => $username]);
        return $user;
    }

    public function getById($id)
    {
        $user = $this->_getBy($this->innerRecord, ['id' => $id]);
        return $user;
    }
}