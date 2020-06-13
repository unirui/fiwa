<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuthorMap
 *
 * @author nikat
 */
class AuthorMap extends BaseMap {
    public function arrAuthors(){
    $res = $this->db->query("SELECT author_id AS id, lastname AS
value FROM author"); 
    return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function arrCountries(){
    $res = $this->db->query("SELECT country_id AS id, name AS
value FROM country"); 
    return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function findById($id){
     if ($id) {
$res = $this->db->query("SELECT author_id, lastname, firstname, country_id,year"
. "FROM author WHERE author_id = $id");
return $res->fetchObject("Author");
}
return new Provider();   
    }
    
    public function save(Author $author){
    if ($author->validate()) {
if ($author->author_id == 0) {
return $this->insert($author);
} else {
return $this->update($author);
}
}
return false;    
    }
    
    private function insert(Author $author){
    $lastname = $this->db->quote($author->lastname);
    $firstname=$this->db->quote($author->firstname);
    $country_id=$this->db->quote($author->country_id);
    $year=$this->db->quote($author->year);
if ($this->db->exec("INSERT INTO author(lastname,firstname,country_id,year)"
. " VALUES($lastname,$firstname,$country_id,$year)") == 1) {
$author->author_id = $this->db->lastInsertId();
return true;
}
return false;    
    }
    
    private function update(Author $author){
    $lastname = $this->db->quote($author->lastname);
    $firstname=$this->db->quote($author->firstname);
    $country_id=$this->db->quote($author->country_id);
    $year=$this->db->quote($author->year);
if ( $this->db->exec("UPDATE author SET lastname = $lastname, firstname=$firstname,country_id=$country_id,year=$year"
.$author->author_id) == 1) {
    return true;
}
return false;
}

public function findAll($ofset=0,$limit=30){
$res = $this->db->query("SELECT author.author_id,
author.lastname,author.firstname,country.name,author.year
FROM author
INNER JOIN country ON author.country_id=country.country_id LIMIT $ofset,$limit");
return $res->fetchAll(PDO::FETCH_OBJ);    
}

public function count(){
$res = $this->db->query("SELECT COUNT(*) AS cnt FROM
author");
return $res->fetch(PDO::FETCH_OBJ)->cnt;    
}
}
