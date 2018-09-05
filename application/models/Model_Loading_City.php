<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Retorna todos os estados - UF
 */
class Model_Loading_City extends CI_Model {

    public $query;
    public $data;

    function __construct() {
        parent::__construct();
    }

    public function _getCity($id) {
        // Retonas as cidade de acordo com o estado
        $this->query = $this->db
                ->select('*')
                ->from('cidade')
                ->where('id_estado', $id)
                ->get();
        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();
            return $this->data;
        endif;
    }

}
