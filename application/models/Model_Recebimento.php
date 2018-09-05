<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Recebimento extends CI_Model {

    public $query;
    public $data;

    function __construct() {
        parent::__construct();
    }

    /**
     * Seleciona todos os registros de acordo com o usuario logado
     */
    public function _selectAll($id_user) {
        $sql = "SELECT * FROM recebimento WHERE excluido = 0 AND id_usuario = " . $id_user;
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
                ->from('recebimento')
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
        $this->query = $this->db->insert($this->db->dbprefix . 'recebimento');
        if ($this->query) :
            return TRUE;
        endif;
    }

    /**
     * Altera os dados na tabela
     */
    public function _edit($id, $data) {
        $this->db->where('id', $id);
        $this->query = $this->db->update('recebimento', $data);
        if ($this->query) :
            return TRUE;
        endif;
    }

    /**
     * Deleta os dados na tabela
     */
    public function _delete($id) {
        $this->query = $this->db->delete('recebimento', array('id' => $id));
        if ($this->query) :
            return TRUE;
        endif;
    }

}
