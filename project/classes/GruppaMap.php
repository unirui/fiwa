<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GruppaMap
 *
 * @author nikat
 */
class GruppaMap extends BaseMap{
    public function arrGruppas(){
    $res = $this->db->query("SELECT gruppa_id AS id, name AS
value FROM gruppa"); 
    return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function findById($id){
     if ($id) {
$res = $this->db->query("SELECT gruppa_id, name,"
. "FROM gruppa WHERE gruppa_id = $id");
return $res->fetchObject("Gruppa");
}
return new Gruppa();   
    }
    
    public function save(Gruppa $gruppa){
    if ($gruppa->validate()) {
if ($gruppa->gruppa_id == 0) {
return $this->insert($gruppa);
} else {
return $this->update($gruppa);
}
}
return false;    
    }
    
    private function insert(Gruppa $gruppa){
    $name = $this->db->quote($gruppa->name);
if ($this->db->exec("INSERT INTO gruppa(name)"
. " VALUES($name)") == 1) {
$gruppa->gruppa_id = $this->db->lastInsertId();
return true;
}
return false;    
    }
    
    private function update(Gruppa $gruppa){
    $name = $this->db->quote($gruppa->name);
if ( $this->db->exec("UPDATE gruppa SET name = $name"
.$gruppa->gruppa_id) == 1) {
    return true;
}
return false;
}

public function findAll($ofset=0,$limit=30){
$res = $this->db->query("SELECT gruppa.gruppa_id,
gruppa.name"
. " FROM gruppa LIMIT $ofset,$limit");
return $res->fetchAll(PDO::FETCH_OBJ);    
}

public function count(){
$res = $this->db->query("SELECT COUNT(*) AS cnt FROM
gruppa");
return $res->fetch(PDO::FETCH_OBJ)->cnt;    
}
    
}
