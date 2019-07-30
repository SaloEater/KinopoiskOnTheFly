<?php


namespace common\services\similar;


use common\essences\User;
use yii\helpers\ArrayHelper;

class UserFavoriteSearcher extends ISearcher
{
    /* @var $user User*/
    public $user;

    public function search()
    {
        $films = $this->user->films;

        return ArrayHelper::getColumn($films, 'id');
    }

    public function uniqueId()
    {
        return 'user-'.$this->user->id;
    }
}