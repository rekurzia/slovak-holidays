<?php

namespace Rekurzia;

class EasterDate
{
    /**
     * Lilius / Clavius algorithm to compute Easter date
     *
     * @link   https://en.wikipedia.org/wiki/Computus
     * @link   http://www.merlyn.demon.co.uk/estralgs.txt
     * @param  $year
     * @return int timestamp
     */
    public static function get($year)
    {
        $g = ($year % 19) + 1;
        $c = floor($year / 100) + 1;
        $x = floor(3 * $c / 4) - 12;
        $z = floor((8 * $c + 5) / 25) - 5;
        $d = floor(5 * $year / 4) - $x - 10;
        $e = (11 * $g + 20 + $z - $x) % 30;
        if ($e == 25 && $g > 11 || $e == 24) {
            $e++;
        }
        $n = 44 - $e;
        if ($n < 21) {
            $n = $n + 30;
        }
        $day = $n + 7 - (($d + $n) % 7);
        $month = 3;
        if ($day > 31) {
            $day = $day - 31;
            $month = 4;
        }

        return strtotime(sprintf("%4d-%02d-%02d", $year, $month, $day));
    }
}
