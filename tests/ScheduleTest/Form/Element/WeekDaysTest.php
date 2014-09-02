<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 27/08/14
 * Time: 16:00
 */

namespace ScheduleTest\Form\Element;

use Schedule\Calendar\Weeks;
use Schedule\Form\Element\WeekDays as WeekDaysElement;

class WeekDaysTest extends \PHPUnit_Framework_TestCase
{
    public function testWeekDaysElement()
    {
        $element = new WeekDaysElement;
        $element->setValue(Weeks::MONDAY | Weeks::FRIDAY);

        $out = $element->getValue();

        $this->assertTrue($out[0] == Weeks::MONDAY);
        $this->assertTrue($out[4] == Weeks::FRIDAY);


        $element->setOptions(['defaultSelection' => Weeks::WEDNESDAY]);

        $this->assertTrue($element->getValue()[2] == Weeks::WEDNESDAY);


    }
} 