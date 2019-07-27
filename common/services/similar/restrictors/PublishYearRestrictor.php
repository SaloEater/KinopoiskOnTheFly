<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 27.07.2019
 * Time: 13:05
 */

namespace common\services\similar\restrictors;

use common\essences\Film;

class PublishYearRestrictor extends IRestrictor
{
    public $year;

    private $dispersion = 10;

    public function isValid(Film $film) : bool
    {
        return abs($this->year-$film->publish_year) < $this->dispersion;
    }

    public function nextIteration()
    {
        $this->dispersion *= 1.5;
    }

}