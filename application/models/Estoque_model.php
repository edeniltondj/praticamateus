<?php

class Estoque_model extends Extended_model{
    protected $table = 'estoque';
      
    
    public function get($idproduto){
        $this->db->where('produto_id',$idproduto);
        return $this->db->get($this->table)->row_array();
    }
    
    public function get_por_filial($filial){
        
    }
    
    
    
    
}