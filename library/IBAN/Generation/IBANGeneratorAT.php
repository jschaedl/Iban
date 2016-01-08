<?php
/**
 * Iban
 *
 * @author      Ivaylo Ivanov <i.ivanov@webmelt.de>
 * @copyright   2015 Ivaylo Ivanov
 * @link        https://github.com/I-Ivanov/Iban
 *
 * MIT LICENSE
 */
namespace IBAN\Generation;

use IBAN\Rule\RuleFactory;
use IBAN\Rule\RuleFactoryInterface;
use Bav\Bav;

class IBANGeneratorAT extends IBANGenerator
{    	
    public function __construct()
    {
        parent::__construct(RuleFactory::AT());
    }
}
