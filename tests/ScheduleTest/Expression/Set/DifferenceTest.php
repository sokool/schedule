<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 27/08/14
 * Time: 15:56
 */

namespace Schedule\test\Expression\Set;

use Schedule\Expression\Set\Difference;
use ScheduleTest\Asset\ScheduleEvent;

class DifferenceTest extends \PHPUnit_Framework_TestCase
{
    public function testDifference()
    {
        (new Difference)->includes(new \DateTime, new ScheduleEvent);
    }
} 