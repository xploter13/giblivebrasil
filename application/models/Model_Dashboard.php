<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Dashboard extends CI_Model {

    public $query;
    public $data;

    function __construct() {
        parent::__construct();
    }

    /**
     * Seleciona todos os CRM's
     */
    public function _selectAllCrm($id_user) {
        $sql = "SELECT T1.id AS id_crm, T1.id_usuario, T1.cliente, T1.forma_atendimento, T1.id_estado, 
                T1.id_cidade, T1.bairro, T1.telefone, T1.celular, T1.status_atendimento, T2.id,
                T2.descricao AS desc_cidade, T3.id, T3.uf FROM crm AS T1
                INNER JOIN cidade AS T2 INNER JOIN estado AS T3 
                WHERE T1.id_cidade = T2.id AND T1.id_estado = T3.id AND excluido = 0 AND T1.id_usuario = " . $id_user;
        $this->query = $this->db->query($sql);

        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();
            return $this->data;
        endif;
    }   

}
