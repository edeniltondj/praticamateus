<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

  /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Pedido_model extends Extended_model {

    protected $table = "produto";

    public function add() {
        $produtos = $this->input->post('produtos');
        $quantidades = $this->input->post('quantidades');
        $tipo = $this->input->post('tipo');
        $filial = $this->input->post('filial');
        
        

        $data = array(
            'filial_id' => $filial,
            'tipo' => $tipo,
        );

        $this->db->insert('pedido', $data);
        $pedido_id = $this->db->insert_id();

        if (is_array($produtos) && is_array($quantidades)) {
            $size = count($produtos);
            for ($i = 0; $i < $size; $i++) {
                //verificar primeiramente o estoque
                $this->load->model('estoque_model');
                $this->load->model('produto_model');

                $busca = $this->estoque_model->get($produtos[$i]);

                //se tiver vazia é proque não tem entrada em estoque 
                if (empty($busca)) {
                    $_d_produto = array(
                        'quantidade' => 0,
                        'produto_id' => $produtos[$i],
                    );
                    $this->db->insert('estoque', $_d_produto);
                }

                $prod_estoque = $this->estoque_model->get($produtos[$i]);
                $prod_data = $this->produto_model->get_produto($produtos[$i]);

                if ($tipo == "E") {
                    $data = array(
                        'pedido_id' => $pedido_id,
                        'produto_id' => $produtos[$i],
                        'quantidade' => $quantidades[$i],
                    );
                    $this->db->insert('pedido_produtos', $data);
                    $quant = $prod_estoque['quantidade'];
                    $nova_quantidade = $quant + $quantidades[$i];
                    $_d_produto = array(
                        'quantidade' => $nova_quantidade,
                    );
                    $this->db->where('produto_id', $produtos[$i]);
                    $this->db->update('estoque', $_d_produto);
                } else {
                    if ($tipo == "S") {
                        $quant = $prod_estoque['quantidade'];
                        $nova_quantidade = $quant - $quantidades[$i];

                        //se a saída não exceder a reserva
                        if ($nova_quantidade > $prod_data['reservado']) {
                            $_d_produto = array(
                                'quantidade' => $nova_quantidade,
                            );

                            $data = array(
                                'pedido_id' => $pedido_id,
                                'produto_id' => $produtos[$i],
                                'quantidade' => $quantidades[$i],
                            );
                            $this->db->insert('pedido_produtos', $data);

                            $this->db->where('produto_id', $produtos[$i]);
                            $this->db->update('estoque', $_d_produto);
                        }
                    }
                }
            }
        }



        //salvar nas tabelas de itens


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

}
