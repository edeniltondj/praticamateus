<?php

class Filial_model extends Extended_model{
    protected $table = 'filial';
    
    
    
    public function getall(){
        return $this->db->get($this->table)->result_array();
    }
    
    
    
    
}