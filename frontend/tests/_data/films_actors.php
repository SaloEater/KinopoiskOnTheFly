<?php

use common\essences\Film;
use common\essences\Human;

$film = Film::findOne(['title' => 'Test title']);
$actor = Human::findOne(['role_id' => Human::ROLE_ACTOR]);

return [
    [
        'film_id' => $film->id,
        'actor_id' => $actor->id
    ]
];
