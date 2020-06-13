<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Provider
 *
 * @author nikat
 */
class Provider extends Table {
    public $provider_id=0;
    public $name='';
    public $adress='';
    public $tel='';
    
    public function validate() {
        if (!empty($this->name) && !empty($this->adress)
                && !empty($this->tel)) {
return true;
}
return false;
    }
}
