<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

    public $id;
    public $nome;
    public $cpf;
    public $endereco;
    public $complemento;
    public $numero;
    public $estado;
    public $cidade;
    public $cep;
    public $bairro;
    public $telefone;
    public $celular;
    public $email;
    public $_state;
    public $_arrdata;
    public $_return;

    public function index() {
        if (isset($_SESSION['session'])) :
            $this->load->model('Model_Cliente');
            $session = $this->session->userdata('session');
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;

            $data['data_cli'] = $this->Model_Cliente->_selectAll($session->id);

            $this->load->view('cliente/view', $data);

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

            $this->load->view('cliente/novo', $data);
        else :
            header('Location: ' . base_url());
        endif;
    }

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

            $this->load->model('Model_Cliente');
            $data['data_cli'] = $this->Model_Cliente->_selectById($id);

            //Atribui o nome armazenado na sessao
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;

            $this->load->view('cliente/editar', $data);
        else :
            header('Location: ' . base_url());
        endif;
    }

    /*
     * executa a inserção dos dados na tabela
     */

    public function setInsert() {
        $session = $this->session->userdata('session');

        $this->load->model('Model_Cliente');

        $this->nome = $this->input->post('edtNome');
        $this->cpf = $this->input->post('edtCPF');
        $this->endereco = $this->input->post('edtEndereco');
        $this->complemento = $this->input->post('edtComplemento');
        $this->numero = $this->input->post('edtNumero');
        $this->estado = $this->input->post('cmbEstado');
        $this->cidade = $this->input->post('cmbCidade');
        $this->cep = $this->input->post('edtCep');
        $this->bairro = $this->input->post('edtBairro');
        $this->telefone = $this->input->post('edtTelefone');
        $this->celular = $this->input->post('edtCelular');
        $this->email = $this->input->post('edtEmail');

        $this->_arrdata = array(
            "id_usuario" => $session->id,
            "cli_nome" => $this->nome,
            "cli_cpf" => $this->cpf,
            "cli_endereco" => $this->endereco,
            "cli_complemento" => $this->complemento,            
            "id_estado" => $this->estado,
            "id_cidade" => $this->cidade,
            "cli_numero" => $this->numero,
            "cli_cep" => $this->cep,
            "cli_bairro" => $this->bairro,
            "cli_tel" => $this->telefone,
            "cli_cel" => $this->celular,
            "cli_email" => $this->email,
            "cli_data_cadastro" => date('d/m/Y'),
            "cli_excluido" => '0'
        );

        $this->_return = $this->Model_Cliente->_insert($this->_arrdata);

        if ($this->_return) :
            echo 'TRUE';
        else :
            echo 'FALSE';
        endif;
    }

    public function setEdit() {
        $session = $this->session->userdata('session');

        $this->load->model('Model_Cliente');

        $this->id = $this->input->post('edtID');
        $this->nome = $this->input->post('edtNome');
        $this->cpf = $this->input->post('edtCPF');
        $this->endereco = $this->input->post('edtEndereco');
        $this->complemento = $this->input->post('edtComplemento');
        $this->numero = $this->input->post('edtNumero');
        $this->estado = $this->input->post('cmbEstado');
        $this->cidade = $this->input->post('cmbCidade');
        $this->cep = $this->input->post('edtCep');
        $this->bairro = $this->input->post('edtBairro');
        $this->telefone = $this->input->post('edtTelefone');
        $this->celular = $this->input->post('edtCelular');
        $this->email = $this->input->post('edtEmail');
        
        $this->_arrdata = array(
            "id_usuario" => $session->id,
            "cli_nome" => $this->nome,
            "cli_cpf" => $this->cpf,
            "cli_endereco" => $this->endereco,
            "cli_complemento" => $this->complemento,            
            "id_estado" => $this->estado,
            "id_cidade" => $this->cidade,
            "cli_numero" => $this->numero,
            "cli_cep" => $this->cep,
            "cli_bairro" => $this->bairro,
            "cli_tel" => $this->telefone,
            "cli_cel" => $this->celular,
            "cli_email" => $this->email,
            "cli_data_alteracao" => date('d/m/Y')
        );
        
        $this->_return = $this->Model_Cliente->_edit($this->id, $this->_arrdata);

        if ($this->_return) :
            echo 'TRUE';
        else :
            echo 'FALSE';
        endif;
    }

    public function setDelete() {
        $this->load->model('Model_Cliente');
        $this->id = $this->input->post('id');
        
        $this->_arrdata = array(
            "cli_excluido" => '1'
        );
        
        $this->_return = $this->Model_Cliente->_edit($this->id, $this->_arrdata);
        if ($this->_return) :
            echo "TRUE";
        else :
            echo "FALSE";
        endif;
    }

}
