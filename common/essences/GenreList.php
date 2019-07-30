<?php

namespace common\essences;

use common\services\FilmService;
use Yii;
use yii\base\Model;

class GenreList extends Model
{
    public $genres = [];

    public function rules()
    {
        return [
          [['genres'], 'safe']
        ];
    }

    public static function fromFilm(Film $film)
    {
        $genreList = new static();
        $genreList->genres = $film->genres;
        return $genreList;
    }

    public static function fromHuman(Human $human)
    {
        $genreList = new static();

        $films = Yii::createObject(FilmService::class)->getByHuman($human);

        foreach ($films as $film)
        {
            $genreList->genres = array_merge($film->genres, $genreList->genres);
        }

        $genreList->genres = array_unique($genreList->genres);

        return $genreList;
    }
}