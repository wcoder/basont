<?php

namespace Helpers;

class Helper
{

    /**
     * [convertMonthToRussianMonthNameSingle description]
     * @param  [string] $date [Date in DB format]
     * @return [string]       [Date in russian format]
     */
    public static function convertMonthToRussianMonthNameSingle($month)
    {
        switch ($month){
            case 1:  return 'январь';
            case 2:  return 'февраль';
            case 3:  return 'март';
            case 4:  return 'апрель';
            case 5:  return 'май';
            case 6:  return 'июнь';
            case 7:  return 'июль';
            case 8:  return 'август';
            case 9:  return 'сентябрь';
            case 10: return 'октябрь';
            case 11: return 'ноябрь';
            case 12: return 'декабрь';
            default: return '';
        }
    }

    public static function convertMonthToRussianMonthNameMany($month)
    {
        switch ($month){
            case 1:  return 'января';
            case 2:  return 'февраля';
            case 3:  return 'марта';
            case 4:  return 'апреля';
            case 5:  return 'мая';
            case 6:  return 'июня';
            case 7:  return 'июля';
            case 8:  return 'августа';
            case 9:  return 'сентября';
            case 10: return 'октября';
            case 11: return 'ноября';
            case 12: return 'декабря';
            default: return '';
        }
    }

    /**
     * @param $date
     * @return string
     */
    public static function convertDateToRussianDateFormat($date)
    {
        $d = date_parse($date);
        $m = self::convertMonthToRussianMonthNameMany($d['month']);
        return sprintf('%d %s %d в %d:%d', $d['day'], $m, $d['year'], $d['hour'], $d['minute']);
    }

}