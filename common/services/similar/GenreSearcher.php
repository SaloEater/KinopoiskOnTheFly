<?php

namespace common\services\similar;

use common\essences\Film;
use common\helpers\ArrayHelper;
use common\services\FilmsGenresService;

class GenreSearcher
{
    public function forFilm(Film $film, $maximum, $minimum = 2)
    {
        $genres = $film->genres;

        $randomGenres = ArrayHelper::getColumn($genres, 'id', $maximum);

        $filmIDs = [];

        /* @var $filmsGenresService FilmsGenresService*/
        $filmsGenresService = \Yii::createObject(FilmsGenresService::class);
        $length = count($randomGenres);
        for ($i = $length; $i >= $minimum; $i--) {
            $randomFilmsID = ArrayHelper::getColumn(
                $filmsGenresService->getFilmsWith($randomGenres),
                'film_id',
                $i);
            foreach ($randomFilmsID as $filmId) {
                $filmIDs[] = $filmId;
            }
        }

    }
}