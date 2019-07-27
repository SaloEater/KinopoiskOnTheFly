<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 27.07.2019
 * Time: 18:29
 */

namespace common\services\similar;


use common\essences\Human;
use common\repositories\ProducerRepository;

class HumanSearcher extends ISearcher
{
    /* @var $human Human*/
    public $human;

    public function search()
    {
        $filmsIDs = [];
        if ($this->human->isActor()) {

        } else if ($this->human->isProducer()) {
            $filmsIDs = \Yii::createObject(ProducerRepository::class)->getFilmIDsByID($this->human->id);
        } else {
            throw new \DomainException('Не определена профессия у человека');
        }
        return $filmsIDs;
    }

    public function uniqueId()
    {
        return 'human-'.$this->human->id;
    }
}