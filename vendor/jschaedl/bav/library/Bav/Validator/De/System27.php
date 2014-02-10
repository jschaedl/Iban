<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System27 extends \Bav\Validator\Transformation
{

    protected $validator00;
    
    
    public function __construct($bankId)
    {
        $this->validator00 = new System00($bankId);
        $this->setMatrix(
            array(
                array(0,1,5,9,3,7,4,8,2,6),
                array(0,1,7,6,9,8,3,2,5,4),
                array(0,1,8,4,6,2,9,5,7,3),
                array(0,1,2,3,4,5,6,7,8,9),
            )
        );
    }
    
    /**
     * @param string $account
     * @return bool
     */
    public function isValid($account)
    {
        return (int) $account <= 999999999
             ? $this->validator00->isValid($account)
             : parent::isValid($account);
    }
    /**
     * @return bool
     */
    protected function getResult()
    {
        $result = (10 - ($this->accumulator % 10)) % 10;
        return (string)$result === $this->getChecknumber();
    }
}