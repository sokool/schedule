<?php
require_once __DIR__ . '/vendor/autoload.php';
use MintSoft\Schedule;
use MintSoft\Schedule\Expression\WeekDay as WeekDayExpression;
use MintSoft\Schedule\Expression\DateRange as DateRangeExpression;
use MintSoft\Schedule\Expression\TimeRange as TimeRangeExpression;
use MintSoft\Schedule\Expression\EveryGivenDay as EveryGivenDayExpression;
use MintSoft\Schedule\Expression\Set\Intersection as IntersectionExpression;

$metalConcert = new Schedule\Element(
    'Koncert Warszawa',
    new DateRangeExpression(
        new \DateTime('2015-08-18'),
        new \DateTime('2015-08-20')
    )
);

$dancingLesson = new Schedule\Element(
    'Nauka tańca',
    new IntersectionExpression([
        new WeekDayExpression([
            WeekDayExpression::MONDAY,
            WeekDayExpression::THURSDAY,
            WeekDayExpression::SATURDAY,
        ]),
        new TimeRangeExpression(new \DateTime('19:00'), new \DateTime('20:45')),
        new EveryGivenDayExpression(new \DateTime('2015-08-10'), 3),
    ])
);

$smtFootball = new Schedule\Element(
    'Piłka!!!!',
    new IntersectionExpression([
        new EveryGivenDayExpression(new \DateTime('2015-02-04'), 7),
        new TimeRangeExpression(new \DateTime('18:30'), new \DateTime('20:05'))
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
        new DateTime('2015-08-17'),
        new DateInterval('PT15M'),
        new DateTime('2015-08-23')
    )
);
//$hit = new \DateTime('2015-08-26 18:42');

$b = microtime(true);
//print_r($o);
echo PHP_EOL . 'TIME:' . round($b - $a, 6) . PHP_EOL;
