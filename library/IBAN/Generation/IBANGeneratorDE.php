<?php
namespace IBAN\Generation;

use IBAN\Rule\Exception\RulesFileNotFoundException;
use IBAN\Rule\RuleFactory;

/**
 * IBANGeneratorDE
 *
 * @author Jan Schaedlich <schaedlich.jan@gmail.com>
 * @copyright 2013 Jan Schaedlich
 * @link https://github.com/jschaedl/Iban
 *
 * MIT LICENSE
 */
class IBANGeneratorDE extends IBANGenerator
{
    const CURRENT_RULES = 20170306;

    public function __construct()
    {
        parent::__construct(RuleFactory::DE());
    }

    public function generate($instituteIdentification, $bankAccountNumber)
    {
        $instituteIdentification = $this->prepareAndCheckInstituteIdentification($instituteIdentification);
        $bankAccountNumber = $this->prepareAndCheckBankAccountNumber($bankAccountNumber);

        $rules_filename = 'rules_' . self::CURRENT_RULES . '.php';
        $rules_path = realpath(__DIR__ . '/../../../script/' . self::CURRENT_RULES . '/');
        $rules_file = $rules_path . '/' . $rules_filename;
        if (!file_exists($rules_file)) {
            throw new RulesFileNotFoundException('file ' . $rules_file);
        }

        $rules = include $rules_file;

        // bank not found
        if (!isset($rules[$instituteIdentification])) {
            return '';
        }

        $bank = $rules[$instituteIdentification];
        $ibanRuleCodeAndVersion = $bank['rule'];

        $ibanRule = $this->ruleFactory->createIbanRule($ibanRuleCodeAndVersion, $instituteIdentification, $bankAccountNumber);

        return $ibanRule->generateIban();
    }
}
