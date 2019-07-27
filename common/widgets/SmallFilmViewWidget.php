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
        $content = Html::img($this->film->logo)
            . Html::a($this->film->logo,
                Url::to(['/film/', ['id' => $this->film->id]],
                [
                    'class' => 'display-4 text-center'
                ])
            );

        return $content;
    }
}