<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System90d extends \Bav\Validator\IterationWeighted
{

    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->setWeights(array(2, 3, 4, 5, 6));
        $this->setEnd(4);
    }
    
    protected function iterationStep()
    {
        $this->accumulator += $this->number * $this->getWeight();
    }


    protected function getResult()
    {
        $result = 9 - $this->accumulator % 9;
        $result = $result == 9
                ? 0
                : $result % 10;
        return $this->account{9} != 9 && (string)$result === $this->getChecknumber();
    }
    
}