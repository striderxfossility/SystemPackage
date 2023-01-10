<?php
namespace Jelle\Strider;

use Carbon\Carbon;

class DateService {
    public static function get($date)
    {
        if ($date == null)
            return '';

        Carbon::setLocale('nl');
        return Carbon::parse($date)->isoFormat('D MMMM Y');
    }

    public static function weekYear($date)
    {
        return self::year($date) . self::week($date);
    }

    public static function today()
    {
        Carbon::setLocale('nl');
        return Carbon::today()->isoFormat('D MMMM Y');
    }

    public static function addDays($days = 0)
    {
        Carbon::setLocale('nl');
        return Carbon::parse('today')->addDays($days)->isoFormat('D MMMM Y');
    }

    public static function week($date)
    {
        if ($date == null)
            $date = date("Y-m-d");

        Carbon::setLocale('nl');

        return str_pad(Carbon::createFromFormat('Y-m-d', $date)->weekOfYear, 2, '0', STR_PAD_LEFT);
    }

    public static function year($date)
    {
        if ($date == null)
            $date = date("Y-m-d");

        Carbon::setLocale('nl');

        return Carbon::createFromFormat('Y-m-d', $date)->year;
    }

    public static function addMonth($date = null)
    {
        Carbon::setLocale('nl');

        if($date == null)
            return Carbon::parse('today')->addMonth()->isoFormat('D MMMM Y');

        return Carbon::parse($date)->addMonth()->isoFormat('D MMMM Y');
    }
}