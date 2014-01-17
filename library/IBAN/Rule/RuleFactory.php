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

use IBAN\Core\Constants;
use IBAN\Rule\Exception\RuleNotYetImplementedException;
use IBAN\Rule\Exception\UnknownRuleException;

class RuleFactory implements RuleFactoryInterface
{
    private $localeCode;

    public static function DE() 
    {
    	return new RuleFactory('DE');
    }
    
    public static function NL()
    {
    	return new RuleFactory('NL');
    }
    
    public static function MT()
    {
    	return new RuleFactory('MT');
    }
    
    public function __construct($localeCode = 'DE')
    {
        if ($this->isLocaleCodeValid($localeCode)) {
            $this->localeCode = $localeCode;
        }
    }

    public function createIbanRule($ibanRuleCodeAndVersion, $instituteIdentification, $bankAccountNumber)
    {
    	$ibanRuleFilename = 'Rule' . $ibanRuleCodeAndVersion . '.php';
    	$ibanRuleFilePath = __DIR__ . DIRECTORY_SEPARATOR . $this->localeCode . DIRECTORY_SEPARATOR . $ibanRuleFilename;
        
        if (file_exists($ibanRuleFilePath)) {
        	$ibanRuleQualifiedClassName = '\\IBAN\\Rule\\' . $this->localeCode . '\\Rule' . $ibanRuleCodeAndVersion;
        	return new $ibanRuleQualifiedClassName($this->localeCode, $instituteIdentification, $bankAccountNumber);
        } else {
            throw new RuleNotYetImplementedException('Rule' . $ibanRuleCodeAndVersion);
        }
    }
    
    private function isLocaleCodeValid($localeCode)
    {
        if (empty($localeCode)) {
            throw new \InvalidArgumentException('localeCode is missing');
        } else {
            if (empty(Constants::$ibanFormatMap[$localeCode])) {
                throw new \InvalidArgumentException('localeCode not exists');
            } else {
                return true;
            }
        }
    }
}
