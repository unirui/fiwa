<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ingridient
 *
 * @author nikat
 */
class Ingridient extends Table {
    public $ingridient_id=0;
    public $calory=0;
    public $invoice_id=0;
    public $name='';
    
    public function validate() {
        if (!empty($this->name) && !empty($this->calory)&& !empty($this->invoice_id)) {
return true;
}
return false;
    }
}
