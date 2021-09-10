<?php


namespace App\Parser\Core\Services;


use Carbon\CarbonInterval;

class TimeService
{
    public static function completeTime(int $start, int $finish) : string
    {
        return CarbonInterval::seconds($finish - $start)
            ->cascade()
            ->forHumans(null, true);
    }

    public static function difference(int $oldTime, int $completeTime) : string
    {
        $sing = '';
        $diff = $oldTime - $completeTime;

        if ($diff < 0) $sing = '+';
        if ($diff > 0) $sing = '-';

        return $sing . CarbonInterval::seconds($diff)
        ->cascade()
        ->forHumans(null, true);
    }
}
