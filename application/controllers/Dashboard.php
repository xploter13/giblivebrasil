<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index() {
        if (isset($_SESSION['session'])) :
            $this->load->model('Model_Dashboard');
            $session = $this->session->userdata('session');
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;
            $data['data_dash'] = $this->Model_Dashboard->_selectAllCrm($session->id);
            $this->load->view('dashboard', $data);
        else :
            header('Location:' . base_url());
        endif;
    }

}
