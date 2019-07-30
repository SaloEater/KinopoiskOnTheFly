<?php


namespace common\fixtures;


use common\essences\Comment;
use yii\test\ActiveFixture;

class CommentFixture extends ActiveFixture
{
    public $modelClass = Comment::class;
    public $depends = [
        FilmFixture::class
    ];
}