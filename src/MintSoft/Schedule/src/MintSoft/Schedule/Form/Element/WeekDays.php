<?php
/**
 * Created by PhpStorm.
 * User: sokool
 * Date: 19/08/14
 * Time: 12:44
 */

namespace Schedule\Form\Element;

use Schedule\Calendar\Weeks;
use Zend\Form\Element\MultiCheckbox;
use Zend\Form\Element;
use Zend\Form\Exception;

class WeekDays extends MultiCheckbox
{
    protected $label = ' ';

    protected $labelOptions = [
        'disable_html_escape' => true
    ];

    protected $valueOptions = [
        ['value' => Weeks::MONDAY, "label" => "<span>Mon</span>"],
        ['value' => Weeks::TUESDAY, "label" => "<span>Tue</span>"],
        ['value' => Weeks::WEDNESDAY, "label" => "<span>Wed</span>"],
        ['value' => Weeks::THURSDAY, "label" => "<span>Thu</span>"],
        ['value' => Weeks::FRIDAY, "label" => "<span>Fri</span>"],
        ['value' => Weeks::SATURDAY, "label" => "<span>Sat</span>"],
        ['value' => Weeks::SUNDAY, "label" => "<span>Sun</span>"]
    ];

    public function setOptions($options)
    {
        if (array_key_exists('defaultSelection', $options)) {
            $this->setDefaultSelection($options['defaultSelection']);
        }

        return parent::setOptions($options);
    }

    public function setDefaultSelection($defaultSelection)
    {
        $this->setValue($defaultSelection);
    }

    public function setValue($value)
    {
        if (is_array($value)) {
            $value = array_sum($value);
        }

        $this->value = (string) $value;

        return $this;
    }

    public function getValue()
    {
        return [
            ($this->value & Weeks::MONDAY),
            ($this->value & Weeks::TUESDAY),
            ($this->value & Weeks::WEDNESDAY),
            ($this->value & Weeks::THURSDAY),
            ($this->value & Weeks::FRIDAY),
            ($this->value & Weeks::SATURDAY),
            ($this->value & Weeks::SUNDAY),
        ];
    }
}