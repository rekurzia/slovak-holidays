<?php

require __DIR__ . '/bootstrap.php';

use Tester\Assert;
use Rekurzia\SlovakHolidays\Holidays as SlovakHolidays;
use Rekurzia\SlovakHolidays\Exception as SlovakHolidaysException;

Assert::same(true, SlovakHolidays::isDayHoliday(2018, 10, 30));
Assert::same(false, SlovakHolidays::isDayHoliday(2017, 10, 30));
Assert::same([
	'2018-01-01',
	'2018-01-06',
	'2018-03-30',
	'2018-04-02',
	'2018-05-01',
	'2018-05-08',
	'2018-07-05',
	'2018-08-29',
	'2018-09-01',
	'2018-09-15',
	'2018-10-30',
	'2018-11-01',
	'2018-11-17',
	'2018-12-24',
	'2018-12-25',
	'2018-12-26',
], array_keys(SlovakHolidays::getHolidays(2018)));

Assert::exception(function() {
	new SlovakHolidays;
}, SlovakHolidaysException::class, 'Class cannot be instantiated');

Assert::exception(function() {
	SlovakHolidays::getHolidays(2015, 13);
}, SlovakHolidaysException::class, 'Invalid input year or month');

Assert::exception(function() {
	SlovakHolidays::isDayHoliday(2015, 12, 32);
}, SlovakHolidaysException::class, 'Invalid input year, month or day');

Assert::same([
	'2015-01-01',
	'2015-01-06',
	'2015-04-03',
	'2015-04-06',
	'2015-05-01',
	'2015-05-08',
	'2015-07-05',
	'2015-08-29',
	'2015-09-01',
	'2015-09-15',
	'2015-11-01',
	'2015-11-17',
	'2015-12-24',
	'2015-12-25',
	'2015-12-26',
], array_keys(SlovakHolidays::getHolidays(2015)));

Assert::same([
	'2015-04-03',
	'2015-04-06',
], array_keys(SlovakHolidays::getHolidays(2015, 4)));

Assert::same(false, SlovakHolidays::isDayHoliday(2015, 01, 02));
Assert::same(false, SlovakHolidays::isDayHoliday(2015, 12, 23));

Assert::same(true, SlovakHolidays::isDayHoliday(2015, 04, 03));
Assert::same(true, SlovakHolidays::isDayHoliday(2015, 04, 06));

Assert::same([
	'2014-01-01',
	'2014-01-06',
	'2014-04-18',
	'2014-04-21',
	'2014-05-01',
	'2014-05-08',
	'2014-07-05',
	'2014-08-29',
	'2014-09-01',
	'2014-09-15',
	'2014-11-01',
	'2014-11-17',
	'2014-12-24',
	'2014-12-25',
	'2014-12-26',
], array_keys(SlovakHolidays::getHolidays(2014)));

Assert::same([
	'2014-04-18',
	'2014-04-21',
], array_keys(SlovakHolidays::getHolidays(2014, 4)));

Assert::same(false, SlovakHolidays::isDayHoliday(2014, 03, 30));
Assert::same(false, SlovakHolidays::isDayHoliday(2014, 10, 02));

Assert::same(true, SlovakHolidays::isDayHoliday(2014, 04, 18));
Assert::same(true, SlovakHolidays::isDayHoliday(2014, 04, 21));

Assert::same([
	'2013-01-01',
	'2013-01-06',
	'2013-03-29',
	'2013-04-01',
	'2013-05-01',
	'2013-05-08',
	'2013-07-05',
	'2013-08-29',
	'2013-09-01',
	'2013-09-15',
	'2013-11-01',
	'2013-11-17',
	'2013-12-24',
	'2013-12-25',
	'2013-12-26',
], array_keys(SlovakHolidays::getHolidays(2013)));

Assert::same([
	'2013-03-29',
], array_keys(SlovakHolidays::getHolidays(2013, 3)));

Assert::same([
	'2013-04-01',
], array_keys(SlovakHolidays::getHolidays(2013, 4)));

Assert::same(false, SlovakHolidays::isDayHoliday(2013, 02, 28));
Assert::same(false, SlovakHolidays::isDayHoliday(2013, 07, 06));

Assert::same(true, SlovakHolidays::isDayHoliday(2013, 03, 29));
Assert::same(true, SlovakHolidays::isDayHoliday(2013, 04, 01));
