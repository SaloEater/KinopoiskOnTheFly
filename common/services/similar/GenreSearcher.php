<?php

namespace common\services\similar;

use common\essences\Film;
use common\helpers\ArrayHelper;
use common\repositories\FilmRepository;
use common\services\FilmsGenresService;
use yii\base\BaseObject;

class GenreSearcher extends ISearcher
{
    public $film;
    public $maximum;
    public $minimum = 1;

    public function search()
    {
        $genres = \yii\helpers\ArrayHelper::getColumn($this->film->genres, 'id');

        $randomGenres = ArrayHelper::getColumn($genres, 'id', $this->maximum);

        $filmIDs = [];

        /* @var $filmsGenresService FilmsGenresService*/
        $filmsGenresService = \Yii::createObject(FilmsGenresService::class);
        $length = count($randomGenres);
        for ($i = $length; $i >= $this->minimum; $i--) {
            $films = $filmsGenresService->getFilmsWith($randomGenres);
            $randomFilmsID = ArrayHelper::getColumn(
                $films,
                'film_id',
                $i);
            foreach ($randomFilmsID as $filmId) {
                $filmIDs[] = $filmId;
            }
        }
        $column = \yii\helpers\ArrayHelper::getColumn($filmIDs, 'film_id');
        $uniques = array_unique($column);

        unset($uniques[$this->film->id]);

        //$films = \Yii::createObject(FilmRepository::class)->findByIDs($uniques);

        return $uniques;
    }
}