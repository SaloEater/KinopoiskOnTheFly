<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 29.07.2019
 * Time: 8:54
 */

namespace common\widgets;


use common\essences\Comment;
use common\repositories\CommentRepository;
use yii\base\Widget;

class RecursiveCommentsWidget extends Widget
{
    public $table_id;

    public $page_id;

    public $parent_id = null;

    public $nestedLevel = 0;

    public $user_id;

    public function run()
    {
        $content = '';

        /* @var $comments Comment[]*/
        $comments = \Yii::createObject(CommentRepository::class)->findByPageAndParent($this->table_id, $this->page_id, $this->parent_id);

        foreach ($comments as $comment) {
            $content .= CommentViewWidget::widget([
                'comment' => $comment,
                'nestedLevel' => $this->nestedLevel,
                'user_id' => $this->user_id
            ]);
            $content .= RecursiveCommentsWidget::widget([
               'table_id' => $this->table_id,
                'page_id' => $this->page_id,
                'parent_id' => $comment->id,
                'nestedLevel' => $this->nestedLevel>4?$this->nestedLevel:$this->nestedLevel+1,
                'user_id' => $this->user_id
            ]);
        }

        return $content;
    }
}