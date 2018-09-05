<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Auditoria extends CI_Model {

    public $query;
    public $data;
    public $table = 'auditoria';

    function __construct() {
        parent::__construct();
    }

    /**
     * Seleciona todos os registros de acordo com o usuario logado
     */
    public function _selectAll($id_user) {
        $sql = "SELECT T1.*, T2.id AS id_imo, T2.imo_cod, T2.imo_desc FROM auditoria AS T1
                INNER JOIN imovel AS T2 WHERE T1.id_imovel = T2.id 
                AND T1.id_usuario =" . $id_user;
        $this->query = $this->db->query($sql);

        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();
            return $this->data;
        endif;
    }

    /**
     * Seleciona todos os Imoveis de acordo 
     * com o usuario logado
     */
    public function _selectImoble($id_user) {
        $sql = "SELECT * FROM imovel WHERE id_usuario = " . $id_user;
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
