<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_Crm extends CI_Model
{
    public $query;
    public $data;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Seleciona todos os registros de acordo com o usuario logado.
     */
    public function _selectAll($id_user)
    {
        $sql = 'SELECT T1.id AS id_crm, T1.id_usuario, T1.cliente, T1.forma_atendimento, T1.id_estado, 
                T1.id_cidade, T1.bairro, T1.telefone, T1.celular, T2.id,
                T2.descricao AS desc_cidade, T3.id, T3.descricao AS desc_estado FROM crm AS T1
                INNER JOIN cidade AS T2 INNER JOIN estado AS T3 
                WHERE T1.id_cidade = T2.id AND T1.id_estado = T3.id AND excluido = 0 AND T1.id_usuario = '.$id_user;
        $this->query = $this->db->query($sql);

        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();

        return $this->data;
        endif;
    }

    /**
     * Seleciona os proprietarios pelo ID.
     */
    public function _selectById($id)
    {
        $this->db->select('*')
                ->from('crm')
                ->where('id', $id);
        $this->query = $this->db->get();

        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();

        return $this->data;
        endif;
    }

    /**
     * Seleciona os proprietarios pelo ID.
     */
    public function _selectCRM($id)
    {
        $this->db->select('id, id_usuario, cliente, data_atendimento, hora_atendimento, status_atendimento')
        ->from('crm')
        ->where('status_atendimento', 'aberto')
        ->where('id_usuario', $id);
        $this->query = $this->db->get();
        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();

        return $this->data;
        endif;
    }

    /**
     * Insere os dados na tabela.
     */
    public function _insert($data)
    {
        $this->db->set($data);
        $this->query = $this->db->insert($this->db->dbprefix.'crm');
        if ($this->query) :
            return true;
        endif;
    }

    /**
     * Altera os dados na tabela.
     */
    public function _edit($id, $data)
    {
        $this->db->where('id', $id);
        $this->query = $this->db->update('crm', $data);
        if ($this->query) :
            return true;
        endif;
    }

    /**
     * Deleta os dados na tabela.
     */
    public function _delete($id)
    {
        $this->query = $this->db->delete('crm', array('id' => $id));
        if ($this->query) :
            return true;
        endif;
    }
}
