<?php

use common\essences\Film;
use common\essences\User;

$film = Film::findOne(['title' => 'Test title']);
$user = User::findByUsername('erau');

return [
    [
        'film_id' => $film->id,
        'user_id' => $user->id
    ]
];