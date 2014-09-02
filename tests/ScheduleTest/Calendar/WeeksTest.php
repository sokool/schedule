<?php

namespace Schedule\test\Calendar;

use Schedule\Calendar\Weeks;

/**
 * Class WeeksTest
 * @package Schedule\test\Calendar
 */
class WeeksTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider daysPhpToBinaryProvider
     * @param $expectedBinary
     * @param $dayNumber
     */
    public function testPhpToBinary($expectedBinary, $dayNumber)
    {
        $weeks = new Weeks();

        $this->assertEquals($expectedBinary, $weeks->phpToBinary($dayNumber));
    }

    /**
     * @dataProvider weeksProvider
     * @param $expectedValue
     * @param $weeks
     */
    public function testGetValue($expectedValue, Weeks $weeks)
    {
        $this->assertEquals($expectedValue, $weeks->getValue());
    }

    /**
     * @dataProvider weeksCoveredProvider
     * @param $expectedValue
     * @param $weeks
     */
    public function testIsCovered($expectedValue, Weeks $weeks)
    {
        $this->assertTrue($weeks->isCovered($expectedValue));
    }

    /**
     * @dataProvider weeksNotCoveredProvider
     * @param $expectedValue
     * @param $weeks
     */
    public function testIsNotCovered($expectedValue, Weeks $weeks)
    {
        $this->assertFalse($weeks->isCovered($expectedValue));
    }

    /**
     * @dataProvider weeksContainProvider
     * @param $expectedValue
     * @param $weeks
     */
    public function testIsContain($expectedValue, Weeks $weeks)
    {
        $this->assertTrue($weeks->isContain($expectedValue));
    }

    /**
     * @dataProvider weeksNotContainProvider
     * @param $expectedValue
     * @param $weeks
     */
    public function testNotContain($expectedValue, Weeks $weeks)
    {
        $this->assertFalse($weeks->isContain($expectedValue));
    }

    /**
     * Test to string method
     * @dataProvider weeksToPhpArrayProvider
     * @param $expectedValue
     * @param $weeks
     */
    public function testToPhpArray($expectedValue, Weeks $weeks)
    {
        $this->assertEquals($expectedValue, $weeks->toPHPArray());
    }

    /**
     * Test to string method
     */
    public function testToString()
    {
        $this->assertTrue(is_string((new Weeks([Weeks::SUNDAY, Weeks::FRIDAY]))->__toString()));
    }

    /**
     * ADDITIONAL DATA PROVIDER METHOD
     * @return array
     */
    public function daysPhpToBinaryProvider()
    {
        return [
            [Weeks::SUNDAY, 0],
            [Weeks::MONDAY, 1],
            [Weeks::TUESDAY, 2],
            [Weeks::WEDNESDAY, 3],
            [Weeks::THURSDAY, 4],
            [Weeks::FRIDAY, 5],
            [Weeks::SATURDAY, 6],
        ];
    }

    /**
     * ADDITIONAL DATA PROVIDER METHOD
     * @return array
     */
    public function weeksProvider()
    {
        return [
            [127, new Weeks()],
            [1, new Weeks(Weeks::MONDAY)],
            [2, new Weeks(Weeks::TUESDAY)],
            [4, new Weeks(Weeks::WEDNESDAY)],
            [8, new Weeks(Weeks::THURSDAY)],
            [16, new Weeks(Weeks::FRIDAY)],
            [32, new Weeks(Weeks::SATURDAY)],
            [64, new Weeks(Weeks::SUNDAY)],
            [80, new Weeks([Weeks::SUNDAY, Weeks::FRIDAY])],
        ];
    }

    /**
     * ADDITIONAL DATA PROVIDER METHOD
     * @return array
     */
    public function weeksCoveredProvider()
    {
        return [
            [new Weeks(), new Weeks()],
            [new Weeks(Weeks::MONDAY), new Weeks(Weeks::MONDAY)],
            [new Weeks([Weeks::SUNDAY, Weeks::FRIDAY]), new Weeks([Weeks::SUNDAY, Weeks::FRIDAY])],
        ];
    }

    /**
     * ADDITIONAL DATA PROVIDER METHOD
     * @return array
     */
    public function weeksNotCoveredProvider()
    {
        return [
            [new Weeks(Weeks::MONDAY), new Weeks()],
            [new Weeks(Weeks::FRIDAY), new Weeks(Weeks::MONDAY)],
            [new Weeks([Weeks::SUNDAY, Weeks::MONDAY]), new Weeks([Weeks::SUNDAY, Weeks::FRIDAY])],
        ];
    }

    /**
     * ADDITIONAL DATA PROVIDER METHOD
     * @return array
     */
    public function weeksContainProvider()
    {
        return [
            [new Weeks(Weeks::MONDAY), new Weeks([Weeks::SUNDAY, Weeks::MONDAY])],
            [new Weeks(Weeks::FRIDAY), new Weeks()],
            [new Weeks(Weeks::SUNDAY), new Weeks([Weeks::SUNDAY, Weeks::FRIDAY])],
        ];
    }

    /**
     * ADDITIONAL DATA PROVIDER METHOD
     * @return array
     */
    public function weeksNotContainProvider()
    {
        return [
            [new Weeks(Weeks::MONDAY), new Weeks([Weeks::SUNDAY])],
            [new Weeks(Weeks::SUNDAY), new Weeks([Weeks::FRIDAY])],
        ];
    }

    /**
     * ADDITIONAL DATA PROVIDER METHOD
     * @return array
     */
    public function weeksToPhpArrayProvider()
    {
        return [
            [['0' => 'Sun', '1' => 'Mon'], new Weeks([Weeks::SUNDAY, Weeks::MONDAY])],
            [['4' => 'Thu', '1' => 'Mon'], new Weeks([Weeks::THURSDAY, Weeks::MONDAY])],
            [['5' => 'Fri'], new Weeks([Weeks::FRIDAY])],
        ];
    }


}
 