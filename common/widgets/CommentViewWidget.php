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
            if ($this->user_id == $this->comment->user_id) {
                $content .= ActionButtonWidget::widget([
                    'comment' => $this->comment,
                    'header' => 'Изменить комментарий',
                    'hintMessage'=> 'Изменить',
                    'action' => \yii\helpers\Url::to('/comment/update', ['id' => $this->comment->id]),
                    'glyphIcon' => 'pencil'
                ]);

                $deleteTitle = Yii::t('yii', 'Удалить');
                $deleteIcon = Html::tag('span', '', ['class' => "glyphicon glyphicon-trash"]);
                $content .=  Html::a($deleteIcon, ['/comment/delete', 'id' => $this->comment->id], [
                    'title' => $deleteTitle,
                    'aria-label' => $deleteTitle,
                    'data-pjax' => '0',
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'style' => ''
                ]);
            }

            $responseComment = new Comment();
            $responseComment->page_id = $this->comment->page_id;
            $responseComment->table_id = $this->comment->table_id;
            $responseComment->parent_id = $this->comment->id;
            $responseComment->user_id = $this->user_id;

            $content .= ActionButtonWidget::widget([
                'comment' => $responseComment,
                'header' => 'Ответить на комментарий',
                'hintMessage'=> 'Ответить',
                'glyphIcon' => 'import'
            ]);
        }

        $content .= "<br/>";
        $content.= Html::tag('div', $this->comment->content, [
            'style'=>
                'width: 100%; border: 2px solid black; padding: 5px 5px 5px 15px;'
        ]);

        $paddingLeft = $this->paddingValue * $this->nestedLevel;
        $content = Html::tag('div', $content, [
            'style' => "width: 100%;position:relative;padding: 5px 5px 5px $paddingLeft"
        ]);
        $content .= '</br>';
        return $content;
    }
}