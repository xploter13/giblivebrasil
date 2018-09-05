<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Cliente extends CI_Model {

    public $query;
    public $data;
    public $table = 'cliente';

    function __construct() {
        parent::__construct();
    }

    /**
     * Seleciona todos os proprietários de cada usuario
     */
    public function _selectAll($id_user) {
        $sql = "SELECT T1.id AS id_cli, T1.cli_nome, T1.id_estado, T1.id_cidade, T1.cli_bairro, T1.cli_tel, T1.cli_cel, T2.id, T2.descricao AS desc_cidade, T3.id, T3.descricao AS desc_estado 
            FROM cliente AS T1 INNER JOIN cidade AS T2 INNER JOIN estado AS T3 WHERE T1.id_cidade = T2.id AND T1.id_estado = T3.id AND cli_excluido = 0 AND T1.id_usuario = " . $id_user;
        $this->query = $this->db->query($sql);

        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();
            return $this->data;
        endif;
    }

    /**
     * Seleciona os proprietarios pelo ID
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
        $this->query = $this->db->delete("$this->table", array('id' => $id));
        if ($this->query) :
            return TRUE;
        endif;
    }

}
