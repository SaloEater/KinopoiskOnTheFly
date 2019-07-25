<?php


namespace common\widgets;


use common\essences\Film;
use yii\base\Widget;
use yii\helpers\Html;

class SmallRatingWidget extends Widget
{
    /**
     * @var $film Film
     */
    public $film;

    public function run()
    {
        $content = Html::tag('h5', $this->film->rating, [
            'class' => 'font-weight-bold '
        ]);

        if($this->film->user_rating) {
            $content .= Html::tag('h6', '('.$this->film->user_rating.')', [
                'class' => 'font-weight-bold '
            ]);
        }

        return Html::tag('div', $content);
    }

}