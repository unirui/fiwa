<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InvoiceMap
 *
 * @author nikat
 */
class InvoiceMap extends BaseMap{
    public function arrInvoices(){
    $res = $this->db->query("SELECT invoice_id AS id, data AS
value FROM invoice"); 
    return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function findById($id){
     if ($id) {
$res = $this->db->query("SELECT invoice_id, data, provider_id, price,quantity"
. "FROM invoice WHERE invoice_id = $id");
return $res->fetchObject("Invoice");
}
return new Provider();   
    }
    
    public function save(Invoice $invoice){
    if ($invoice->validate()) {
if ($invoice->invoice_id == 0) {
return $this->insert($invoice);
} else {
return $this->update($invoice);
}
}
return false;    
    }
    
    private function insert(Invoice $invoice){
    $data = $this->db->quote($invoice->data);
    $price=$this->db->quote($invoice->price);
    $quantity=$this->db->quote($invoice->quantity);
    $provider_id=$this->db->quote($invoice->provider_id);
if ($this->db->exec("INSERT INTO invoice(data,price,quantity,provider_id)"
. " VALUES($data,$price,$quantity,$provider_id)") == 1) {
$invoice->invoice_id = $this->db->lastInsertId();
return true;
}
return false;    
    }
    
    private function update(Invoice $invoice){
    $data = $this->db->quote($invoice->data);
    $price=$this->db->quote($invoice->price);
    $quantity=$this->db->quote($invoice->quantity);
    $provider_id=$this->db->quote($invoice->provider_id);
if ( $this->db->exec("UPDATE invoice SET data = $data, price=$price,quantity=$quantity,provider_id=$provider_id"
    .$invoice->invoice_id) == 1) {
    return true;
}
return false;
}

public function findAll($ofset=0,$limit=30){
$res = $this->db->query("SELECT invoice.invoice_id,invoice.data,invoice.price,
    invoice.quantity,provider.name as provider,ingridient.name as ingridient,
    provider.adress,provider.tel,ingridient.calory
    FROM invoice
    INNER JOIN provider on invoice.provider_id=provider.provider_id
    INNER JOIN ingridient on invoice.invoice_id=ingridient.invoice_id "
        . "LIMIT $ofset,$limit");
return $res->fetchAll(PDO::FETCH_OBJ);    
}

public function count(){
$res = $this->db->query("SELECT COUNT(*) AS cnt FROM
invoice");
return $res->fetch(PDO::FETCH_OBJ)->cnt;    
}

public function findViewById($id=null){
if ($id) {
$res = $this->db->query("SELECT invoice.invoice_id,invoice.data,invoice.price,invoice.quantity,provider.name as provider,ingridient.name as ingridient 
    FROM invoice
    INNER JOIN provider on invoice.provider_id=provider.provider_id
    INNER JOIN ingridient on invoice.invoice_id=ingridient.invoice_id
    WHERE invoice.invoice_id =$id");
return $res->fetch(PDO::FETCH_OBJ);
}
return false;    
}

}
