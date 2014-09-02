<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 27/08/14
 * Time: 15:56
 */

namespace Schedule\test\Expression\Set;

use Schedule\Expression\Set\Union;
use ScheduleTest\Asset\ScheduleEvent;

class UnionTest extends \PHPUnit_Framework_TestCase
{
    public function testUnion() {
        (new Union)->includes(new \DateTime, new ScheduleEvent);
    }
}