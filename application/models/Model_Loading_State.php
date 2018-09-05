<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Retorna todos os estados - UF
 */
class Model_Loading_State extends CI_Model {

    public $query;
    public $data;

    function __construct() {
        parent::__construct();
    }

    public function _getState() {
        $this->query = $this->db->get('estado');
        if ($this->query->num_rows() > 0) :
            $this->data = $this->query->result();
            return $this->data;
        endif;
    }
}
