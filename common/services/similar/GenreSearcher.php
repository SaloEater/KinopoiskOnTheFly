<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 27.07.2019
 * Time: 19:35
 */

namespace common\services\similar;


use common\essences\Genre;
use common\repositories\GenreRepository;
use yii\helpers\ArrayHelper;

class GenreSearcher extends ISearcher
{
    /* @var $genre Genre*/
    public $genre;

    public function search()
    {
        $filmIDs = ArrayHelper::getColumn($this->genre->films, 'id');
        return $filmIDs;
    }

    public function uniqueId()
    {
        return 'genre-'.$this->genre->id;
    }
}