<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 26/08/14
 * Time: 08:46
 */

namespace Schedule\test\Expression\Set;

use Faker\Provider\DateTime;
use Schedule\Calendar\Weeks;
use Schedule\Expression\DateInRange;
use Schedule\Expression\DayInWeek;
use Schedule\Expression\Set\Intersection;
use ScheduleTest\Asset\Expression\NoneExpressionSet;
use ScheduleTest\Asset\ScheduleEvent;

class IntersectionTest extends \PHPUnit_Framework_TestCase
{
    public function testIntersection()
    {
        $intersection = new Intersection;
        // Simple instance implementation
        $this->assertInstanceOf('Schedule\Expression\ExpressionInterface', $intersection);

        $event = new ScheduleEvent();
        $event->setFromDate(new \DateTime());
        $event->setToDate(new \DateTime('now +9 days'));
        $event->setWeekDays(new Weeks(Weeks::MONDAY | Weeks::FRIDAY));

        $includes = $intersection->includes(new \DateTime('now + 2 days'), $event);

        //No expressions in intersection, then FALSe
        $this->assertFalse($includes);

        $intersection->addExpression(new DateInRange());
        $includes = $intersection->includes(new \DateTime('now + 2 days'), $event);

        //Intersection has Date In Range expression, so Date now + 2 days is between NOW and NOW + 9 days :D
        $this->assertTrue($includes);

        $intersection->addExpression(new DayInWeek());
        $includes = $intersection->includes(new \DateTime('now wednesday'), $event);

        //Intersection has Date In Range and WeekDays (Monday and Friday) expression, so Date now + 2 days is between NOW and NOW + 9 days :D but Wednesday is not IN MONDAY OR FRIDAY.
        // Conclusion is  that INTERSECTION must return FALSE!
        $this->assertFalse($includes);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testIncludesException()
    {
        (new Intersection)->addExpression(new NoneExpressionSet)->includes(new \DateTime, new ScheduleEvent);
    }
} 