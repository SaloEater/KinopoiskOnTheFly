<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 29.07.2019
 * Time: 8:57
 */

namespace common\widgets;


use common\essences\Comment;
use http\Url;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class CommentViewWidget extends Widget
{
    public $paddingValue = 15;

    public $nestedLevel;

    /* @var $comment Comment*/
    public $comment;

    public $user_id;

    public function run()
    {
        $content = $this->comment->user->username;
        if ($this->user_id) {
            $controls = '';
            if ($this->user_id == $this->comment->user_id && !$this->comment->disabled) {
                $controls .= ActionButtonWidget::widget([
                    'comment' => $this->comment,
                    'header' => 'Изменить комментарий',
                    'hintMessage'=> 'Изменить',
                    'action' => \yii\helpers\Url::to(['/comment/update', 'id' => $this->comment->id]),
                    'glyphIcon' => 'pencil'
                ]);

                $deleteTitle = Yii::t('yii', 'Удалить');
                $deleteIcon = Html::tag('span', '', ['class' => "fa fa-trash"]);
                $controls .=  Html::a($deleteIcon, \yii\helpers\Url::to(['/comment/delete', 'id' => $this->comment->id]), [
                    'title' => $deleteTitle,
                    'aria-label' => $deleteTitle,
                    'data-pjax' => '0',
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'class' => 'btn-sm btn-secondary ',
                ]);
            }

            $responseComment = new Comment();
            $responseComment->page_id = $this->comment->page_id;
            $responseComment->table_id = $this->comment->table_id;
            $responseComment->parent_id = $this->comment->id;
            $responseComment->user_id = $this->user_id;

            $controls .= ActionButtonWidget::widget([
                'comment' => $responseComment,
                'header' => 'Ответить на комментарий',
                'hintMessage'=> 'Ответить',
                'glyphIcon' => 'hand-o-down',
                'action' =>  \yii\helpers\Url::to(['/comment/create'])
            ]);

            $content .= Html::tag('div', $controls, [
               'style' => 'position:absolute; right:0.3em; bottom: 2.75em'
            ]);
        }

        $content .= "<br/>";
        $content.= Html::tag('div', $this->comment->content, [
            'style'=>
                'width: 100%; border: 2px solid black; padding: 5px 5px 5px 15px;'
        ]);

        $paddingLeft = $this->paddingValue * $this->nestedLevel;
        $content = Html::tag('div', $content, [
            'style' => 'width: 100%;position:relative;padding: 5px 5px 5px '.$paddingLeft.'px'
        ]);
        $content .= '</br>';
        return $content;
    }
}