<?php
namespace IBAN\Generation;

use IBAN\Rule\RuleFactory;
use IBAN\Rule\RuleFactoryInterface;
use Bav\Bav;

/**
 * IBANGeneratorMT
 *
 * @author Jan Schaedlich <schaedlich.jan@gmail.com>
 * @copyright 2013 Jan Schaedlich
 * @link https://github.com/jschaedl/Iban
 *
 * MIT LICENSE
 */
class IBANGeneratorMT extends IBANGenerator
{    	
    public function __construct()
    {
        parent::__construct(RuleFactory::MT());
    }
}
