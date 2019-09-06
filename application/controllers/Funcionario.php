<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionario extends CI_Controller {

    public $id;
    public $nome;
    public $cpf;
    public $dataNasc;
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
    public $_arrdata;
    public $_return;

    public function index() {
        if (isset($_SESSION['session'])) :
            $this->load->model('Model_Funcionario');
            $session = $this->session->userdata('session');
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;

            $data['data_func'] = $this->Model_Funcionario->_selectAll($session->id);

            $this->load->view('funcionario/view', $data);
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
            
            $this->load->view('funcionario/novo', $data);
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
            $this->load->model('Model_Funcionario');
            $this->load->model('Model_Loading_City');
            $data['data_func'] = $this->Model_Funcionario->_selectById($id);
            //Atribui o nome armazenado na sessao
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;
            $data['city'] = $this->Model_Loading_City->_getCityAll();
            $this->load->view('funcionario/editar', $data);
        else :
            header('Location: ' . base_url());
        endif;
    }

    /*
     * executa a inserção dos dados na tabela
     */

    public function setInsert() {
        $session = $this->session->userdata('session');
        $this->load->model('Model_Funcionario');
        $this->nome = $this->input->post('edtNome');
        $this->cpf = $this->input->post('edtCPF');
        $this->dataNasc = $this->input->post('edtDataNasc');
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
            "nome" => $this->nome,
            "cpf" => $this->cpf,
            "data_nasc" => $this->dataNasc,
            "endereco" => $this->endereco,
            "complemento" => $this->complemento,
            "numero" => $this->numero,
            "id_estado" => $this->estado,
            "id_cidade" => $this->cidade,
            "bairro" => $this->bairro,
            "cep" => $this->cep,
            "telefone" => $this->telefone,
            "celular" => $this->celular,
            "email" => $this->email,
            "data_cadastro" => date('d/m/Y'),
            "excluido" => '0'
        );
        $this->_return = $this->Model_Funcionario->_insert($this->_arrdata);
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
        $this->load->model('Model_Funcionario');
        $this->id = $this->input->post('edtIdFuncionario');
        $this->nome = $this->input->post('edtNome');
        $this->cpf = $this->input->post('edtCPF');
        $this->dataNasc = $this->input->post('edtDataNasc');
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
            "nome" => $this->nome,
            "cpf" => $this->cpf,
            "data_nasc" => $this->dataNasc,
            "endereco" => $this->endereco,
            "complemento" => $this->complemento,
            "numero" => $this->numero,
            "id_estado" => $this->estado,
            "id_cidade" => $this->cidade,
            "bairro" => $this->bairro,
            "cep" => $this->cep,
            "telefone" => $this->telefone,
            "celular" => $this->celular,
            "email" => $this->email,
            "data_alteracao" => date('d/m/Y')
        );
        $this->_return = $this->Model_Funcionario->_edit($this->id, $this->_arrdata);
        if ($this->_return) :
            echo 'TRUE';
        else :
            echo 'FALSE';
        endif;
    }

    /*
     * executa a exclusão (altera o excluido para 1) dos dados na tabela
     */

    public function setDelete() {
        $this->load->model('Model_Funcionario');
        $this->id = $this->input->post('id');
        $this->_arrdata = array(
            "excluido" => '1'
        );
        $this->_return = $this->Model_Funcionario->_edit($this->id, $this->_arrdata);
        if ($this->_return) :
            echo "TRUE";
        else :
            echo "FALSE";
        endif;
    }

}
