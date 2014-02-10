<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System30 extends System00
{
    
    protected $weights = array(2, 0, 0, 0, 0, 1, 2, 1, 2);
    protected $start = 0;
    protected $end = -2;
    
    protected function iterationStep()
    {
        $this->accumulator += $this->number * $this->getWeight();
    }

}