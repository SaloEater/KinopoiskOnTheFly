<?php

namespace common\repositories;

use common\essences\UsersFavoriteFilms;
use DomainException;

class UsersFavoriteFilmsRepository extends IRepository
{
    private $innerRecord;

    public function __construct(UsersFavoriteFilms $innerRecord)
    {
        $this->innerRecord = $innerRecord;
    }

    public function findByIDs(int $film_id, int $user_id)
    {
        $object = $this->_findBy($this->innerRecord, ['film_id' => $film_id, 'user_id' => $user_id]);

        return $object;
    }

    public function save(UsersFavoriteFilms $object)
    {
        if (!$object->save()) {
            throw new DomainException('Ошибка при сохранении');
        }
    }

    public function delete(UsersFavoriteFilms $object)
    {
        if (!$object->delete()) {
            throw new DomainException('Ошибка при удалении');
        }
    }
}