<?php
require_once __DIR__ . '/vendor/autoload.php';
use MintSoft\Schedule;
use MintSoft\Schedule\Expression\WeekDay as WeekDayExp;
use MintSoft\Schedule\Expression\DateRange as DateRangeExp;
use MintSoft\Schedule\Expression\TimeRange as TimeRangeExp;
use MintSoft\Schedule\Expression\EeachDay as EeachDayExp;
use MintSoft\Schedule\Expression\Interpreter;
use MintSoft\Schedule\Calendar\CalendarInterface as Calendar;

$metalConcert = new Schedule\Element(
    'Koncert Warszawa',
    new DateRangeExp(
        new \DateTime('2015-08-18'),
        new \DateTime('2015-08-20')
    )
);

$dancingLesson = new Schedule\Element(
    'Nauka tańca',
    new Interpreter\Intersection([
        new WeekDayExp([Calendar::MONDAY, Calendar::FRIDAY, Calendar::SATURDAY]),
        new TimeRangeExp(new \DateTime('19:00'), new \DateTime('20:45')),
        new EeachDayExp(new \DateTime('2015-08-10'), 3),
    ])
);

$smtFootball = new Schedule\Element(
    'Piłka!!!!',
    new Interpreter\Intersection([
        new EeachDayExp(new \DateTime('2015-02-04'), 7),
        new TimeRangeExp(new \DateTime('18:30'), new \DateTime('20:05'))
    ])
);

$schedule = new Schedule\Schedule();
$schedule
    ->add($smtFootball)
    ->add($metalConcert)
    ->add($dancingLesson);

$a = microtime(true);

$o = $schedule->buildPeriod(
    new DatePeriod(
        new DateTime('2015-08-01 00:00:00'),
        new DateInterval('PT30M'),
        new DateTime('2015-08-01 23:59:59')
    )
);
//$hit = new \DateTime('2015-08-26 18:42');

$b = microtime(true);
//print_r($o);
echo PHP_EOL . 'TIME:' . round($b - $a, 6) . PHP_EOL;
