<?php

namespace common\services\auth;

use common\essences\User;
use common\models\LoginForm;
use common\repositories\NotFoundException;
use common\repositories\UserRepository;
use DomainException;

class AuthService
{

    private $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Logs in a user using the provided username and password.
     * @param LoginForm $form
     * @return User
     * @throws DomainException
     */
    public function auth(LoginForm $form)
    {
        $user = $this->users->getByUsername($form->username);

        if (!$user->validatePassword($form->password)) {
            throw new DomainException('Неверный логин или пароль');
        }

        return $user;
    }
}