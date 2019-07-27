<?php


namespace common\widgets;


use common\essences\Film;
use common\essences\GenreList;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class FullGenreListWidget extends Widget
{
    /* @var $film Film*/
    public $film;

    public function run()
    {
        $content = '';
        $genreList = GenreList::from($this->film);
        $genres = $genreList->genres;

        $i = count($genres);
        foreach ($genres as $genre) {
            $content .= Html::a($genre->name,
                    Url::to(['/genre/'.$genre->id]), //TODO Контроллер для жанров
                    [
                        'style' => [
                            'cursor' => 'default'
                        ]
                    ]) . ($i == 1 ? '' : Html::tag('span', ', ', [
                        'style' => [
                            'cursor' => 'default'
                        ]
                    ]));
            $i--;
        }

        return $content;
    }
}