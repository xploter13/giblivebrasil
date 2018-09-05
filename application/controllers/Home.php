<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public $username;
    public $password;
    public $login_exists;
    public $data;
    public $arrSession;

    public function index() {
        $this->load->view('login');
    }

    /**
     * @method check_login
     * Verifica se o usuario existe
     * @return boolean
     */
    public function check_login() {
        $this->load->model('Model_Login');
        $this->username = $this->input->post('edtLogin');
        $this->password = md5($this->input->post('edtSenha'));
        $this->login_exists = $this->Model_Login->_getLogin($this->username, $this->password);

        if ($this->login_exists) :
            $this->data = $this->login_exists;
            $this->arrSession = array(
                'session' => $this->data
            );
            $this->session->set_userdata($this->arrSession);
            echo 'TRUE';
        else :
            echo 'FALSE';
            echo $this->login_exists;
        endif;
    }

}
