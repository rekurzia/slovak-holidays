<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/Rekurzia/SlovakHolidays/Holidays.php';
require __DIR__ . '/../src/Rekurzia/SlovakHolidays/EasterDate.php';
require __DIR__ . '/../src/Rekurzia/SlovakHolidays/Exception.php';

date_default_timezone_set('Europe/Bratislava');

Tester\Environment::setup();
