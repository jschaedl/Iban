<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemD1 extends \Bav\Validator\Base
{

    static private $transformation = array(
        0 => 4363380,
        1 => 4363381,
        2 => 4363382,
        3 => 4363383,
        4 => 4363384,
        5 => 4363385,
        6 => 4363386,
        9 => 4363389
	);
    
    protected $validator;
    protected $transformedAccount;



    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validator = new System00($bankId);
    }
    
    protected function validate()
    {
        $transformationIndex = $this->getTransformationIndex();
        if (! array_key_exists($transformationIndex, self::$transformation)) {
            return;

        }
        $transformationPrefix = self::$transformation[$transformationIndex];
        $this->validator->setNormalizedSize(10 + strlen($transformationPrefix));
        $this->transformedAccount 
            = $transformationPrefix . substr($this->account, 1);
    }
    
    
    /**
     * @return bool
     */
    protected function getResult()
    {
        return 
            array_key_exists(
                $this->getTransformationIndex(),
                self::$transformation
            )
            &&
            $this->validator->isValid($this->transformedAccount);
    }


    /**
     * @return int
     */
    private function getTransformationIndex()
    {
        return $this->account{0};
    }
    
    
}