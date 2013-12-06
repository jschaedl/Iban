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

class RuleFactory implements RuleFactoryInterface
{
    public static $rules;

    private $localeCode;

    public static function DE()
    {
        return new RuleFactory('DE');
    }

    public function createIbanRule($instituteIdentification, $bankAccountNumber)
    {
        $instituteIdentification = $this->getInstituteIdentificationSuccessor($instituteIdentification);
        $ibanRuleCodeAndVersion = $this->getIbanRuleCodeAndVersion($instituteIdentification);
        if ($this->ibanRuleFileExists($ibanRuleCodeAndVersion)) {
            return $this->createRule($ibanRuleCodeAndVersion, $instituteIdentification, $bankAccountNumber);
        } else {
            throw new \IBAN\Rule\Exception\RuleNotYetImplementedException('Rule' . $ibanRuleCodeAndVersion);
        }
    }

    private function __construct($localeCode = 'DE')
    {
        $this->localeCode = $localeCode;
        if ($this->isLocaleCodeValid()) {
            if (!isset(self::$rules)) {
                self::$rules = require __DIR__ . '/' . $localeCode . '/' . '/rules.php';
            }
        }
    }

    private function isLocaleCodeValid()
    {
        if (empty($this->localeCode)) {
            throw new \InvalidArgumentException('localeCode is missing');
        } else {
            if (empty(\IBAN\Core\Constants::$ibanFormatMap[$this->localeCode])) {
                throw new \InvalidArgumentException('localeCode not exists');
            } else {
                return true;
            }
        }

        return false;
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
            throw new \IBAN\Rule\Exception\UnknownRuleException($instituteIdentification);
        } else {
            return self::$rules[$instituteIdentification]['successorBlz'] == '00000000' ?
                $instituteIdentification : self::$rules[$instituteIdentification]['successorBlz'];
        }
    }

    private function getIbanRuleCodeAndVersion($instituteIdentification)
    {
        if (!array_key_exists($instituteIdentification, self::$rules)) {
            throw new \IBAN\Rule\Exception\UnknownRuleException($instituteIdentification);
        } else {
            return self::$rules[$instituteIdentification]['rule'];
        }
    }
}
