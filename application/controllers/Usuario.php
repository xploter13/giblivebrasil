<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public $id;
    public $nome;
    public $email;
    public $login;
    public $senha;
    public $nivel;
    public $_arrdata;
    public $_return;

    public function index() {
        if (isset($_SESSION['session'])) :
            $this->load->model('Model_Usuario');
            $session = $this->session->userdata('session');
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;
            $data['data_usu'] = $this->Model_Usuario->_selectAll($session->id);
            $this->load->view('usuario/view', $data);
        else :
            header('Location: ' . base_url());
        endif;
    }

    /*
     * Renderiza a view Novo Registro
     */

    public function novo() {
        if (isset($_SESSION['session'])) :
            //armazena a sessao criada
            $session = $this->session->userdata('session');

            //retorna todos os estados
            $this->load->model('Model_Loading_State');
            $this->_state = $this->Model_Loading_State->_getState();
            if ($this->_state) :
                $data['state'] = $this->_state;
            endif;

            //Atribui o nome armazenado na sessao
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;

            $this->load->view('usuario/novo', $data);
        else :
            header('Location: ' . base_url());
        endif;
    }

    /*
     * Renderiza a view Editar Registro
     */

    public function editar($id) {
        if (isset($_SESSION['session'])) :

            //armazena a sessao criada
            $session = $this->session->userdata('session');

            //retorna todos os estados
            $this->load->model('Model_Loading_State');
            $this->_state = $this->Model_Loading_State->_getState();
            if ($this->_state) :
                $data['state'] = $this->_state;
            endif;

            $this->load->model('Model_Usuario');
            $data['data_usu'] = $this->Model_Usuario->_selectById($id);

            //Atribui o nome armazenado na sessao
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;

            $this->load->view('usuario/editar', $data);
        else :
            header('Location: ' . base_url());
        endif;
    }

    /*
     * executa a inserção dos dados na tabela
     */

    public function setInsert() {
        $session = $this->session->userdata('session');

        $this->load->model('Model_Usuario');

        $this->nome = $this->input->post('edtNome');
        $this->email = $this->input->post('edtEmail');
        $this->login = $this->input->post('edtLogin');
        $this->senha = md5($this->input->post('edtSenha'));
        $this->nivel = $this->input->post('cmbNivel');

        $this->_arrdata = array(
            "nome" => $this->nome,
            "email" => $this->email,
            "login" => $this->login,
            "senha" => $this->senha,
            "nivel" => $this->nivel,
            "data_cadastro" => date('d/m/Y')
        );

        $this->_return = $this->Model_Usuario->_insert($this->_arrdata);

        if ($this->_return) :
            echo 'TRUE';
        else :
            echo 'FALSE';
        endif;
    }

    /*
     * executa a alteração dos dados na tabela
     */

    public function setEdit() {
        $session = $this->session->userdata('session');

        $this->load->model('Model_Usuario');

        $this->nome = $this->input->post('edtNome');
        $this->email = $this->input->post('edtEmail');
        $this->login = $this->input->post('edtLogin');
        $this->senha = $this->input->post('edtSenha');
        $this->nivel = $this->input->post('cmbNivel');

        //verifica se o campo senha esta vazio.
        if (empty($this->senha)) :
            $this->_arrdata = array(
                "nome" => $this->nome,
                "email" => $this->email,
                "login" => $this->login,
                "nivel" => $this->nivel,
                "data_alteracao" => date('d/m/Y')
            );
        else :
            $this->_arrdata = array(
                "nome" => $this->nome,
                "email" => $this->email,
                "login" => $this->login,
                "senha" => md5($this->senha),
                "nivel" => $this->nivel,
                "data_alteracao" => date('d/m/Y')
            );
        endif;

        $this->_return = $this->Model_Usuario->_edit($session->id, $this->_arrdata);

        if ($this->_return) :
            echo 'TRUE';
        else :
            echo 'FALSE';
        endif;
    }

//    /*
//     * executa a exclusão (altera o excluido para 1) dos dados na tabela
//     */
//
//    public function setDelete() {
//        $this->load->model('Model_Usuario');
//        $this->id = $this->input->post('id');
//
//        $this->_arrdata = array(
//            "excluido" => '1'
//        );
//
//        $this->_return = $this->Model_Usuario->_edit($this->id, $this->_arrdata);
//        if ($this->_return) :
//            echo "TRUE";
//        else :
//            echo "FALSE";
//        endif;
//    }
}
