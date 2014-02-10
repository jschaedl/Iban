<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System89 extends System06
{

    protected $validation10;
    protected $weights = array(2, 3, 4, 5, 6, 7, 8);
    
    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->setWeights(array(2, 3, 4, 5, 6, 7));
        $this->setEnd(3);
        
        $this->validator10 = new System10($bankId);
    }
    
    protected function iterationStep()
    {
        $this->accumulator += Math::crossSum($this->number * $this->getWeight());
    }
    
    
    public function isValid($account)
    {
        $length = strlen(ltrim($account, '0'));
        return (($length == 8 || $length == 9) && $this->validator10->isValid($account))
            || ($length == 7 && parent::isValid($account));
    }
    
}