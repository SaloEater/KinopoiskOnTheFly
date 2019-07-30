<?php


namespace common\essences;


use yii\base\Model;

class AwardList extends Model
{
    public $awards = [];

    public function rules()
    {
        return [
            [['awards'], 'safe']
        ];
    }

    public static function fromFilm(Film $film)
    {
        $awardList = new static();
        $awardList->awards = $film->awards;
        return $awardList;
    }
}