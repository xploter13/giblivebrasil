<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Proprietario extends CI_Model {

    public $query;
    public $data;

    function __construct() {
        parent::__construct();
    }

    /**
     * Seleciona todos os proprietários de cada usuario
     */
    public function _selectAll($id_user) {
        $sql = "SELECT T1.id AS id_proprietario, T1.id_usuario, T1.nome, T1.id_estado, T1.id_cidade, T1.bairro, T1.telefone, T2.id, T2.descricao, T3.id, T3.descricao FROM proprietario AS T1
                INNER JOIN cidade AS T2 INNER JOIN estado AS T3 WHERE T1.id_cidade = T2.id AND T1.id_estado = T3.id AND excluido = 0 AND T1.id_usuario = " . $id_user;
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
                ->from('proprietario')
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
        $this->query = $this->db->insert($this->db->dbprefix . 'proprietario');
        if ($this->query) :
            return TRUE;
        endif;
    }

    /**
     * Altera os dados na tabela
     */
    public function _edit($id, $data) {
        $this->db->where('id', $id);
        $this->query = $this->db->update('proprietario', $data);
        if ($this->query) :
            return TRUE;
        endif;
    }

    /**
     * Deleta os dados na tabela
     */
    public function _delete($id) {
        $this->query = $this->db->delete('cliente', array('id' => $id));
        if ($this->query) :
            return TRUE;
        endif;
    }

}