<?php
/**
 * Iban
 *
 * @author      Stefan Warnat
 * @link        https://github.com/jschaedl/Iban
 *
 * MIT LICENSE
 */
namespace IBAN\Rule\DE;

class Rule004301 extends \IBAN\Rule\DE\Rule004300
{
    /*
        Sobald die BLZ 606 510 70 durch die BLZ 666 500 85 ersetzt wurde,
        darf nur noch die Prüfziffernmethode 06 (Methode für BLZ 666 500 85)
        für die Ursprungskontonummer verwendet werden. Führt dies zu einem
        Prüfziffer-Fehler, kann die Kontonummer nicht auf die IBAN umgestellt
        werden. Desweiteren soll für die Bankleitzahl 606 510 70 der
        BIC PZHSDE66XXX zugeordnet werden.
    */
}
