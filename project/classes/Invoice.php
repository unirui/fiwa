<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Invoice
 *
 * @author nikat
 */
class Invoice extends Table {
    public $data=0;
    public $invoice_id=0;
    public $price=0;
    public $provider_id=0;
    public $quantity=0;
    
    public function validate() {
        if (!empty($this->data) && !empty($this->price)
                && !empty($this->provider_id) && !empty($this->quantity)) {
return true;
}
return false;
    }
}
