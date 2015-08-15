<?php

namespace MintSoft\Schedule\Calendar;

interface CalendarInterface
{
    const
        MONDAY      = 0b0000001,
        TUESDAY     = 0b0000010,
        WEDNESDAY   = 0b0000100,
        THURSDAY    = 0b0001000,
        FRIDAY      = 0b0010000,
        SATURDAY    = 0b0100000,
        SUNDAY      = 0b1000000;

    const
        JANUARY     = 0b000000000001,
        FEBRUARY    = 0b000000000010,
        MARCH       = 0b000000000100,
        APRIL       = 0b000000001000,
        MAY         = 0b000000010000,
        JUNE        = 0b000000100000,
        JULY        = 0b000001000000,
        AUGUST      = 0b000010000000,
        SEPTEMBER   = 0b000100000000,
        OCTOBER     = 0b001000000000,
        NOVEMBER    = 0b010000000000,
        DECEMBER    = 0b100000000000;
}
