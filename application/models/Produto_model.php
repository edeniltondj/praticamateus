<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

  /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Produto_model extends Extended_model {

    protected $table = "produto";

    public function add() {
        $description = $this->input->post('descricao');

        $data = array(
            'descricao' => $description
        );

       return $this->db->insert($this->table, $data);
    }

    public function update($id) {
        $this->db->where('id', $id);
        $description = $this->input->post('descricao');

        $data = array(
            'descricao' => $description
        );

        return $this->db->update($this->table, $data);
    }

    public function listar() {
        return $this->db->get()->result_array();
    }
    
    public function get($filial){
        $this->db->where('filial',$filial);
        return $this->db->get($this->table)->result_array();
    }
    
    public function get_produto($id){
        $this->db->where('id',$id);
        return $this->db->get($this->table)->row_array();
    }
    
    

}
