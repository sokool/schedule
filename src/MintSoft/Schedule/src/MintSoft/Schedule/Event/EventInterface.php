<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 20/08/14
 * Time: 09:17
 */

namespace Schedule\Event;

use Schedule\Calendar\Weeks;

/**
 * Interface EventInterface
 * @package Schedule\Event
 * @codeCoverageIgnore
 */
interface EventInterface
{
    /**
     * @return \DateTime
     */
    public function getFromDate();

    /**
     * @return \DateTime
     */
    public function getToDate();

    /**
     * @return Weeks
     */
    public function getWeekDays();
}