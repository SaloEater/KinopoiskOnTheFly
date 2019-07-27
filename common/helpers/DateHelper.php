<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 27.07.2019
 * Time: 21:28
 */

namespace common\helpers;


class DateHelper
{
    private static $_monthsList = array(
        ".01." => "января",
        ".02." => "февраля",
        ".03." => "марта",
        ".04." => "апреля",
        ".05." => "мая",
        ".06." => "июня",
        ".07." => "июля",
        ".08." => "августа",
        ".09." => "сентября",
        ".10." => "октября",
        ".11." => "ноября",
        ".12." => "декабря"
    );

    public static function dateString(string $dateString)
    {
        $timestamp = strtotime($dateString);
        $date = date("d.m.Y", $timestamp);
        $_mD = date(".m."); //для замены
        $currentDate = str_replace($_mD, " ".self::$_monthsList[$_mD]." ", $date);
        return $currentDate;
    }
}