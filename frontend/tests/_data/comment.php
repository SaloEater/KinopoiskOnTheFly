<?php

use common\essences\Comment;
use common\essences\Film;
use common\essences\User;

$user = User::findByUsername('erau');
$film = Film::findOne(['title' => 'Test title']);

return [
    [
        'content' => 'Test comment',
        'table_id' => Comment::TABLE_FILM,
        'page_id' => $film->id,
        'user_id' => $user->id,
    ]
];