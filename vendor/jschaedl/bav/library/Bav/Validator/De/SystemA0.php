<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemA0 extends \Bav\Validator\IterationWeighted
{

    protected $weights = array(2, 4, 8, 5, 10, 0, 0, 0, 0);
    protected $modulo = 11;

    protected function iterationStep()
    {
        $this->accumulator += $this->number * $this->getWeight();
    }


    protected function getResult()
    {
        $result = $this->modulo - $this->accumulator % $this->modulo;
        $result = $result == $this->modulo
                ? 0
                : $result % 10;
        return substr($this->account, 0, 7) == '0000000' || (string)$result === $this->getChecknumber();
    }
    
}