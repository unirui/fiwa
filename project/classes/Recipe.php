<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Recipe
 *
 * @author nikat
 */
class Recipe extends Table {
    public $recipe_id=0;
    public $product_id=0;
    public $name='';
    public $description='';
    public $author_id=0;
    
    public function validate() {}
}
