<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 28.07.2019
 * Time: 13:45
 */

namespace common\essences;


use yii\base\Model;

class ActorList extends Model
{
    public $actors = [];

    public function rules()
    {
        return [
            [['actors'], 'safe']
        ];
    }

    public static function fromFilm(Film $film)
    {
        $actorList = new static();
        $actorList->actors = $film->actors;
        return $actorList;
    }
}