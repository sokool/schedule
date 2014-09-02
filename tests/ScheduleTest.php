<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 25/08/14
 * Time: 15:10
 */

namespace Schedule\test;

use Schedule\Event\Event;
use Schedule\Expression\DateInRange;
use Schedule\Schedule;

class ScheduleTest extends \PHPUnit_Framework_TestCase
{
    public static function eventFactory()
    {
        $now            = new \DateTime();
        $eightDaysAhead = new \DateTime($now->format('Y-m-d') . '+8 days');

        $event = new Event('Example');
        $event->setStart($now);
        $event->setEnd($eightDaysAhead);

        return $event;
    }

    public function testIsOccurringEmpty()
    {
        $schedule   = new Schedule();
        $occurrence = $schedule->isOccurring(new \DateTime);

        $this->assertEmpty($occurrence);
        $this->assertTrue(is_array($occurrence));
    }

    public function testIsOccurring()
    {
        $now            = new \DateTime();
        $eightDaysAhead = new \DateTime($now->format('Y-m-d') . '+8 days');
        $between        = new \DateTime($now->format('Y-m-d') . '+3 days');

        $e = new Event('Example');
        $e->setStart($now);
        $e->setEnd($eightDaysAhead);

        $schedule = new Schedule;
        $schedule->addEvent($e, new DateInRange);
        $occurrence = $schedule->isOccurring($between);

        $this->assertTrue(is_array($occurrence));
        $this->assertNotEmpty($occurrence);
        $this->assertSame(reset($occurrence), $e);
        $this->assertInstanceOf('\Schedule\Event\EventInterface', reset($occurrence));
    }

    public function testAddEvent()
    {
        $event    = self::eventFactory();
        $schedule = new Schedule();

        $this->assertInstanceOf('\Schedule\Schedule', $schedule->addEvent($event, new DateInRange()));
    }

    public function testBuildPeriod()
    {

        $start = new \DateTime();
        $end   = new \DateTime($start->format('Y-m-d') . '+8 days');

        $event = new Event('Dood');
        $event->setStart($start);
        $event->setEnd($end);

        $fifteenDaysBeforeStart = new \DateTime($start->format('Y-m-d') . ' -15 days');
        $nineDaysAfterEnd       = new \DateTime($end->format('Y-m-d') . ' +9 days');
        $period                 = new \DatePeriod($fifteenDaysBeforeStart, new \DateInterval('P1D'), $nineDaysAfterEnd);

        $schedule          = new Schedule();
        $eventsInIteration = $schedule->buildPeriod($period);

        $this->assertTrue(is_array($eventsInIteration));
        $this->assertEmpty($eventsInIteration);

        $schedule->addEvent($event, new DateInRange());
        $eventsInIteration = $schedule->buildPeriod($period, $format = 'Y-m-d');
        $lastElement       = $eventsInIteration[$end->format($format)];

        $this->assertEquals(count($eventsInIteration), 8);
        $this->assertEquals(count($lastElement), 1);
        $this->assertSame($event, $lastElement[0]);
    }

    public function testNextOccurrence()
    {
        (new Schedule())->nextOccurrence(new \DateTime());
    }
}