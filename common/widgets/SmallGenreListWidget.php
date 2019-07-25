<?php


namespace common\widgets;


use common\essences\Film;
use common\essences\GenreList;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class SmallGenreListWidget extends Widget
{
    /* @var $film Film*/
    public $film;

    public function run()
    {
        $content = '';
        $genreList = GenreList::from($this->film);
        $genres = $genreList->genres;
        $additionalPart = '';
        if (count($genreList->genres) > 5) {
            $genres = array_slice($genres, 0, 5);
            $additionalPart = Html::a('...',
                Url::to([$this->film->slug.'#genres']) //TODO Контроллер для жанров отдельного фильма
            );
        }

        foreach ($genres as $genre) {
            $content .= Html::a($genre->name,
                Url::to(['/genre/'.$genre->slug]), //TODO Контроллер для жанров
            [
                'style' => [
                    'cursor' => 'default'
                ]
            ]) . '</br>';
        }

        return $content . $additionalPart;
    }
}