<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 29.07.2019
 * Time: 8:41
 */

namespace common\widgets;


use common\essences\Comment;
use common\repositories\CommentRepository;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class CommentsWidget extends Widget
{

    public $table_id;

    public $page_id;

    public function run()
    {
        $content = 'Комментарии пользователей</br>';

        if (Yii::$app->user->isGuest) {
            $user_id = null;
        } else {
            $user_id = Yii::$app->user->id;
            $comment = new Comment();
            $comment->page_id = $this->page_id;
            $comment->table_id = $this->table_id;
            $comment->user_id = $user_id;

            $content .= $this->render('@frontend/views/comment/_form', [
                'model' => $comment,
                'action' => '/comment/create',
            ]);
        }

        $content .= RecursiveCommentsWidget::widget([
            'table_id' => $this->table_id,
            'page_id' => $this->page_id,
            'user_id' => $user_id
        ]);

        return Html::tag('div', $content, [
            'class' => 'pt-5'
        ]);
    }

}