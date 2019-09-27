<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Imovel extends CI_Model {

    public $query;
    public $data;
    public $table = 'imovel';

    function __construct() {
        parent::__construct();
    }

    /**
     * Seleciona todos os proprietários de cada usuario
     */
    public function _selectAll($id_user) {
        $sql = "SELECT T1.id AS id_imovel, T1.id_usuario, T1.id_proprietario, T1.imo_cod, T1.imo_tipo_imovel, T1.imo_cate, T1.imo_desc, T1.imo_tipo_neg, T1.imo_valor, T1.imo_excluido, T1.imo_image, T2.id, T2.nome FROM imovel AS T1
                INNER JOIN proprietario AS T2 WHERE T1.id_proprietario = T2.id AND T1.imo_excluido = '0' AND T1.id_usuario = " . $id_user;
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
     * Seleciona as imagens da galeria
     */
    public function _selectGalery($id_user) {
        $this->db->select('*')
                ->from("$this->table")
                ->where('id_usuario', $id_user);
        $this->query = $this->db->get();

        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();
            return $this->data;
        endif;
    }

    /**
     * Seleciona os proprietarios pelo ID
     */
    public function _countData() {
        $sql = "SELECT COUNT(id) AS num_qtd FROM $this->table";
        $this->query = $this->db->query($sql);
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
