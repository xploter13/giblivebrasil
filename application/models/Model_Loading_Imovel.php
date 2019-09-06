<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Retorna todos os estados - UF
 */
class Model_Loading_Imovel extends CI_Model
{
    public $query;
    public $data;

    public function __construct()
    {
        parent::__construct();
    }

    public function _getimmobile($id = NULL)
    {
        // Retonas as cidade de acordo com o estado
        $sql = "SELECT T1.id AS id_prop, T1.nome, T2.id_proprietario, T2.id AS id_imo, T2.imo_desc, T2.imo_cod FROM proprietario AS T1 INNER JOIN imovel AS T2 WHERE T1.id = $id AND T2.id_proprietario = $id";
        $this->query = $this->db->query($sql);
        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();
        return $this->data;
        endif;
    }
}
