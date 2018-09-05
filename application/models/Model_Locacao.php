<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Locacao extends CI_Model {

    public $query;
    public $data;
    public $table = 'locacao';

    function __construct() {
        parent::__construct();
    }

    /**
     * Seleciona todos os registros de acordo com o usuario logado
     */
    public function _selectAll($id_user) {
        $sql = "SELECT T1.id AS id_locacao, T1.loc_renda_mensal, T1.loc_tel, T1.loc_cel, T1.loc_data_ini_contrato,
                T1.loc_data_venc_contrato, T1.loc_excluido, T2.id, T2.cli_nome, T3.id AS id_proprietario, T3.nome AS propri_nome FROM locacao AS T1
                INNER JOIN cliente AS T2 INNER JOIN proprietario AS T3 WHERE T1.loc_excluido = 0 AND T1.id_proprietario = T3.id 
                AND T1.id_cliente = T2.id AND T1.id_usuario = " . $id_user;
        $this->query = $this->db->query($sql);
        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();
            return $this->data;
        endif;
    }

    /**
     * Seleciona as Locações pelo ID
     */
    public function _selectById($id) {
        $this->db->select('*')
                ->from("$this->table")
                ->where('id', $id);
        $this->query = $this->db->get();

        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();
            return $this->data;
        endif;
    }

    /**
     * Insere os dados na tabela
     */
    public function _insert($data) {
        $this->db->set($data);
        $this->query = $this->db->insert($this->db->dbprefix . "$this->table");
        if ($this->query) :
            return TRUE;
        endif;
    }

    /**
     * Altera os dados na tabela
     */
    public function _edit($id, $data) {
        $this->db->where('id', $id);
        $this->query = $this->db->update("$this->table", $data);
        if ($this->query) :
            return TRUE;
        endif;
    }

    /**
     * Deleta os dados na tabela
     */
    public function _delete($id) {
        $this->query = $this->db->delete('crm', array('id' => $id));
        if ($this->query) :
            return TRUE;
        endif;
    }

}
