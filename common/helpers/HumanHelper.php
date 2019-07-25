<?php

namespace common\helpers;

use common\essences\Human;

class HumanHelper
{
    public static function rolesArrayForDropdown()
    {
        return [
            Human::ROLE_PRODUCER => 'Продюсер',
            Human::ROLE_ACTOR => 'Актер',
        ];
    }
}