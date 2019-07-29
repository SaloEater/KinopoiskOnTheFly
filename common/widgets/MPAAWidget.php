<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 28.07.2019
 * Time: 9:55
 */

namespace common\widgets;

use common\essences\MraaRating;
use common\repositories\MPAARatingRepository;
use yii\base\Widget;
use yii\helpers\Html;

class MPAAWidget extends Widget
{
    public $id;

    public function run()
    {
        /* @var $rating MraaRating*/
        $rating = \Yii::createObject(MPAARatingRepository::class)->getById($this->id);
        $content = Html::img($rating->icon, [
            'title' => $rating->tooltip,
            'data-toggle' => 'tooltip',
            'style' => 'cursor:pointer;'
        ]);

        return $content;
    }
}