<?php

use common\essences\Film;
use common\essences\Human;

$producer = Human::findOne(['role_id' => Human::ROLE_PRODUCER]);

return [
    [
        'title' => 'Test title',
        'logo' => 'https://st.kp.yandex.net/images/film_iphone/iphone360_689.jpg',
        'rating' => '5',
        'producer_id' => $producer->id,
        'mraa_rating' => Film::RATING_G
    ],
    [
        'title' => 'Test title 2',
        'logo' => 'https://st.kp.yandex.net/images/film_iphone/iphone360_689.jpg',
        'rating' => '5',
        'producer_id' => $producer->id,
        'mraa_rating' => Film::RATING_G
    ]
];
