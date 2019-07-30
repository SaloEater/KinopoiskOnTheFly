<?php


namespace common\widgets;


use common\essences\Film;
use common\essences\GenreList;
use common\essences\Human;
use InvalidArgumentException;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class FullGenreListWidget extends Widget
{
    public $source;

    public function run()
    {
        $content = '';
        if ($this->source instanceof Film) {
            $genreList = GenreList::fromFilm($this->source);
        } else if ($this->source instanceof Human) {
            $genreList = GenreList::fromHuman($this->source);
        } else {
            throw new InvalidArgumentException('Неправильный источник для выборки жанров');
        }
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