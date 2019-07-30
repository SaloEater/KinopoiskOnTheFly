<?php

namespace common\services;

use common\essences\UsersFavoriteFilms;
use common\repositories\UsersFavoriteFilmsRepository;

class UsersFavoriteFilmsService
{
    private $usersFavoriteFilms;

    public function __construct(UsersFavoriteFilmsRepository $usersFavoriteFilms)
    {
        $this->usersFavoriteFilms = $usersFavoriteFilms;
    }

    public function isExist(int $film_id, int $user_id)
    {
        $object = $this->usersFavoriteFilms->findByIDs($film_id, $user_id);

        return $object == null ? false : true;
    }

    public function changeStateForFilm(int $film_id, int $user_id)
    {
        $object = $this->usersFavoriteFilms->findByIDs($film_id, $user_id);

        if (!$object) {
            $object = new UsersFavoriteFilms();
            $object->film_id = $film_id;
            $object->user_id = $user_id;
            $this->usersFavoriteFilms->save($object);
        } else {
            $this->usersFavoriteFilms->delete($object);
        }
    }
}