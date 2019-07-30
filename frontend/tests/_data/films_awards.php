<?php

use common\essences\Award;
use common\essences\Film;

$film = Film::findOne(['title' => 'Test title']);
$award = Award::findOne(['name' => 'Oskar']);

return [
    [
        'film_id' => $film->id,
        'award_id' => $award->id
    ]
];
