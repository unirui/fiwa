<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author nikat
 */
class User extends Table {
    public $user_id = 0;
    public $name ='';
    public $login='';
    public $pass='';
    public $role_id ='';


    public function validate() {
        
        if (!empty($this->name) &&
!empty($this->login) &&
!empty($this->pass) &&
!empty($this->role_id)) {
return true;
}
return false;
    }
}
