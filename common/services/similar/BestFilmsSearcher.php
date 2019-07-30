<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 27.07.2019
 * Time: 18:29
 */

namespace common\services\similar;


use common\essences\Human;
use common\repositories\FilmRepository;
use Yii;

class BestFilmsSearcher extends ISearcher
{
    /* @var $human Human*/
    public $human;

    public $maximum = 5;

    public function search()
    {
        $filmsIDs = Yii::createObject(FilmRepository::class)->getTopIDsByHuman($this->human, $this->maximum);
        return array_map(function ($item) {
            return $item['id'];
        }, $filmsIDs);
    }

    public function uniqueId()
    {
        return 'best-films-'.$this->human->id;
    }
}