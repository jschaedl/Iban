<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System90c extends \Bav\Validator\IterationWeighted
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
        $result = 7 - $this->accumulator % 7;
        $result = $result == 7
                ? 0
                : $result % 10;
        return $this->account{9} < 7 && (string)$result === $this->getChecknumber();
    }
    
}