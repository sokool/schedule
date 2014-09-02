<?php

namespace Schedule\test\Event;

use Schedule\Event\Event;
use Schedule\Calendar\Weeks;

/**
 * Class EventTest
 * @package Schedule\test\Event
 */
class EventTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test class
     */
    public function testClass()
    {
        $event = new Event('Test Event');

        $this->assertEquals('Test Event', $event->getName());
        $this->assertEquals(new Weeks(Weeks::SATURDAY | Weeks::SUNDAY), $event->getWeekDays());
        $this->assertEquals(new \DateTime('2014-08-01'), $event->getFromDate());
        $this->assertEquals(new \DateTime('2014-09-01'), $event->getToDate());

//        $event->setFromDate(new \DateTime('2014-09-01'));
//        $this->assertEquals(new \DateTime('2014-09-01'), $event->getFromDate());
    }
}
 