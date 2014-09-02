<?php

namespace Schedule\test\Expression;

use Schedule\Expression\DateInRange;
use Schedule\Event\Event;

/**
 * Class DateInRangeTest
 * @package Schedule\test\Expression
 */
class DateInRangeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider inRangeProvider
     * @param $date
     * @param $event
     */
    public function testDateInRange(\DateTime $date, Event $event)
    {
        $this->assertTrue((new DateInRange())->includes($date, $event));
    }


    /**
     * @dataProvider notInRangeProvider
     * @param $date
     * @param $event
     */
    public function testDateNotInRange(\DateTime $date, Event $event)
    {
        $this->assertFalse((new DateInRange())->includes($date, $event));
    }

    /**
     * ADDITIONAL DATA PROVIDER METHOD
     * @return array
     */
    public function inRangeProvider()
    {
        return [
            [new \DateTime('2014-08-02'), new Event('test')],
            [new \DateTime('2014-08-05'), new Event('test')],
            [new \DateTime('2014-08-15'), new Event('test')],
            [new \DateTime('2014-08-25'), new Event('test')]
        ];
    }

    /**
     * ADDITIONAL DATA PROVIDER METHOD
     * @return array
     */
    public function notInRangeProvider()
    {
        return [
            [new \DateTime('2014-03-02'), new Event('test')],
            [new \DateTime('2014-04-05'), new Event('test')],
            [new \DateTime('2014-12-15'), new Event('test')],
            [new \DateTime('2014-10-25'), new Event('test')]
        ];
    }
}
 