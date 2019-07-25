<?php


namespace common\helpers;


use common\essences\Genre;
use common\repositories\GenreRepository;
use Yii;

class GenreHelper
{
    public static function prepareArrayForDropdown()
    {
        return array_reduce(Yii::createObject(GenreRepository::class)->findAll(), function(array $carry, Genre $genre) {
            $carry[$genre->id] = $genre->name;
            return $carry;
        }, []);
    }
}