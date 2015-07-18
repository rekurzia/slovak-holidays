<?php

/**
 * Slovak Holidays - Simple PHP library/helper for getting Slovak holidays
 *
 * Copyright (c) 2015 Vladimír Kriška
 * This software is licensed under MIT License.
 */

namespace Rekurzia;

class SlovakHolidays
{
	/** @var array */
	private static $fixedHolidays = [
		'01-01' => 'Deň vzniku Slovenskej republiky',
		'01-06' => 'Zjavenie Pána (Traja králi)',

		'05-01' => 'Sviatok práce',
		'05-08' => 'Deň víťazstva nad fašizmom',

		'07-05' => 'Sviatok svätého Cyrila a Metoda',

		'08-29' => 'Výročie SNP',

		'09-01' => 'Deň Ústavy Slovenskej republiky',
		'09-15' => 'Sedembolestná Panna Mária',

		'11-01' => 'Sviatok všetkých svätých',
		'11-17' => 'Deň boja za slobodu a demokraciu',

		'12-24' => 'Štedrý deň',
		'12-25' => 'Prvý sviatok vianočný',
		'12-26' => 'Druhý sviatok vianočný',
	];

	/** @var array */
	private static $easterHolidays = [
		'friday' => 'Veľký piatok',
		'monday' => 'Veľkonočný pondelok'
	];

	/**
	 * Constructor to disable instantiation
	 * @throws SlovakHolidaysException
	 */
	public function __construct()
	{
		throw new SlovakHolidaysException('Class cannot be instantiated');
	}

	/**
	 * Gets holidays for specified year
	 * @param int
	 * @return array
	 */
	public static function getHolidays($year = null)
	{
		$year = ($year === null ? date('Y') : $year);
		$easterSunday = (new \DateTime)->setTimestamp(easter_date($year));

		$holidays = [
			$easterSunday->sub(new \DateInterval('P2D'))->format('Y-m-d') => self::$easterHolidays['friday'],
			$easterSunday->add(new \DateInterval('P3D'))->format('Y-m-d') => self::$easterHolidays['monday'],
		];

		foreach (self::$fixedHolidays as $key => $holiday) {
			$holidays[$year . '-' . $key] = $holiday;
		}

		ksort($holidays);

		return $holidays;
	}

	/**
	 * Gets holiday for specified year and month
	 * @param int
	 * @param int
	 * @return array
	 * @throws SlovakHolidaysException
	 */
	public static function getHolidaysForYearAndMonth($year, $month)
	{
		if (!checkdate($month, 1, $year)) {
			throw new SlovakHolidaysException('Invalid input year or month');
		}

		$holidays = [];

		foreach (self::getHolidays($year) as $key => $holiday) {
			if (substr($key, 0, 7) === sprintf("%4d-%02d", $year, $month)) {
				$holidays[$key] = $holiday;
			}
		}

		return $holidays;
	}

	/**
	 * Returns if day is holiday
	 * @param int
	 * @param int
	 * @param int
	 * @return bool
	 * @throws SlovakHolidaysException
	 */
	public static function isDayHoliday($year, $month, $day)
	{
		if (!checkdate($month, $day, $year)) {
			throw new SlovakHolidaysException('Invalid input year, month or day');
		}

		$isHoliday = false;

		foreach (self::getHolidays($year) as $key => $holiday) {
			if ($key === sprintf("%4d-%02d-%02d", $year, $month, $day)) {
				$isHoliday = true;
				break;
			}
		}

		return $isHoliday;
	}

	/**
	 * Returns if today is holiday
	 * @return bool
	 * @throws SlovakHolidaysException
	 */
	public static function isTodayHoliday()
	{
		return self::isDayHoliday(date('Y'), date('m'), date('d'));
	}
}

class SlovakHolidaysException extends \Exception
{
}