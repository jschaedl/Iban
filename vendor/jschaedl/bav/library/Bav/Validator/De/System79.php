<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System79 extends \Bav\Validator\Base
{
    
    protected $validator;
    protected $mode1;
    protected $mode2;
    
    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->mode1 = new System00($bankId);
        $this->mode2 = new System00($bankId);
        $this->mode2->setStart(-3);
        $this->mode2->setChecknumberPosition(-2);
    }
    
    protected function init($account)
    {
        parent::init($account);
        
        $this->validator = null;
    }
    
    protected function validate()
    {
        if (array_search($this->account{0}, array(1, 2, 9)) !== false) {
            $this->validator = $this->mode2;
        
        } elseif ($this->account{0} == 0) {
            $this->validator = null;
        
        } else {
            $this->validator = $this->mode1;
        
        }
    }
    
    /**
     * @return bool
     */
    protected function getResult()
    {
        return ! is_null($this->validator) && $this->validator->isValid($this->account);
    }

}