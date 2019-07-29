<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 29.07.2019
 * Time: 9:14
 */

namespace common\widgets;


use Yii;
use yii\base\Widget;
use yii\bootstrap4\Modal;
use yii\helpers\Html;

class ActionButtonWidget extends Widget
{
    public $comment;
    /* @var $header string*/
    public $header;
    /* @var $hintMessage string*/
    public $hintMessage;
    /* @var $glyphicon string*/
    public $glyphIcon;
    /* @var $action string*/
    public $action;

    public function run()
    {
        $content = '';
        $title = Yii::t('yii', $this->hintMessage);
        $icon = Html::tag('span', '', ['class' => "fa fa-$this->glyphIcon"]);
        $link = Html::a($icon, null, [
            'title' => $title,
            'aria-label' => $title,
            'style' => '',
            'class' => 'h-100'
        ]);

        $content .= '   ';
        $content .= $this->render('@frontend/views/comment/modal', [
            'title' => $this->header,
            'link' => $link,
            'model' => $this->comment,
            'action' => $this->action??null
        ]);
        return $content;
    }
}