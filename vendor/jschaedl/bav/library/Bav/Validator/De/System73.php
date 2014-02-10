<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System73 extends \Bav\Validator\Chain
{

    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->defaultValidators[] = new System00($bankId);
        $this->defaultValidators[0]->setEnd(3);
        
        $this->defaultValidators[] = new System00($bankId);
        $this->defaultValidators[1]->setWeights(array(2, 1));
        $this->defaultValidators[1]->setEnd(4);
        
        $this->defaultValidators[] = new System00($bankId);
        $this->defaultValidators[2]->setWeights(array(2, 1));
        $this->defaultValidators[2]->setModulo(7);
        $this->defaultValidators[2]->setEnd(4);
        
        $this->exceptionValidators = System51::getExceptionValidators($bankId);
    }
    
    /**
     */
    protected function init($account) {
        parent::init($account);
        
        if ($this->account{2} == 9) {
            $this->validators = $this->exceptionValidators;
        
        } else {
            $this->validators = $this->defaultValidators;
            
        }
    }
    
}