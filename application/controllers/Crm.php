<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Crm extends CI_Controller {
    
    public $id;
    public $cliente;
    public $formaAtt;
    public $dataAtt;
    public $horaAtt;
    public $statusAtt;
    public $obs;
    public $endereco;
    public $complemento;
    public $numero;
    public $estado;
    public $cidade;
    public $cep;
    public $bairro;
    public $tipoImovel;
    public $interesse;
    public $valorDe;
    public $valorAte;
    public $maxVaga;
    public $minVaga;
    public $maxQuarto;
    public $minQuarto;
    public $telefone;
    public $celular;
    public $_arrdata;
    public $_return;


    public function index() {
        if (isset($_SESSION['session'])) :
            $this->load->model('Model_Crm');
            $session = $this->session->userdata('session');
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;

            $data['data_crm'] = $this->Model_Crm->_selectAll($session->id);

            $this->load->view('crm/view', $data);
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

            $this->load->view('crm/novo', $data);
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

            $this->load->model('Model_Crm');
            $data['data_crm'] = $this->Model_Crm->_selectById($id);

            //Atribui o nome armazenado na sessao
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;

            $this->load->view('crm/editar', $data);
        else :
            header('Location: ' . base_url());
        endif;
    }

    /*
     * executa a inserção dos dados na tabela
     */

    public function setInsert() {
        $session = $this->session->userdata('session');
        $this->load->model('Model_Crm');
        $this->cliente = $this->input->post('edtCliente');
        $this->formaAtt = $this->input->post('cmbAtt');
        $this->dataAtt = $this->input->post('edtDataAtt');
        $this->horaAtt = $this->input->post('cmbHoraAtt');
        $this->statusAtt = $this->input->post('cmbStatusAtt');
        $this->obs = $this->input->post('txtObs');
        $this->endereco = $this->input->post('edtEndereco');
        $this->complemento = $this->input->post('edtComplemento');
        $this->numero = $this->input->post('edtNumero');
        $this->estado = $this->input->post('cmbEstado');
        $this->cidade = $this->input->post('cmbCidade');
        $this->cep = $this->input->post('edtCep');
        $this->bairro = $this->input->post('edtBairro');
        $this->tipoImovel = $this->input->post('cmbTipoImovel');
        $this->interesse = $this->input->post('cmbInteresse');        
        $this->valorDe = $this->input->post('edtValorDe');
        $this->valorAte = $this->input->post('edtValorAte');
        $this->maxVaga = $this->input->post('edtMaxVagasGaragem');
        $this->minVaga = $this->input->post('edtMinVagasGaragem');
        $this->maxQuarto = $this->input->post('edtMaxQuartos');
        $this->minQuarto = $this->input->post('edtMinQuartos');
        $this->telefone = $this->input->post('edtTelefone');
        $this->celular = $this->input->post('edtCelular');
        
        $this->_arrdata = array(
            "id_usuario" => $session->id,
            "cliente" => $this->cliente,
            "telefone" => $this->telefone,
            "celular" => $this->celular,
            "forma_atendimento" => $this->formaAtt,
            "data_atendimento" => $this->dataAtt,
            "hora_atendimento" => $this->horaAtt,
            "status_atendimento" => $this->statusAtt,
            "observacao" => $this->obs,
            "endereco" => $this->endereco,            
            "complemento" => $this->complemento,
            "numero" => $this->numero,
            "id_estado" => $this->estado,
            "id_cidade" => $this->cidade,
            "bairro" => $this->bairro,
            "cep" => $this->cep,
            "tipo_imovel" => $this->tipoImovel,
            "interesse" => $this->interesse,
            "valor_de" => $this->valorDe,
            "valor_ate" => $this->valorAte,
            "max_vagas" => $this->maxVaga,
            "min_vagas" => $this->minVaga,
            "max_quarto" => $this->maxQuarto,
            "min_quarto" => $this->minQuarto,            
            "data_cadastro" => date('d/m/Y'),
            "excluido" => '0'
        );

        $this->_return = $this->Model_Crm->_insert($this->_arrdata);

        if ($this->_return) :
            echo 'TRUE';
        else :
            echo 'FALSE';
        endif;
    }

    public function setEdit() {
        $session = $this->session->userdata('session');

        $this->load->model('Model_Crm');
        
        $this->id = $this->input->post('edtIdCliente');
        $this->cliente = $this->input->post('edtCliente');
        $this->formaAtt = $this->input->post('cmbAtt');
        $this->dataAtt = $this->input->post('edtDataAtt');
        $this->horaAtt = $this->input->post('cmbHoraAtt');
        $this->statusAtt = $this->input->post('cmbStatusAtt');
        $this->obs = $this->input->post('txtObs');
        $this->endereco = $this->input->post('edtEndereco');
        $this->complemento = $this->input->post('edtComplemento');
        $this->numero = $this->input->post('edtNumero');
        $this->estado = $this->input->post('cmbEstado');
        $this->cidade = $this->input->post('cmbCidade');
        $this->cep = $this->input->post('edtCep');
        $this->bairro = $this->input->post('edtBairro');
        $this->tipoImovel = $this->input->post('cmbTipoImovel');
        $this->interesse = $this->input->post('cmbInteresse');        
        $this->valorDe = $this->input->post('edtValorDe');
        $this->valorAte = $this->input->post('edtValorAte');
        $this->maxVaga = $this->input->post('edtMaxVagasGaragem');
        $this->minVaga = $this->input->post('edtMinVagasGaragem');
        $this->maxQuarto = $this->input->post('edtMaxQuartos');
        $this->minQuarto = $this->input->post('edtMinQuartos');
        $this->telefone = $this->input->post('edtTelefone');
        $this->celular = $this->input->post('edtCelular');
        
        $this->_arrdata = array(
            "id_usuario" => $session->id,
            "cliente" => $this->cliente,
            "telefone" => $this->telefone,
            "celular" => $this->celular,
            "forma_atendimento" => $this->formaAtt,
            "data_atendimento" => $this->dataAtt,
            "hora_atendimento" => $this->horaAtt,
            "status_atendimento" => $this->statusAtt,
            "observacao" => $this->obs,
            "endereco" => $this->endereco,            
            "complemento" => $this->complemento,
            "numero" => $this->numero,
            "id_estado" => $this->estado,
            "id_cidade" => $this->cidade,
            "bairro" => $this->bairro,
            "cep" => $this->cep,
            "tipo_imovel" => $this->tipoImovel,
            "interesse" => $this->interesse,
            "valor_de" => $this->valorDe,
            "valor_ate" => $this->valorAte,
            "max_vagas" => $this->maxVaga,
            "min_vagas" => $this->minVaga,
            "max_quarto" => $this->maxQuarto,
            "min_quarto" => $this->minQuarto,            
            "data_alteracao" => date('d/m/Y')
        );

        $this->_return = $this->Model_Crm->_edit($this->id, $this->_arrdata);

        if ($this->_return) :
            echo 'TRUE';
        else :
            echo 'FALSE';
        endif;
    }

    public function setDelete() {
        $this->load->model('Model_Crm');
        $this->id = $this->input->post('id');

        $this->_arrdata = array(
            "excluido" => '1'
        );

        $this->_return = $this->Model_Crm->_edit($this->id, $this->_arrdata);
        if ($this->_return) :
            echo "TRUE";
        else :
            echo "FALSE";
        endif;
    }

}
