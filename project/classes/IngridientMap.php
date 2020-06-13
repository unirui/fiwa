<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IngridientMap
 *
 * @author nikat
 */
class IngridientMap extends BaseMap{
    public function arrIngridients(){
    $res = $this->db->query("SELECT ingridient_id AS id, name AS
value FROM ingridient"); 
    return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function findById($id){
     if ($id) {
$res = $this->db->query("SELECT ingridient_id, name, calory"
. "FROM ingridient WHERE ingridient_id = $id");
return $res->fetchObject("Ingridient");
}
return new Gruppa();   
    }
    
    public function save(Ingridient $ingridient){
    if ($ingridient->validate()) {
if ($ingridient->ingridient_id == 0) {
return $this->insert($ingridient);
} else {
return $this->update($ingridient);
}
}
return false;    
    }
    
    private function insert(Ingridient $ingridient){
    $name = $this->db->quote($ingridient->name);
    $calory=$this->db->quote($ingridient->calory);
    $invoice_id=$this->db->quote($ingridient->invoice_id);
if ($this->db->exec("INSERT INTO ingridient(name,calory,invoice_id)"
        . " VALUES($name,$calory,$invoice_id)") == 1) {
$ingridient->ingridient_id = $this->db->lastInsertId();
return true;
}
return false;    
    }
    
    private function update(Ingridient $ingridient){
    $name = $this->db->quote($ingridient->name);
    $calory=$this->db->quote($ingridient->calory);
if ( $this->db->exec("UPDATE ingridient SET name = $name, calory=$calory"
.$ingridient->ingridient_id) == 1) {
    return true;
}
return false;
}

public function findAll($ofset=0,$limit=30){
$res = $this->db->query("SELECT ingridient.ingridient_id,
ingridient.name,ingridient.calory"
. " FROM ingridient LIMIT $ofset,$limit");
return $res->fetchAll(PDO::FETCH_OBJ);    
}

public function count(){
$res = $this->db->query("SELECT COUNT(*) AS cnt FROM
ingridient");
return $res->fetch(PDO::FETCH_OBJ)->cnt;    
}

public function findViewById($id=null){
if ($id) {
$res = $this->db->query("SELECT ingridient.ingridient_id,
ingridient.name,ingridient.calory, invoice.data,invoice.price,invoice.quantity, provider.name as provider FROM ingridient 
INNER JOIN invoice ON ingridient.invoice_id=invoice.invoice_id
INNER JOIN provider ON invoice.provider_id=provider.provider_id
WHERE ingridient_id =$id");
return $res->fetch(PDO::FETCH_OBJ);
}
return false;    
}
}
