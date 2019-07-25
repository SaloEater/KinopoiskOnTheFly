<?php

namespace common\essences;

use yii\base\Model;

class GenreList extends Model
{
    public $genres;

    public function rules()
    {
        return [
          [['genres'], 'safe']
        ];
    }

    public static function from(Film $film)
    {
        $genreList = new static();
        $genreList->genres = $film->genres;
        return $genreList;
    }
}