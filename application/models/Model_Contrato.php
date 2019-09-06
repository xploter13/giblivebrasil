<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Contrato extends CI_Model {

    public $query;
    public $data;
    public $table = 'contrato';

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
     * Seleciona o Locador do COMBOBOX
     */
    public function _selectLocator($id_user) {
        $sql = "SELECT * FROM cliente WHERE id_usuario = " . $id_user;
        $this->query = $this->db->query($sql);

        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();
            return $this->data;
        endif;
    }

    /**
     * Seleciona o Locatário (proprietário) COMBOBOX
     */
    public function _selectTenant($id_user) {
        $sql = "SELECT * FROM proprietario WHERE id_usuario = " . $id_user;
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

    /*********************************
     Gera o contrato - Fazer Depois
    **********************************/
    public function _generate($id_locator, $id_client) {
        $sql = "SELECT T1.id AS id_locacao, T1.id_cliente, T1.id_proprietario, T2.id AS id_cli, T2.cli_nome, T2.cli_cpf, T3.id AS id_propri, T3.nome FROM locacao AS T1
                INNER JOIN cliente AS T2 INNER JOIN proprietario AS T3 WHERE T1.id_cliente = $id_client AND T2.id =  $id_client AND T3.id = $id_locator";
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
