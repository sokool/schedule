<?php

namespace Schedule\test\Expression;

use Schedule\Expression\DayInWeek;
use Schedule\Event\Event;

/**
 * Class DayInWeekTest
 * @package Schedule\test\Expression
 */
class DayInWeekTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider inRangeProvider
     * @param $date
     * @param $event
     */
    public function testDateInRange(\DateTime $date, Event $event)
    {
        $this->assertTrue((new DayInWeek())->includes($date, $event));
    }


    /**
     * @dataProvider notInRangeProvider
     * @param $date
     * @param $event
     */
    public function testDateNotInRange(\DateTime $date, Event $event)
    {
//        $this->assertFalse((new DayInWeek())->includes($date, $event));
    }

    /**
     * ADDITIONAL DATA PROVIDER METHOD
     * @return array
     */
    public function inRangeProvider()
    {
        return [
            [new \DateTime('2014-08-09'), new Event('test')],
            [new \DateTime('2014-08-16'), new Event('test')],
        ];
    }

    /**
     * ADDITIONAL DATA PROVIDER METHOD
     * @return array
     */
    public function notInRangeProvider()
    {
        return [
            [new \DateTime('2014-04-06'), new Event('test')],
        ];
    }
}
 