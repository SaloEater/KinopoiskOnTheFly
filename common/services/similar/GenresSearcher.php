<?php

namespace common\services\similar;

use common\essences\Film;
use common\helpers\ArrayHelper;
use common\repositories\FilmRepository;
use common\services\FilmsGenresService;
use yii\base\BaseObject;

class GenresSearcher extends ISearcher
{
    public $film;
    public $maximum;
    public $minimum = 1;

    public function search()
    {
        $genres = \yii\helpers\ArrayHelper::getColumn($this->film->genres, 'id');

        $length = count($genres);
        $filmsGenresService = \Yii::createObject(FilmsGenresService::class);

        $filmIDs = [];
        for ($i = $length - 1; $i >= 0; $i--) {
            $commonGenres = array_slice($genres, 0, $i);
            $iteratingGenres = array_slice($genres, $i-$length);

            foreach ($iteratingGenres as $iteratingGenre) {
                $allWithGenres = $filmsGenresService->findFilmsWith(array_merge($commonGenres, [$iteratingGenre]));
                foreach ($allWithGenres as $filmId) {
                    $filmIDs[] = $filmId;
                }
                $filmIDs = array_unique($filmIDs);
                if (count($filmIDs) >= $this->maximum*2) {
                    break;
                }
            }
        }
        $uniques = array_diff($filmIDs, [$this->film->id]);
        shuffle($uniques);
        return $uniques;

        /*$genres = \yii\helpers\ArrayHelper::getColumn($this->film->genres, 'id');

        $randomGenres = ArrayHelper::Rand($genres, min($this->maximum, count($genres)));

        $filmIDs = [];

        $filmsGenresService = \Yii::createObject(FilmsGenresService::class);
        $length = count($randomGenres);
        do {
            for ($i = $length; $i >= $this->minimum; $i--) {
                for ($j = $length-$i; $j >= 0; $j--) {
                    $someGenres = ArrayHelper::Rand($randomGenres, $i);
                    $allWithGenres = $filmsGenresService->findFilmsWith($someGenres);
                    $randomFilmsID = ArrayHelper::Rand($allWithGenres, $i);
                    foreach ($randomFilmsID as $filmId) {
                        $filmIDs[] = $filmId;
                    }
                    $filmIDs = array_unique($filmIDs);
                    if (count($filmIDs) >= $this->maximum + 1) {
                        break;
                    }
                }
            }
        } while(count($filmIDs) < $this->maximum + 1);

        $uniques = array_diff($filmIDs, [$this->film->id]);

        shuffle($uniques);

        return $uniques;*/
    }

    public function uniqueId()
    {
        return 'genres'-$this->film->id;
    }
}