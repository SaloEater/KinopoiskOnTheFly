<?php
namespace common\repositories;

use common\essences\Genre;

class GenreRepository extends IRepository
{
    private $innerClass;

    public function __construct(Genre $innerClass)
    {
        $this->innerClass = $innerClass;
    }

    public function findAll(){
        $genres = $this->_findAll($this->innerClass, []);
        return $genres;
    }

    public function getByName(string $name)
    {
        $genre = $this->_getBy($this->innerClass, ['name' => $name]);
        return $genre;
    }

    public function getById(int $id)
    {
        $genre = $this->_getBy($this->innerClass, ['id' => $id]);

        return $genre;
    }
}