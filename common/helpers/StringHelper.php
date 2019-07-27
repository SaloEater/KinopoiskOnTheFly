<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 27.07.2019
 * Time: 20:40
 */

namespace common\helpers;


class StringHelper
{
    public static function ucfirst($str, $lowerEnd = false, $encoding = 'UTF-8')
    {
        $firstLetter = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding);
        if ($lowerEnd) {
            $strEnd = mb_strtolower(mb_substr($str, 1, mb_strlen($str, $encoding), $encoding), $encoding);
        } else {
            $strEnd = mb_substr($str, 1, mb_strlen($str, $encoding), $encoding);
        }
        return $firstLetter.$strEnd;
    }
}