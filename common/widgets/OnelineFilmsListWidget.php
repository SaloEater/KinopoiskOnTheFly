<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 28.07.2019
 * Time: 12:23
 */

namespace common\widgets;

use common\essences\Film;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\Widget;

class OnelineFilmsListWidget extends Widget
{
    public $films;

    public function run()
    {
        $content = '';
        $i = count($this->films);
        /* @var $film Film*/
        foreach ($this->films as $film) {
            $content .= Html::a($film->title,
                    Url::to(['/film/'.$film->id]), //TODO Контроллер для жанров
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