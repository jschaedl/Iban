<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System85 extends \Bav\Validator\Chain
{
    
    protected $modeC;
    
    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->defaultValidators[] = new System06($bankId);
        $this->defaultValidators[0]->setWeights(array(2, 3, 4, 5, 6, 7));
        $this->defaultValidators[0]->setEnd(3);
        
        $this->defaultValidators[] = new System33($bankId);
        $this->defaultValidators[1]->setWeights(array(2, 3, 4, 5, 6));
        $this->defaultValidators[1]->setEnd(4);
        
        $this->modeC = new System33($bankId);
        $this->defaultValidators[] = $this->modeC;
        $this->defaultValidators[2]->setWeights(array(2, 3, 4, 5, 6));
        $this->defaultValidators[2]->setEnd(4);
        $this->defaultValidators[2]->setModulo(7);
        
        $this->exceptionValidators[] = new System02($bankId);
        $this->exceptionValidators[0]->setWeights(array(2, 3, 4, 5, 6, 7, 8));
        $this->exceptionValidators[0]->setEnd(2);
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