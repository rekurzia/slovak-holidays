
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
\Rekurzia\SlovakHolidays::getHolidays(2014);
\Rekurzia\SlovakHolidays::getHolidaysForYearAndMonth(2014, 1);
\Rekurzia\SlovakHolidays::isTodayHoliday(); // date('Y-m-d')
\Rekurzia\SlovakHolidays::isDayHoliday(2015, 12, 24);

```

License
-------

This software is licensed under MIT License.
