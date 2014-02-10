<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System84 extends \Bav\Validator\Chain
{
    
    protected $modeC;
    
    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->defaultValidators[] = new System33($bankId);
        $this->defaultValidators[0]->setWeights(array(2, 3, 4, 5, 6));
        $this->defaultValidators[0]->setEnd(4);
        
        $this->defaultValidators[] = new System84b($bankId);
        
        $this->exceptionValidators = System51::getExceptionValidators($bankId);
    }
    
    protected function init($account)
    {
        parent::init($account);
        
        $this->validators = substr($this->account, 2, 2) == 99
                          ? $this->exceptionValidators
                          : $this->defaultValidators;
    }
    
    protected function continueValidation(\Bav\Validator\Base $validator)
    {
        return $validator !== $this->modeC || $this->account{9} < 7;
    }
}