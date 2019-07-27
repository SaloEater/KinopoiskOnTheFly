<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 27.07.2019
 * Time: 14:06
 */

namespace common\services\similar\restrictors;

use common\essences\Film;
use common\repositories\FilmRepository;
use yii\base\BaseObject;

abstract class IRestrictor extends BaseObject
{
    abstract function isValid(Film $film);

    public function isValidWithID(int $filmId)
    {
        $film = \Yii::createObject(FilmRepository::class)->getById($filmId);
        return $this->isValid($film);
    }

    abstract function nextIteration();
}