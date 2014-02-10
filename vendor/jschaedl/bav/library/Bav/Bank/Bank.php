<?php

/**
 * Copyright (C) 2012  Dennis Lassiter <dennis@lassiter.de>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 *
 * @author Dennis Lassiter <dennis@lassiter.de>
 * @copyright Copyright (C) 2012 Dennis Lassiter
 */

namespace Bav\Bank;

use Bav\Validator\ValidatorFactory;

class Bank
{
    protected $bankId = '';
    protected $validationType = '';
    protected $agencies;
    
    private $validator;

    public function __construct($bankId) {
        $this->bankId = $bankId;
    }

    public function isValid($account) {
        return $this->getValidator()->isValid($account);
    }

    public function getBankId() {
        return (string) $this->bankId;
    }

    public function getValidationType() {
        return (string) $this->validationType;
    }
    
    public function setValidationType($validationType) {
        return $this->validationType = $validationType;
    }

    public function getAgencies() {
        return $this->agencies;
    }

    public function addAgency(Bank\Agency $agency) {
        $this->agencies[] = $agency;
    }

    public function setAgencies($agencies) {
        $this->agencies = $agencies;
    }

    public function getMainAgency() {
        foreach ($this->agencies as $agency) {
            if ($agency->isMainAgency())
                return $agency;
        }
    }

    public function getValidator() {
        if (is_null($this->validator)) {
            $this->validator = ValidatorFactory::create($this->validationType, $this->getBankId());
        }
        return $this->validator;
    }
}
