<?php

namespace common\repositories;

use common\essences\Film;

class FilmRepository extends IRepository
{

    private $innerRecord;

    public function __construct(Film $innerRecord)
    {
        $this->innerRecord = $innerRecord;
    }

    public function getById(string $id)
    {
        $film = $this->_getBy($this->innerRecord, ['id' => $id]);

        return $film;
    }
}
