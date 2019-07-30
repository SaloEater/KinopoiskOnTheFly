<?php

use common\essences\Film;
use common\essences\Genre;

$film = Film::findOne(['title' => 'Test title']);
$genre = Genre::findOne(['name' => 'Test genre']);

return [
    [
        'film_id' => $film->id,
        'genre_id' => $genre->id
    ]
];