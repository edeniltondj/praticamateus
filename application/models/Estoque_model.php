<?php

class Estoque_model extends Extended_model{
    protected $table = 'estoque';
      
    
    public function get($idproduto){
        $this->db->where('produto_id',$idproduto);
        return $this->db->get($this->table)->row_array();
    }
    
    public function get_por_filial($filial){
        
        if( !empty($filial) ){
            $this->db->where('filial',$filial);
        }
        
        $produtos = $this->db->get('produto')->result_array();
        
        for($i=0;$i< count($produtos);$i++){
            $produto = $produtos[$i];
            $this->db->where('produto_id',$produto['id']);
            $estoque = $this->db->get('estoque')->row_array();
            
            $quantidade_disp = 0;
            
            if( isset($estoque['quantidade']) ){
                $quantidade_disp = $estoque['quantidade'] - $produto['reservado'];
            }
            
            $produtos[$i]['quantidade_disponivel'] = $quantidade_disp;
        }
        
        return $produtos;
    }
    
    
    
    
}