<?php

namespace common\services\similar;

use common\essences\Film;
use common\services\FilmsGenresService;
use yii\helpers\ArrayHelper;

class GenreSearcher
{
    public function forFilm(Film $film, $maximum)
    {
        $genres = $film->genres;
        if (empty($genres)) {
            return [];
        }
        $randomIndexes = array_rand(ArrayHelper::getColumn($film->genres, 'id'), $maximum);
        $randomGenres = [];
        if (is_array($randomIndexes)) {
            foreach ($randomIndexes as $index) {
                $randomGenres[] = $genres[$index];
            }
        } else {
            $randomGenres = $randomIndexes;
        }
        $filmIDs = [];
        /* @var $filmsGenresService FilmsGenresService*/
        $filmsGenresService = \Yii::createObject(FilmsGenresService::class);
        $length = count($randomIndexes);
        for ($i = 2; $i < $length; $i++) {
            array_push($filmIDs, $filmsGenresService->getFilmForList(array_rand($randomGenres));
        }

    }
}