<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProviderMap
 *
 * @author nikat
 */
class ProviderMap extends BaseMap{
    public function arrProviders(){
    $res = $this->db->query("SELECT provider_id AS id, name AS
value FROM provider"); 
    return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function findById($id){
     if ($id) {
$res = $this->db->query("SELECT provider_id, name, adress,tel"
. "FROM provider WHERE provider_id = $id");
return $res->fetchObject("Provider");
}
return new Provider();   
    }
    
    public function save(Provider $provider){
    if ($provider->validate()) {
if ($provider->provider_id == 0) {
return $this->insert($provider);
} else {
return $this->update($provider);
}
}
return false;    
    }
    
    private function insert(Provider $provider){
    $name = $this->db->quote($provider->name);
    $adress=$this->db->quote($provider->adress);
    $tel=$this->db->quote($provider->tel);
if ($this->db->exec("INSERT INTO provider(name,adress,tel)"
. " VALUES($name,$adress,$tel)") == 1) {
$provider->provider_id = $this->db->lastInsertId();
return true;
}
return false;    
    }
    
    private function update(Provider $provider){
    $name = $this->db->quote($provider->name);
    $adress=$this->db->quote($provider->adress);
    $tel=$this->db->quote($provider->tel);
if ( $this->db->exec("UPDATE provider SET name = $name, adress=$adress,tel=$tel"
.$provider->provider_id) == 1) {
    return true;
}
return false;
}

public function findAll($ofset=0,$limit=30){
$res = $this->db->query("SELECT provider.provider_id,
provider.name,provider.adress,provider.tel"
. " FROM provider LIMIT $ofset,$limit");
return $res->fetchAll(PDO::FETCH_OBJ);    
}

public function count(){
$res = $this->db->query("SELECT COUNT(*) AS cnt FROM
provider");
return $res->fetch(PDO::FETCH_OBJ)->cnt;    
}

}
