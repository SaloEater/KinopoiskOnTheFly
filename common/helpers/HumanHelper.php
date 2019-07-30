<?php

namespace common\helpers;

use common\essences\Human;

class HumanHelper
{
    public static function rolesArrayForDropdown()
    {
        return [
            Human::ROLE_PRODUCER => 'Режисёр',
            Human::ROLE_ACTOR => 'Актер',
        ];
    }

    public static function findAwardsFor(Human $human)
    {
        $films = [];
        if ($human->isActor()) {
            $films = $human->films;
        } else if ($human->isProducer()) {
            $films = $human->producedFilms;
        }

        $awards = [];
        foreach ($films as $film) {
            $awards = array_merge($film->awards, $awards);
        }
        $awards = array_unique($awards);

        return $awards;
    }
}