<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Author
 *
 * @author nikat
 */
class Author extends Table {
    public $author_id=0;
    public $country_id=0;
    public $firstname='';
    public $lastname='';
    public $year=0;
    
    public function validate() {
        if (!empty($this->lastname) && !empty($this->firstname)
                && !empty($this->country_id) && !empty($this->year)) {
return true;
}
return false;
    }
}
