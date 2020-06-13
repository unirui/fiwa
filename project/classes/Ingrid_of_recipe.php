<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ingrid_of_recipe
 *
 * @author nikat
 */
class Ingrid_of_recipe extends Table {
    public $ingridient_id=0;
    public $method_id=0;
    public $quantity=0;
    public $recipe_id=0;
    
    public function validate() {}
}
