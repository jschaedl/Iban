<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System81 extends \Bav\Validator\Chain
{
    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->defaultValidators[] = new System32($bankId);
        $this->defaultValidators[0]->setWeights(array(2, 3, 4, 5, 6, 7));
        
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