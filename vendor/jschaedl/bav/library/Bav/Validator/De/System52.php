<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System52 extends \Bav\Validator\IterationWeighted
{
    
    protected $weights = array(2, 4, 8, 5, 10, 9, 7, 3, 6, 1, 2, 4);
    protected $start = -1;
    protected $end = 0;
    protected $checknumberPosition = 5;
    protected $checknumberWeight = 0;
    protected $validator20;
    
    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validator20 = new System20($bankId);
    }
    
    public function isValid($account)
    {
        try {
            if (strlen($account) == 10 && $account{0} == 9) {
                return $this->validator20->isValid($account);
            }
            
            return parent::isValid($account);
                 
        } catch (\Exception $e) {
            return false;
        
        }
    }


    protected function iterationStep()
    {
        if ($this->position == $this->getEserChecknumberPosition()) {
            $this->checknumberWeight = $this->getWeight();
        
        } else {
            $this->accumulator += $this->number * $this->getWeight();
            
        }
    }
    
    
    protected function normalizeAccount($account, $size)
    {
        return $this->getEser8($account);
    }


    protected function getResult()
    {
        return 10 === ($this->accumulator % 11 + $this->checknumberWeight * $this->getEserChecknumber()) % 11;
    }
}