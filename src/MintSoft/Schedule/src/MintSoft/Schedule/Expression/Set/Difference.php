<?php

namespace MintSoft\Schedule\Expression\Set;

use MintSoft\Schedule\Expression\ExpressionInterface;

class Difference implements ExpressionInterface
{
    public function includes(\DateTime $date)
    {
    }
}