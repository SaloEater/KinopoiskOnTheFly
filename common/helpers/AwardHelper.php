<?php


namespace common\helpers;



use common\essences\Award;
use common\repositories\AwardRepository;
use Yii;

class AwardHelper
{
    public static function prepareArrayForDropdown()
    {
        return array_reduce(Yii::createObject(AwardRepository::class)->findAll(), function(array $carry, Award $award) {
            $carry[$award->id] = $award->name;
            return $carry;
        }, []);
    }
}