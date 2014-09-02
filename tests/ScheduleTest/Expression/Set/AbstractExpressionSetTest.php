<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 26/08/14
 * Time: 08:48
 */

namespace ScheduleTest\Expression\Set;

use Schedule\Expression\DateInRange;
use ScheduleTest\Asset\Expression\NoneExpressionSet;
use ScheduleTest\Asset\ScheduleEvent;

class AbstractExpressionSetTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $expressionSet = new NoneExpressionSet;
        $this->assertInstanceOf('Schedule\Expression\ExpressionInterface', $expressionSet);
        $this->assertInstanceOf('Schedule\Expression\Set\ExpressionSet', $expressionSet);

        $expressionSet = new NoneExpressionSet([$dateInRange = new DateInRange]);
        $out           = $expressionSet->getExpressions()[get_class($dateInRange)];

        $this->assertSame($dateInRange, $out);
    }

    public function testSameExpressionsInside()
    {
        $dateInRangeA = new DateInRange;
        $dateInRangeB = new DateInRange;

        $expressionSet = (new NoneExpressionSet)
            ->addExpression($dateInRangeA)
            ->addExpression($dateInRangeB);

        $outExpressions = $expressionSet->getExpressions();

        $this->assertTrue(is_array($outExpressions));
        $this->assertEquals(count($outExpressions), 1);
        $this->assertSame($outExpressions[get_class($dateInRangeA)], $dateInRangeA);
    }
} 