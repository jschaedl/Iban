<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemA8 extends \Bav\Validator\Chain
{

    protected $expectedValidators = array();
    
    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->defaultValidators[] = new System06($bankId);
        $this->defaultValidators[0]->setEnd(3);
        $this->defaultValidators[0]->setWeights(array(2, 3, 4, 5, 6, 7));
        
        $this->defaultValidators[] = new System00($bankId);
        $this->defaultValidators[1]->setEnd(3);
        $this->defaultValidators[1]->setWeights(array(2, 1));
        
        
        $this->exceptionValidators = System51::getExceptionValidators($bankId);
    }
    
    protected function init($account)
    {
        parent::init($account);
        
        $this->validators = $this->account{2} == 9
                          ? $this->exceptionValidators
                          : $this->defaultValidators;
    }
}