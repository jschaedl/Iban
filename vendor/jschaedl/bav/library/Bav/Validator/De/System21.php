<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System21 extends \Bav\Validator\IterationWeighted
{
    
    protected $weights = array(2, 1);

    protected function iterationStep()
    {
        $this->accumulator += Math::crossSum($this->number * $this->getWeight());
    }

    protected function getResult()
    {
        for ($result = $this->accumulator; $result >= 10; $result = Math::crossSum($result));
        $result = 10 - $result;
        return (string)$result === $this->getCheckNumber();
    }
}