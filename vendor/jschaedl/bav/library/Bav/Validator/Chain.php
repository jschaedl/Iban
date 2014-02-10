<?php

namespace Bav\Validator;

class Chain extends Base
{
    
    protected $validators = array();
    protected $defaultValidators = array();
    protected $exceptionValidators = array();
    
    public function addValidator(Base $validator)
    {
        $this->validators[] = $validator;
    }
    
    protected function getResult()
    {

        foreach ($this->validators as $validator) {
            if (! $this->continueValidation($validator)) {
                return false;
            }
            if ($this->useValidator($validator) && $validator->isValid($this->account)) {
                return true;
            }
        
        }
        
        return false;
    }

    final protected function validate() {
    }
    
    /**
     * After each successless iteration step this method will be called and
     * should return if the iteration should stop and the account is invalid.
     *
     * @return bool
     */
    protected function continueValidation(Base $validator)
    {
        return true;
    }
    /**
     * Decide if you really want to use this validator
     *
     * @return bool
     */
    protected function useValidator(Base $validator)
    {
        return true;
    }
}