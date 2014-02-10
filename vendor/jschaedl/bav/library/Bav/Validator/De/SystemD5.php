<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemD5 extends \Bav\Validator\Base
{

    protected $validator;
    protected $validator1;

    protected $validatorChain;

    
    public function __construct($bankId)
    {
        parent::__construct($bankId);
        
        $this->validator1 = new System06($bankId);
        $this->validator1->setWeights(array(2, 3, 4, 5, 6, 7, 8, 0, 0));
        $validator2 = new System06($bankId);
        $validator2->setWeights(array(2, 3, 4, 5, 6, 7, 0, 0, 0));
        $validator3 = new System06($bankId);
        $validator3->setWeights(array(2, 3, 4, 5, 6, 7, 0, 0, 0));
        $validator3->setModulo(7);
        $validator4 = new System06($bankId);
        $validator4->setWeights(array(2, 3, 4, 5, 6, 7, 0, 0, 0));
        $validator4->setModulo(10);
        
        $this->validatorChain = new \Bav\Validator\Chain($bankId);
        $this->validatorChain->addValidator($validator2);
        $this->validatorChain->addValidator($validator3);
        $this->validatorChain->addValidator($validator4);
        
    }
    
    /**
     * Uses the validator
     *
     * @return bool
     */
    protected function getResult()
    {
        return $this->validator->isValid($this->account);
    }


    /**
     * decide which validators are used
     *
     * @return void
     */
    protected function validate()
    {
        $this->validator
            = substr($this->account, 2, 2) == 99
            ? $this->validator1
            : $this->validatorChain;
    }
    
}