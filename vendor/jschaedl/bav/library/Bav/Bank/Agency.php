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
 * @package Bank
 * @author Dennis Lassiter <dennis@lassiter.de>
 * @copyright Copyright (C) 2012 Dennis Lassiter
 */
namespace Bav\Bank;

class Agency
{
    protected $id = 0;
    protected $name = '';
    protected $shortTerm = '';
    protected $city = '';
    protected $postcode = '';
    protected $bic = '';
    protected $pan = '';
    protected $ibanRule = '';
    protected $isMain = false;

    /**
     * Don't create this object directly.
     * Use BAV_Bank->getMainAgency()
     * or BAV_Bank->getAgencies().
     *
     * @param int $id            
     * @param string $name            
     * @param string $shortTerm            
     * @param string $city            
     * @param string $postcode            
     * @param string $bic
     *            might be empty
     * @param string $pan
     *            might be empty
     */
    public function __construct($id, $name, $shortTerm, $city, $postcode, $bic = '', $pan = '', $ibanRule = '', $isMain = false) {
        $this->id = (int) $id;
        $this->bic = $bic;
        $this->postcode = $postcode;
        $this->city = $city;
        $this->name = $name;
        $this->shortTerm = $shortTerm;
        $this->pan = $pan;
        $this->ibanRule = $ibanRule;
        $this->isMain = $isMain;
    }

    public function hasBic() {
        return ! empty($this->bic);
    }
    
    public function hasIbanRule() {
    	return ! empty($this->ibanRule);
    }

    public function isMainAgency() {
        return $this->isMain;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getShortTerm() {
        return $this->shortTerm;
    }

    public function getCity() {
        return $this->city;
    }

    public function getPostcode() {
        return $this->postcode;
    }

    public function getBic() {
        if (! $this->hasBIC()) {
            throw new \Bank\Exception\UndefinedAttributeException($this, 'bic');
        }
        return $this->bic;
    }

    public function getPan() {
        if (! $this->hasPAN()) {
            throw new \Bank\Exception\UndefinedAttributeException($this, 'pan');
        }
        return $this->pan;
    }
    
    public function getIbanRule() {
    	if (! $this->hasIbanRule()) {
    		throw new \Bank\Exception\UndefinedAttributeException($this, 'ibanRule');
    	}
    	return $this->ibanRule;
    }
}
