<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 28.07.2019
 * Time: 14:05
 */

namespace common\helpers;


use common\essences\Human;
use common\repositories\ActorRepository;
use Yii;

class ActorHelper
{
    public static function prepareArrayForDropdown()
    {
        return array_reduce(Yii::createObject(ActorRepository::class)->findAll(), function(array $carry, Human $actor) {
            $carry[$actor->id] = $actor->name;
            return $carry;
        }, []);
    }
}