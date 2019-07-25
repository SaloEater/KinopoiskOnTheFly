<?php


namespace common\widgets;


use common\essences\Film;
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
        $genres = $this->film->genres;
        $additionalPart = '';
        if (count($genres) > 5) {
            array_slice($genres, 0, 5);
            $additionalPart = Html::tag('a', '...', [
                'url' => Url::to('')
            ]);
        }

        return $content;
    }
}