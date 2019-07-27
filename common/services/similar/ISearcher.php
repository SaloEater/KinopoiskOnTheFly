<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 26.07.2019
 * Time: 20:07
 */

namespace common\services\similar;


use yii\base\BaseObject;

abstract class ISearcher extends BaseObject
{
    abstract function search();

    abstract function uniqueId();
}