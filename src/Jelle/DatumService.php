<?php
namespace Jelle;

use Carbon\Carbon;

class DateService {
    public static function get($date)
    {
        if ($date == null)
            return '';

        Carbon::setLocale('nl');
        return Carbon::parse($date)->isoFormat('D MMMM Y');
    }
}