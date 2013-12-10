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
    public static $rules;

    private $localeCode;

    public static function DE() 
    {
    	return new static('DE');
    }
    
    public function __construct($localeCode = 'DE')
    {
        if ($this->isLocaleCodeValid($localeCode)) {
            $this->localeCode = $localeCode;

            if (!self::$rules) {
                self::$rules = require __DIR__ . '/' . $localeCode . '/' . '/rules.php';
            }
        }
    }

    public function createIbanRule($instituteIdentification, $bankAccountNumber)
    {
        $instituteIdentification = $this->getInstituteIdentificationSuccessor($instituteIdentification);
        $ibanRuleCodeAndVersion = $this->getIbanRuleCodeAndVersion($instituteIdentification);

        if ($this->ibanRuleFileExists($ibanRuleCodeAndVersion)) {
            return $this->createRule($ibanRuleCodeAndVersion, $instituteIdentification, $bankAccountNumber);
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

    private function ibanRuleFileExists($ibanRuleCodeAndVersion)
    {
        $ibanRuleFilename = $this->getIbanRuleFilename($ibanRuleCodeAndVersion);

        return file_exists(__DIR__ . DIRECTORY_SEPARATOR . $this->localeCode . DIRECTORY_SEPARATOR . $ibanRuleFilename);
    }

    private function createRule($ibanRuleCodeAndVersion, $instituteIdentification, $bankAccountNumber)
    {
        $ibanRuleQualifiedClassName = $this->getIbanRuleQualifiedClassName($ibanRuleCodeAndVersion);

        return new $ibanRuleQualifiedClassName($this->localeCode, $instituteIdentification, $bankAccountNumber);
    }

    private function getIbanRuleQualifiedClassName($ibanRuleCodeAndVersion)
    {
        return '\\IBAN\\Rule\\' . $this->localeCode . '\\Rule' . $ibanRuleCodeAndVersion;
    }

    private function getIbanRuleFilename($ibanRuleCodeAndVersion)
    {
        return 'Rule' . $ibanRuleCodeAndVersion . '.php';
    }

    private function getInstituteIdentificationSuccessor($instituteIdentification)
    {
        if (!array_key_exists($instituteIdentification, self::$rules)) {
            throw new UnknownRuleException($instituteIdentification);
        } else {
            return self::$rules[$instituteIdentification]['successorBlz'] == '00000000' ?
                $instituteIdentification : self::$rules[$instituteIdentification]['successorBlz'];
        }
    }

    private function getIbanRuleCodeAndVersion($instituteIdentification)
    {
        if (!array_key_exists($instituteIdentification, self::$rules)) {
            throw new UnknownRuleException($instituteIdentification);
        } else {
            return self::$rules[$instituteIdentification]['rule'];
        }
    }
}
