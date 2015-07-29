[![Build status](https://travis-ci.org/rekurzia/slovak-holidays.svg?branch=master)](https://travis-ci.org/rekurzia/slovak-holidays)

Slovak Holidays
===============

Simple PHP library/helper for getting Slovak holidays.

Installation
------------

```bash

composer require rekurzia/slovak-holidays

```

Usage
-----

Very easy, static:

```php

\Rekurzia\SlovakHolidays::getHolidays(); // for current year
\Rekurzia\SlovakHolidays::getHolidays(2014); // only for year
\Rekurzia\SlovakHolidays::getHolidays(2014, 8); // for year and month
\Rekurzia\SlovakHolidays::isTodayHoliday(); // date('Y-m-d')
\Rekurzia\SlovakHolidays::isDayHoliday(2015, 12, 24);

```

License
-------

This software is licensed under MIT License.
