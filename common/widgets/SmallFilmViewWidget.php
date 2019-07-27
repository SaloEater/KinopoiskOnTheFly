<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 27.07.2019
 * Time: 9:14
 */

namespace common\widgets;


use common\essences\Film;
use common\repositories\FilmRepository;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class SmallFilmViewWidget extends Widget
{
    /* @var $film Film*/
    public $film = null;

    public $filmId;

    public function init()
    {
        parent::init();
        if (!$this->film) {
            $this->film = \Yii::createObject(FilmRepository::class)->getById($this->filmId);
        }
    }

    public function run()
    {
        $content = Html::img($this->film->logo, [
            'class' => 'd-block image-holder mw-105'
            ])
            . Html::tag('div', $this->film->title,
                [
                    'class' => 'text-center d-block mw-105'
                ]
            );

        return Html::a($content, Url::to(['/film/'.$this->film->id]),
            [
                'class' => 'text-center d-block p-2'
            ]);
    }
}