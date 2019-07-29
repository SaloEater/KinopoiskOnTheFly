<?php

namespace common\helpers;

use common\essences\Film;

class FilmHelper
{
    public static function mraaArrayForDropdown()
    {
        return [
          Film::RATING_G => 'G',
          Film::RATING_PG => 'PG',
          Film::RATING_PG13 => 'PG-13',
          Film::RATING_R => 'R',
          Film::RATING_NC17 => 'NC-17',
        ];
    }
}