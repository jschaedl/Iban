<?php
/**
 * Iban
 *
 * @author      Jan Schaedlich <schaedlich.jan@gmail.com>
 * @copyright   2013 Jan Schaedlich
 * @link        https://github.com/jschaedl/Iban
 *
 * MIT LICENSE
 */
namespace IBAN\Rule;

interface RuleFactoryInterface
{
    public function createIbanRule($ibanRuleCodeAndVersion, $instituteIdentification, $bankAccountNumber);
}
