<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemD4 extends \Bav\Validator\Base
{

    protected $validator;
    protected $transformedAccount;
    
    const TRANSFORMATION = 428259;
    
    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validator = new System00($bankId);
        $this->validator->setNormalizedSize(10 + strlen(self::TRANSFORMATION));
    }
    
    protected function validate()
    {
        $this->transformedAccount = self::TRANSFORMATION.$this->account;
    }
    
    
    /**
     * @return bool
     */
    protected function getResult()
    {
        return $this->account{0} != 0
            && $this->validator->isValid($this->transformedAccount);
    }
    
}