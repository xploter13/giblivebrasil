<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_Usuario extends CI_Model
{
    public $query;
    public $data;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Seleciona o proprio.
     */
    public function _selectAll($id_user)
    {
        if ($id_user === '1') :
            $sql = 'SELECT * FROM usuario';
        $this->query = $this->db->query($sql);
        if ($this->query->num_rows() > 0) :
                    $this->data = $this->query->result();

        return $this->data;
        endif; else :
            $sql = 'SELECT * FROM usuario WHERE id = '.$id_user;
        $this->query = $this->db->query($sql);
        if ($this->query->num_rows() > 0) :
                $this->data = $this->query->result();

        return $this->data;
        endif;
        endif;
    }

    /**
     * Seleciona os proprietarios pelo ID.
     */
    public function _selectById($id)
    {
        $this->db->select('*')
                ->from('usuario')
                ->where('id', $id);
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
        $this->query = $this->db->insert($this->db->dbprefix.'usuario');
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
        $this->query = $this->db->update('usuario', $data);
        if ($this->query) :
            return true;
        endif;
    }

    /**
     * Deleta os dados na tabela.
     */
    public function _delete($id)
    {
        $this->query = $this->db->delete('usuario', array('id' => $id));
        if ($this->query) :
            return true;
        endif;
    }
}
