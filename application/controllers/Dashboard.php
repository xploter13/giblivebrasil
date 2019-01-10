<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Model_Dashboard');
        $this->load->model('Model_Crm');
    }

    public function index()
    {
        if (isset($_SESSION['session'])) :
            $session = $this->session->userdata('session');
        $data['name'] = $session->nome;
        $data['level'] = $session->nivel;
        $data['data_dash'] = $this->Model_Dashboard->_selectAllCrm($session->id);
        $data['data_crm'] = $this->Model_Crm->_selectCRM($session->id);
        $this->load->view('dashboard', $data); else :
            header('Location:'.base_url());
        endif;
    }
}
