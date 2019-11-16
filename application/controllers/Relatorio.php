<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Cliente');        
        $this->load->model('Model_Proprietario');        
        $this->load->model('Model_Auditoria');
        $this->load->model('Model_Funcionario');
    }
    

    public function index() {
        header('Location:' . base_url('dashboard'));
    }

    public function cliente() {
        if (isset($_SESSION['session'])) :            
            $session = $this->session->userdata('session');
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;

            $data['data_cli'] = $this->Model_Cliente->_selectAll($session->id);

            $this->load->view('relatorio/cliente/view', $data);

        else :
            header('Location: ' . base_url());
        endif;
    }

    public function crm() {
        if (isset($_SESSION['session'])) :
            $this->load->model('Model_Crm');
            $session = $this->session->userdata('session');
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;

            $data['data_crm'] = $this->Model_Crm->_selectAll($session->id);

            $this->load->view('relatorio/crm/view', $data);
        else :
            header('Location: ' . base_url());
        endif;
    }

    public function proprietario() {
        if (isset($_SESSION['session'])) :
            $session = $this->session->userdata('session');
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;

            $data['data_propri'] = $this->Model_Proprietario->_selectAll($session->id);

            $this->load->view('relatorio/proprietario/view', $data);

        else :
            header('Location: ' . base_url());
        endif;
    }

    public function imovel() {
        if (isset($_SESSION['session'])) :
            $this->load->model('Model_Imovel');
            $session = $this->session->userdata('session');
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;

            $data['data_imo'] = $this->Model_Imovel->_selectAll($session->id);

            $this->load->view('relatorio/imovel/view', $data);

        else :
            header('Location: ' . base_url());
        endif;
    }

    public function locacao() {
        if (isset($_SESSION['session'])) :
            $this->load->model('Model_Locacao');
            $session = $this->session->userdata('session');
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;
            $data['data_loc'] = $this->Model_Locacao->_selectAll($session->id);
            $this->load->view('relatorio/locacao/view', $data);
        else :
            header('Location: ' . base_url());
        endif;
    }

    public function funcionario() {
        if (isset($_SESSION['session'])) :            
            $session = $this->session->userdata('session');
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;
            $data['data_func'] = $this->Model_Funcionario->_selectAll($session->id);
            $this->load->view('relatorio/funcionario/view', $data);
        else :
            header('Location: ' . base_url());
        endif;
    }

    public function auditoria() {
        if (isset($_SESSION['session'])) :
            $session = $this->session->userdata('session');
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;
            $data['data_audi'] = $this->Model_Auditoria->_selectAll($session->id);
            $this->load->view('relatorio/auditoria/view', $data);
        else :
            header('Location: ' . base_url());
        endif;
    }

}
