<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author nikat
 */
class Product extends Table {
    public $product_id=0;
    public $name='';
    public $gruppa_id=0;
    
    public function validate(){
        if (!empty($this->name) && !empty($this->gruppa_id)
                ) {
return true;
}
return false;    
}
}