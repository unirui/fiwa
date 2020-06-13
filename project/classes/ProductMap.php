<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductMap
 *
 * @author nikat
 */
class ProductMap extends BaseMap{
    public function findById($id=null){
        if ($id) {
$res = $this->db->query("SELECT product_id, name,gruppa_id"
. "FROM product WHERE product_id = $id");
$res->fetchObject("Product");
}
return new Product();
    }
    
    public function arrGruppas(){
$res = $this->db->query("SELECT gruppa_id AS id, name AS
value FROM gruppa");
return $res->fetchAll(PDO::FETCH_ASSOC);    
    }
    
    public function count(){
$res = $this->db->query("SELECT COUNT(*) AS cnt FROM
product");
return $res->fetch(PDO::FETCH_OBJ)->cnt;    
}

public function findAll($ofset=0,$limit=30){
$res = $this->db->query("SELECT product.name as product,product.product_id,recipe.name as recipe
FROM recipe
INNER JOIN product  on recipe.product_id=product.product_id LIMIT $ofset,$limit");
return $res->fetchAll(PDO::FETCH_OBJ);    
}

public function findView($id=null){
$res = $this->db->query("SELECT DISTINCT product.product_id,product.name as bludo,gruppa.name as gruppa,ingridient.name as ingridient,ingridient.calory,ingrid_of_recipe.quantity,method.name as method, 
recipe.description,recipe.name as recipe, CONCAT(author.lastname,' ',author.firstname) AS author
from ingrid_of_recipe
INNER join ingridient on ingrid_of_recipe.ingridient_id=ingridient.ingridient_id
INNER JOIN method on ingrid_of_recipe.method_id=method.method
INNER JOIN recipe ON ingrid_of_recipe.recipe_id=recipe.recipe_id
INNER JOIN author on recipe.author_id=author.author_id
INNER JOIN product on recipe.product_id=product.product_id
INNER JOIN gruppa on product.gruppa_id=gruppa.gruppa_id
where product.product_id=$id");
return $res->fetchAll(PDO::FETCH_OBJ);    
}

public function findMinCal($ofset=0,$limit=30){
$res = $this->db->query("SELECT product.name as product,product.product_id,recipe.name as recipe,SUM(ingridient.calory*ingrid_of_recipe.quantity)as ccal
FROM recipe
INNER JOIN product  on recipe.product_id=product.product_id
INNER JOIN ingrid_of_recipe ON recipe.recipe_id=ingrid_of_recipe.recipe_id
INNER JOIN ingridient ON ingrid_of_recipe.ingridient_id=ingridient.ingridient_id
Group BY recipe.recipe_id
order by ccal
LIMIT $ofset,$limit
");
return $res->fetchAll(PDO::FETCH_OBJ);    
}

}
