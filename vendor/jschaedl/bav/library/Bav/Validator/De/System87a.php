<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System87a extends \Bav\Validator\Base
{

    protected function validate()
    {
    }
     /**
     * @return bool
     */
    protected function getResult()
    {
        $accountID = $this->account;
        $i      = 0;
        $c2     = 0;
        $d2     = 0;
        $a5     = 0;
        $p      = 0;
        $tab1   = array(0, 4, 3, 2, 6);
        $tab2   = array(7, 1, 5, 9, 8);
        $konto  = array();

        for ($i = 0; $i < strlen($accountID); $i++) {
            $konto[$i+1] = $accountID{$i};
        }

        $i = 4;
        while ($i < count($konto) && $konto[$i] == 0) {
            $i++;
        }

        $c2 = $i % 2;

        while($i < 10) {
            switch ($konto[$i]) {
                case 0: $konto[$i] = 5;
                break;
                case 1: $konto[$i] = 6;
                break;
                case 5: $konto[$i] = 10;
                break;
                case 6: $konto[$i] = 1;
                break;
            }

            if ($c2 == $d2) {
                if ($konto[$i] > 5) {
                    if ($c2 == 0 && $d2 == 0) {
                        $c2 = 1;
                        $d2 = 1;
                        $a5 = $a5 + 6 - ($konto[$i] - 6);
                    } else {
                        $c2 = 0;
                        $d2 = 0;
                        $a5 = $a5 + $konto[$i];
                    }
                } else {
                    if ($c2 == 0 && $d2 == 0) {
                        $c2 = 1;
                        $a5 = $a5 + $konto[$i];
                    } else {
                        $c2 = 0;
                        $a5 = $a5 + $konto[$i];
                    }
                }
            } else {
                if ($konto[$i] > 5) {
                    if ($c2 == 0) {
                        $c2 = 1;
                        $d2 = 0;
                        $a5 = $a5 - 6 + ($konto[$i] -6);
                    } else {
                        $c2 = 0;
                        $d2 = 1;
                        $a5 = $a5 - $konto[$i];
                    }
                } else {
                    if ($c2 == 0) {
                        $c2 = 1;
                        $a5 = $a5 - $konto[$i];
                    } else {
                        $c2 = 0;
                        $a5 = $a5 - $konto[$i];
                    }
                }
            }

            $i = $i + 1;
        }

        while ($a5 < 0 || $a5 > 4) {
            if ($a5 > 4) {
                $a5 = $a5 - 5;
            } else {
                $a5 = $a5 + 5;
            }
        }

        if ($d2 == 0) {
            $p = $tab1[$a5];
        } else {
            $p = $tab2[$a5];
        }

        if ($p == $konto[10]) {
            return true;
        } else {
            if ($konto[4] == 0) {

                if ($p > 4) {
                    $p = $p - 5;
                } else {
                    $p = $p + 5;
                }

                if ($p == $konto[10]) {
                    return true;
                }
            }
        }

        return false;
    }
    
}