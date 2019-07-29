<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 28.07.2019
 * Time: 9:59
 */

namespace common\repositories;

use common\essences\MraaRating;

class MPAARatingRepository extends IRepository
{
    private $innerRecord;

    public function __construct(MraaRating $innerRecord)
    {
        $this->innerRecord = $innerRecord;
    }

    public function getById(int $id)
    {
        $rating = $this->_getBy($this->innerRecord, ['id' => $id]);

        return $rating;
    }
}