<?php

require __DIR__ . '/bootstrap.php';

use Tester\Assert;
use Rekurzia\EasterDate;

for ($year = 1582; $year <= 10000; $year++) {
	Assert::same(EasterDate::get($year), getGaussEasterDate($year));
}

/**
 * Gauss algorithm to compute Easter date
 * @param $year
 * @return int timestamp
 */
function getGaussEasterDate($year)
{
	$a = $year % 19;
	$b = $year % 4;
	$c = $year % 7;

	$k = floor($year / 100);
	$p = floor((13 + 8 * $k) / 25);
	$q = floor($k / 4);

	$m = (15 - $p + $k - $q) % 30;
	$n = (4 + $k - $q) % 7;

	$d = (19 * $a + $m) % 30;
	$e = (2 * $b + 4 * $c + 6 * $d + $n) % 7;

	$month = 3;
	if (($day = (22 + $d + $e)) > 31) {
		$day = $d + $e - 9;
		$month = 4;
	}

	if ($month === 4 && $e === 6) {
		if ($d === 29 && $day === 26) {
			$day = 19;
		}
		else if ($d === 28 && ((11 * $m + 11) % 30) < 19 && $day === 25) {
			$day = 18;
		}
	}

	return strtotime(sprintf("%4d-%02d-%02d", $year, $month, $day));
}

