<?php

namespace common\services;

use common\repositories\CommentRepository;

class CommentService
{
    private $comments;

    public function __construct(CommentRepository $comments)
    {
        $this->comments = $comments;
    }

    public function fakeDelete(\common\essences\Comment $comment)
    {
        $comment->content = 'Сообщение удалено...';
        $comment->disabled = true;
        $this->comments->save($comment);
    }
}