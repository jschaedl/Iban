<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemC6 extends \Bav\Validator\Base
{

    static protected $transformation = array(
        0 => 4451970,
        1 => 4451981,
        2 => 4451992,
        3 => 4451993,
        5 => 4344990,
        6 => 4344991,
        7 => 5499570,
        9 => 5499579
	);
    
    protected $transformedAccount = '';
    protected $validator;
    
    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validator = new System00($bankId);
    }
    
    
    protected function validate()
    {
    	$transformation = array_key_exists($this->account{0}, self::$transformation)
    	                ? self::$transformation[$this->account{0}]
    	                : '';
        $this->transformedAccount = $transformation . substr($this->account, 1);
        $this->validator->setNormalizedSize(9 + strlen($transformation));
    }
    
    
    /**
     * @return bool
     */
    protected function getResult() {
        return in_array($this->account{0}, array_keys(self::$transformation))
             ? $this->validator->isValid($this->transformedAccount)
             : false;
    }
    
}