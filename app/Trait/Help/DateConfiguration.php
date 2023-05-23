<?php

namespace App\Trait\Help;
use DateTime;

trait DateConfiguration{

    public function dateDiff(string $start = 'now', string $end, string $format = '%R%a') : string{
        $datesIff = $start === 'now' ? (new DateTime('now'))->format('Y-m-d H:i:s') : $start;
        $date_one = date_create($datesIff);
        $date_two = date_create($end);
        $convert  = date_diff($date_one, $date_two);
        return $convert->format($format);
    }
}