<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Locacao extends CI_Controller {

    public $id;
    //dados do locatario
    public $nomeLoc;
    public $cpfLoc;
    public $rgLoc;
    public $estadoCivilLoc;
    public $enderecoLoc;
    public $complementoLoc;
    public $numeroLoc;
    public $estadoLoc;
    public $cidadeLoc;
    public $cepLoc;
    public $bairroLoc;
    public $profissaoLoc;
    public $rendaMensalLoc;
    public $telLoc;
    public $celLoc;
    public $emailLoc;
    public $possuiFiadorLoc;
    //dados do fiador
    public $nomeFiador;
    public $cpfFiador;
    public $rgFiador;
    public $estadoCivilFiador;
    public $enderecoFiador;
    public $complementoFiador;
    public $numeroFiador;
    public $estadoFiador;
    public $cidadeFiador;
    public $cepFiador;
    public $bairroFiador;
    public $profissaoFiador;
    public $rendaMensalFiador;
    public $telFiador;
    public $celFiador;
    public $emailFiador;
    //dados do imovel
    public $proprietario;
    public $imovel;
    public $tipoImovel;
    public $prazoLocacao;
    public $iniContrato;
    public $vencContrato;
    public $_arrdata;
    public $_return;

    public function index() {
        if (isset($_SESSION['session'])) :
            $this->load->model('Model_Locacao');
            $session = $this->session->userdata('session');
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;
            $data['data_loc'] = $this->Model_Locacao->_selectAll($session->id);
            $this->load->view('locacao/view', $data);
        else :
            header('Location: ' . base_url());
        endif;
    }

    /*
     * Renderiza a view Novo Registro
     */

    public function emitir() {
        if (isset($_SESSION['session'])) :
            //armazena a sessao criada
            $session = $this->session->userdata('session');

            //retorna todos os estados
            $this->load->model('Model_Loading_State');
            $this->_state = $this->Model_Loading_State->_getState();
            if ($this->_state) :
                $data['state'] = $this->_state;
            endif;

            //retorna todos os proprietarios
            $this->load->model('Model_Proprietario');
            $data['propri'] = $this->Model_Proprietario->_selectAll($session->id);

            //retorna todos os imoveis
            $this->load->model('Model_Imovel');
            $data['imo'] = $this->Model_Imovel->_selectAll($session->id);

            //Atribui o nome armazenado na sessao
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;

            $this->load->view('locacao/emitir', $data);
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

            //retorna todos os proprietarios
            $this->load->model('Model_Proprietario');
            $data['propri'] = $this->Model_Proprietario->_selectAll($session->id);

            //retorna todos os imoveis
            $this->load->model('Model_Imovel');
            $data['imo'] = $this->Model_Imovel->_selectAll($session->id);
            
            //retorna todos os clientes
            $this->load->model('Model_Cliente');
            $data['cli'] = $this->Model_Cliente->_selectAll($session->id);

            //Atribui o nome armazenado na sessao
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;

            $this->load->view('locacao/novo', $data);
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

            //retorna todos os proprietarios
            $this->load->model('Model_Proprietario');
            $data['propri'] = $this->Model_Proprietario->_selectAll($session->id);

            //retorna todos os imoveis
            $this->load->model('Model_Imovel');
            $data['imo'] = $this->Model_Imovel->_selectAll($session->id);

            //retorna todos os imoveis
            $this->load->model('Model_Locacao');
            $data['data_loc'] = $this->Model_Locacao->_selectById($id);
            
            //retorna todos os clientes
            $this->load->model('Model_Cliente');
            $data['cli'] = $this->Model_Cliente->_selectAll($session->id);

            //Atribui o nome armazenado na sessao
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;

            $this->load->view('locacao/editar', $data);
        else :
            header('Location: ' . base_url());
        endif;
    }

    /*
     * executa a inserção dos dados na tabela
     */

    public function setInsert() {
        $session = $this->session->userdata('session');

        $this->load->library('convert_money');

        $this->load->model('Model_Locacao');

        // Dados do Locatários
        $this->nomeLoc = $this->input->post('cmbNome');
        $this->cpfLoc = $this->input->post('edtCPF');
        $this->rgLoc = $this->input->post('edtRG');
        $this->estadoCivilLoc = $this->input->post('cmbEstadoCivil');
        $this->enderecoLoc = $this->input->post('edtEndereco');
        $this->complementoLoc = $this->input->post('edtComplemento');
        $this->numeroLoc = $this->input->post('edtNumero');
        $this->estadoLoc = $this->input->post('cmbEstado');
        $this->cidadeLoc = $this->input->post('cmbCidade');
        $this->cepLoc = $this->input->post('edtCep');
        $this->bairroLoc = $this->input->post('edtBairro');
        $this->profissaoLoc = $this->input->post('edtProficao');
        //$this->rendaMensalLoc = $this->convert_coin->coin("EN", 2, $this->input->post('edtRendaMensal'));
        $this->rendaMensalLoc = $this->input->post('edtRendaMensal');
        $this->telLoc = $this->input->post('edtTelefone');
        $this->celLoc = $this->input->post('edtCelular');
        $this->emailLoc = $this->input->post('edtEmail');
        $this->possuiFiadorLoc = $this->input->post('cmbPossuiFiador');
        // Dados do Fiador
        $this->nomeFiador = $this->input->post('edtNomeFiador');
        $this->cpfFiador = $this->input->post('edtCpfFiador');
        $this->rgFiador = $this->input->post('edtRGFiador');
        $this->estadoCivilFiador = $this->input->post('cmbEstadoCivilFiador');
        $this->enderecoFiador = $this->input->post('edtEnderecoFiador');
        $this->complementoFiador = $this->input->post('edtComplementoFiador');
        $this->numeroFiador = $this->input->post('edtNumeroFiador');
        $this->estadoFiador = $this->input->post('cmbEstadoFiador');
        $this->cidadeFiador = $this->input->post('cmbCidadeFiador');
        $this->cepFiador = $this->input->post('edtCepFiador');
        $this->bairroFiador = $this->input->post('edtBairroFiador');
        $this->profissaoFiador = $this->input->post('edtProficaoFiador');
        //$this->rendaMensalFiador = $this->convert_coin->coin("EN", 2, $this->input->post('edtRendaMensalFiador'));
        $this->rendaMensalFiador = $this->input->post('edtRendaMensalFiador');
        $this->telFiador = $this->input->post('edtTelefoneFiador');
        $this->celFiador = $this->input->post('edtCelularFiador');
        $this->emailFiador = $this->input->post('edtEmailFiador');
        // Dados do Imovel
        $this->proprietario = $this->input->post('cmbLocador');
        $this->imovel = $this->input->post('cmbImovel');
        $this->tipoImovel = $this->input->post('cmbTipoLocacao');
        $this->prazoLocacao = $this->input->post('edtPrazoLocacao');
        $this->iniContrato = $this->input->post('edtDataIniLoc');
        $this->vencContrato = $this->input->post('edtDataVencLoc');


        $this->_arrdata = array(
            "id_usuario" => $session->id,
            "id_proprietario" => "$this->proprietario",
            "id_imovel" => "$this->imovel",
            "id_cliente" => "$this->nomeLoc",
            "loc_cpf" => "$this->cpfLoc",
            "loc_rg" => "$this->rgLoc",
            "loc_estado_civil" => "$this->estadoCivilLoc",
            "loc_endereco" => "$this->enderecoLoc",
            "loc_complemento" => "$this->complementoLoc",
            "loc_numero" => "$this->numeroLoc",
            "id_estado" => "$this->estadoLoc",
            "id_cidade" => "$this->cidadeLoc",
            "loc_cep" => "$this->cepLoc",
            "loc_bairro" => "$this->bairroLoc",
            "loc_profissao" => "$this->profissaoLoc",
            "loc_renda_mensal" => $this->rendaMensalLoc,
            "loc_tel" => "$this->telLoc",
            "loc_cel" => "$this->celLoc",
            "loc_email" => "$this->emailLoc",
            "loc_possui_fiador" => "$this->possuiFiadorLoc",
            "loc_nome_fia" => "$this->nomeFiador",
            "loc_cpf_fia" => "$this->cpfFiador",
            "loc_rg_fia" => "$this->rgFiador",
            "loc_estado_civil_fia" => "$this->estadoCivilFiador",
            "loc_endereco_fia" => "$this->enderecoFiador",
            "loc_complemento_fia" => "$this->complementoFiador",
            "loc_numero_fia" => "$this->numeroFiador",
            "loc_id_estado_fia" => "$this->estadoFiador",
            "loc_id_cidade_fia" => "$this->cidadeFiador",
            "loc_cep_fia" => "$this->cepFiador",
            "loc_bairro_fia" => "$this->bairroFiador",
            "loc_profissao_fia" => "$this->profissaoFiador",
            "loc_renda_mensal_fia" => $this->rendaMensalFiador,
            "loc_tel_fia" => "$this->telFiador",
            "loc_cel_fia" => "$this->celFiador",
            "loc_email_fia" => "$this->emailFiador",
            "id_proprietario" => "$this->proprietario",
            "id_imovel" => "$this->imovel",
            "loc_tipo" => "$this->tipoImovel",
            "loc_prazo" => "$this->prazoLocacao",
            "loc_data_ini_contrato" => "$this->iniContrato",
            "loc_data_venc_contrato" => "$this->vencContrato",
            "loc_data_cadastro" => date('d/m/Y'),
            "loc_excluido" => '0'
        );

        $this->_return = $this->Model_Locacao->_insert($this->_arrdata);

        if ($this->_return) :
            echo 'TRUE';
        else :
            echo 'FALSE';
        endif;
    }

    public function setEdit() {
        $session = $this->session->userdata('session');

        $this->load->model('Model_Locacao');

        // Dados do Locatários
        $this->id = $this->input->post('edtID');
        $this->nomeLoc = $this->input->post('cmbNome');
        $this->cpfLoc = $this->input->post('edtCPF');
        $this->rgLoc = $this->input->post('edtRG');
        $this->estadoCivilLoc = $this->input->post('cmbEstadoCivil');
        $this->enderecoLoc = $this->input->post('edtEndereco');
        $this->complementoLoc = $this->input->post('edtComplemento');
        $this->numeroLoc = $this->input->post('edtNumero');
        $this->estadoLoc = $this->input->post('cmbEstado');
        $this->cidadeLoc = $this->input->post('cmbCidade');
        $this->cepLoc = $this->input->post('edtCep');
        $this->bairroLoc = $this->input->post('edtBairro');
        $this->profissaoLoc = $this->input->post('edtProficao');
        //$this->rendaMensalLoc = $this->convert_coin->coin("EN", 2, $this->input->post('edtRendaMensal'));
        $this->rendaMensalLoc = $this->input->post('edtRendaMensal');
        $this->telLoc = $this->input->post('edtTelefone');
        $this->celLoc = $this->input->post('edtCelular');
        $this->emailLoc = $this->input->post('edtEmail');
        $this->possuiFiadorLoc = $this->input->post('cmbPossuiFiador');
        // Dados do Fiador
        $this->nomeFiador = $this->input->post('edtNomeFiador');
        $this->cpfFiador = $this->input->post('edtCpfFiador');
        $this->rgFiador = $this->input->post('edtRGFiador');
        $this->estadoCivilFiador = $this->input->post('cmbEstadoCivilFiador');
        $this->enderecoFiador = $this->input->post('edtEnderecoFiador');
        $this->complementoFiador = $this->input->post('edtComplementoFiador');
        $this->numeroFiador = $this->input->post('edtNumeroFiador');
        $this->estadoFiador = $this->input->post('cmbEstadoFiador');
        $this->cidadeFiador = $this->input->post('cmbCidadeFiador');
        $this->cepFiador = $this->input->post('edtCepFiador');
        $this->bairroFiador = $this->input->post('edtBairroFiador');
        $this->profissaoFiador = $this->input->post('edtProficaoFiador');
        //$this->rendaMensalFiador = $this->convert_coin->coin("EN", 2, $this->input->post('edtRendaMensalFiador'));
        $this->rendaMensalFiador = $this->input->post('edtRendaMensalFiador');
        $this->telFiador = $this->input->post('edtTelefoneFiador');
        $this->celFiador = $this->input->post('edtCelularFiador');
        $this->emailFiador = $this->input->post('edtEmailFiador');
        // Dados do Imovel
        $this->proprietario = $this->input->post('cmbLocador');
        $this->imovel = $this->input->post('cmbImovel');
        $this->tipoImovel = $this->input->post('cmbTipoLocacao');
        $this->prazoLocacao = $this->input->post('edtPrazoLocacao');
        $this->iniContrato = $this->input->post('edtDataIniLoc');
        $this->vencContrato = $this->input->post('edtDataVencLoc');


        $this->_arrdata = array(
            "id_usuario" => $session->id,
            "id_proprietario" => "$this->proprietario",
            "id_imovel" => "$this->imovel",
            "id_cliente" => "$this->nomeLoc",
            "loc_cpf" => "$this->cpfLoc",
            "loc_rg" => "$this->rgLoc",
            "loc_estado_civil" => "$this->estadoCivilLoc",
            "loc_endereco" => "$this->enderecoLoc",
            "loc_complemento" => "$this->complementoLoc",
            "loc_numero" => "$this->numeroLoc",
            "id_estado" => "$this->estadoLoc",
            "id_cidade" => "$this->cidadeLoc",
            "loc_cep" => "$this->cepLoc",
            "loc_bairro" => "$this->bairroLoc",
            "loc_profissao" => "$this->profissaoLoc",
            "loc_renda_mensal" => $this->rendaMensalLoc,
            "loc_tel" => "$this->telLoc",
            "loc_cel" => "$this->celLoc",
            "loc_email" => "$this->emailLoc",
            "loc_possui_fiador" => "$this->possuiFiadorLoc",
            "loc_nome_fia" => "$this->nomeFiador",
            "loc_cpf_fia" => "$this->cpfFiador",
            "loc_rg_fia" => "$this->rgFiador",
            "loc_estado_civil_fia" => "$this->estadoCivilFiador",
            "loc_endereco_fia" => "$this->enderecoFiador",
            "loc_complemento_fia" => "$this->complementoFiador",
            "loc_numero_fia" => "$this->numeroFiador",
            "loc_id_estado_fia" => "$this->estadoFiador",
            "loc_id_cidade_fia" => "$this->cidadeFiador",
            "loc_cep_fia" => "$this->cepFiador",
            "loc_bairro_fia" => "$this->bairroFiador",
            "loc_profissao_fia" => "$this->profissaoFiador",
            "loc_renda_mensal_fia" => $this->rendaMensalFiador,
            "loc_tel_fia" => "$this->telFiador",
            "loc_cel_fia" => "$this->celFiador",
            "loc_email_fia" => "$this->emailFiador",            
            "loc_tipo" => "$this->tipoImovel",
            "loc_prazo" => "$this->prazoLocacao",
            "loc_data_ini_contrato" => "$this->iniContrato",
            "loc_data_venc_contrato" => "$this->vencContrato",
            "loc_data_cadastro" => date('d/m/Y'),
            "loc_excluido" => '0'
        );

        $this->_return = $this->Model_Locacao->_edit($this->id, $this->_arrdata);

        if ($this->_return) :
            echo 'TRUE';
        else :
            echo 'FALSE';
        endif;
    }

    public function setDelete() {
        $this->load->model('Model_Locacao');
        $this->id = $this->input->post('id');

        $this->_arrdata = array(
            "loc_excluido" => '1'
        );

        $this->_return = $this->Model_Locacao->_edit($this->id, $this->_arrdata);
        if ($this->_return) :
            echo "TRUE";
        else :
            echo "FALSE";
        endif;
    }

}
