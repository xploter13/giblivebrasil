<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auditoria extends CI_Controller {

    public $id;
    public $proprietario;
    public $imovel;
    // Sala e Quarto
    public $tomadaSlaQto;
    public $embolsoSlaQto;
    public $pisoSlaQto;
    public $pinturaSlaQto;
    public $portaSlaQto;
    public $janelaSlaQto;
    public $obsSlaQto;
    // Cozinha
    public $torneiraCozinha;
    public $cifraoCozinha;
    public $TomadaCozinha;
    public $embolsoCozinha;
    public $pisoCozinha;
    public $pinturaCozinha;
    public $portaCozinha;
    public $janelaCozinha;
    public $obsCozinha;
    // Banheiro
    public $torneiraBanheiro;
    public $cifraoBanheiro;
    public $vasoBanheiro;
    public $chuveiroBanheiro;
    public $raloBanheiro;
    public $TomadaBanheiro;
    public $embolsoBanheiro;
    public $pisoBanheiro;
    public $pinturaBanheiro;
    public $portaBanheiro;
    public $janelaBanheiro;
    public $obsBanheiro;
    // Area de Servico
    public $torneiraAreaServico;
    public $cifraoAreaServico;
    public $TomadaAreaServico;
    public $embolsoAreaServico;
    public $pisoAreaServico;
    public $pinturaAreaServico;
    public $portaAreaServico;
    public $janelaAreaServico;
    public $obsAreaServico;
    public $_arrdata;
    public $_return;

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Auditoria');
        $this->load->model('Model_Proprietario');
    }
    

    public function index() {
        if (isset($_SESSION['session'])) :            
            $session = $this->session->userdata('session');
            //retorna todos as auditorias
            $data['data_audi'] = $this->Model_Auditoria->_selectAll($session->id);
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;
            $this->load->view('auditoria/view', $data);
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
            //retorna todos os imoveis
            $data['data_imo'] = $this->Model_Auditoria->_selectImoble($session->id);
            $data['data_proprietario'] = $this->Model_Proprietario->_selectAll($session->id);
            //Atribui o nome armazenado na sessao
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;
            $this->load->view('auditoria/novo', $data);
        else :
            header('Location: ' . base_url());
        endif;
    }

    /*
     * Renderiza a view Novo Registro
     */

    public function editar($id) {
        if (isset($_SESSION['session'])) :
            //armazena a sessao criada
            $session = $this->session->userdata('session');
            //retorna todos os imoveis          
            $data['data_imo'] = $this->Model_Auditoria->_selectImoble($session->id);            
            $data['data_proprietario'] = $this->Model_Proprietario->_selectAll($session->id);
            $data['data_audi'] = $this->Model_Auditoria->_selectById($id);
            //Atribui o nome armazenado na sessao
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;
            $this->load->view('auditoria/editar', $data);
        else :
            header('Location: ' . base_url());
        endif;
    }

    /*
     * executa a inserção dos dados na tabela
     */

    public function setInsert() {
        $session = $this->session->userdata('session');
        $this->proprietario = $this->input->post('cmbProprietario');
        $this->imovel = $this->input->post('cmbImovel');
        // Quarto e Sala
        $this->tomadaSlaQto = $this->input->post('cmbQtoSala');
        $this->embolsoSlaQto = $this->input->post('cmbEmbolso');
        $this->pisoSlaQtoto = $this->input->post('cmbPisos');
        $this->pinturaSlaQto = $this->input->post('cmbPintura');
        $this->portaSlaQto = $this->input->post('cmbPorta');
        $this->janelaSlaQto = $this->input->post('cmbJanela');
        $this->obsSlaQto = $this->input->post('cmbObsQtSala');
        // Cozinha
        $this->torneiraCozinha = $this->input->post('cmbTorn');
        $this->cifraoCozinha = $this->input->post('cmbCifrao');
        $this->tomadaCozinha = $this->input->post('cmbTomada');
        $this->embolsoCozinha = $this->input->post('cmbEmbCozinha');
        $this->pisoCozinha = $this->input->post('cmbPisCozinha');
        $this->pinturaCozinha = $this->input->post('cmbPinturaCozinha');
        $this->portaCozinha = $this->input->post('cmbPortaCozinha');
        $this->janelaCozinha = $this->input->post('cmbJanelaCozinha');
        $this->obsCozinha = $this->input->post('cmbObsCozinha');
        // Banheiro
        $this->torneiraBanheiro = $this->input->post('cmbTorneiraBanh');
        $this->cifraoBanheiro = $this->input->post('cmbCifraoBanheiro');
        $this->vasoBanheiro = $this->input->post('cmbVasoSanitarioBanh');
        $this->chuveiroBanheiro = $this->input->post('cmbChuveiroBanh');
        $this->raloBanheiro = $this->input->post('cmbRaloBanheiro');
        $this->TomadaBanheiro = $this->input->post('cmbTomadaBanh');
        $this->embolsoBanheiro = $this->input->post('cmbEmbolsoBanh');
        $this->pisoBanheiro = $this->input->post('cmbPisoBanh');
        $this->pinturaBanheiro = $this->input->post('cmbPinturaBanh');
        $this->portaBanheiro = $this->input->post('cmbPortaBanh');
        $this->janelaBanheiro = $this->input->post('cmbJanelaBanh');
        $this->obsBanheiro = $this->input->post('obsBanh');
        // Area de Serviço
        $this->torneiraAreaServico = $this->input->post('cmbTornAreaServico');
        $this->cifraoAreaServico = $this->input->post('cmbCifAreaServico');
        $this->TomadaAreaServico = $this->input->post('cmbTomaAreaServico');
        $this->pisoAreaServico = $this->input->post('cmbPisAreaServico');
        $this->pinturaAreaServico = $this->input->post('cmbPinturaAreaServico');
        $this->portaAreaServico = $this->input->post('cmbPortaAreaServico');
        $this->janelaAreaServico = $this->input->post('cmbJanelaAreaServico');
        $this->obsAreaServico = $this->input->post('cmbObsAreaServico');
        $this->_arrdata = array(
            "id_usuario" => $session->id,
            "id_proprietario" => "$this->proprietario",
            "id_imovel" => "$this->imovel",
            "audi_tomada_qto_sla" => "$this->tomadaSlaQto",
            "audi_embolso_qto_sla" => "$this->embolsoSlaQto",
            "audi_pisos_qto_sla" => "$this->pisoSlaQtoto",
            "audi_pintura_qto_sla" => "$this->pinturaSlaQto",
            "audi_porta_qto_sla" => "$this->portaSlaQto",
            "audi_janela_qto_sla" => "$this->janelaSlaQto",
            "audi_obs_qto_sla" => "$this->obsSlaQto",
            "audi_torneira_coz" => "$this->torneiraCozinha",
            "audi_cifrao_coz" => "$this->cifraoCozinha",
            "audi_tomada_coz" => "$this->TomadaCozinha",
            "audi_embolso_coz" => "$this->embolsoCozinha",
            "audi_pisos_coz" => "$this->pisoCozinha",
            "audi_pintura_coz" => "$this->pinturaCozinha",
            "audi_porta_coz" => "$this->portaCozinha",
            "audi_janela_coz" => "$this->janelaCozinha",
            "audi_obs_coz" => "$this->obsCozinha",
            "audi_torneira_banh" => "$this->torneiraBanheiro",
            "audi_cifrao_banh" => "$this->cifraoBanheiro",
            "audi_vaso_banh" => "$this->vasoBanheiro",
            "audi_chuveiro_banh" => "$this->chuveiroBanheiro",
            "audi_ralo_banh" => "$this->raloBanheiro",
            "audi_tomada_banh" => "$this->TomadaBanheiro",
            "audi_embolso_banh" => "$this->embolsoBanheiro",
            "audi_pisos_banh" => "$this->pisoBanheiro",
            "audi_pintura_banh" => "$this->pinturaBanheiro",
            "audi_porta_banh" => "$this->portaBanheiro",
            "audi_janela_banh" => "$this->janelaBanheiro",
            "audi_obs_banh" => "$this->obsBanheiro",
            "audi_torneira_area" => "$this->torneiraAreaServico",
            "audi_cifrao_area" => "$this->cifraoAreaServico",
            "audi_tornada_area" => "$this->TomadaAreaServico",
            "audi_piso_area" => "$this->pisoAreaServico",
            "audi_pintura_area" => "$this->pinturaAreaServico",
            "audi_porta_area" => "$this->portaAreaServico",
            "audi_janela_area" => "$this->janelaAreaServico",
            "audi_obs_area" => "$this->obsAreaServico",
            "audi_data_cadastro" => date('d/m/Y')
        );
       $this->_return = $this->Model_Auditoria->_insert($this->_arrdata);
        if ($this->_return) :
            echo 'TRUE';
        else :
            echo 'FALSE';
        endif;
    }

    /*
     * executa a edição dos dados na tabela
     */

    public function setEdit() {
        $session = $this->session->userdata('session');        
        $this->id = $this->input->post('edtID');
        $this->proprietario = $this->input->post('cmbProprietario');
        $this->imovel = $this->input->post('cmbImovel');        
        // Quarto e Sala
        $this->tomadaSlaQto = $this->input->post('cmbQtoSala');
        $this->embolsoSlaQto = $this->input->post('cmbEmbolso');
        $this->pisoSlaQtoto = $this->input->post('cmbPisos');
        $this->pinturaSlaQto = $this->input->post('cmbPintura');
        $this->portaSlaQto = $this->input->post('cmbPorta');
        $this->janelaSlaQto = $this->input->post('cmbJanela');
        $this->obsSlaQto = $this->input->post('cmbObsQtSala');
        // Cozinha
        $this->torneiraCozinha = $this->input->post('cmbTorn');
        $this->cifraoCozinha = $this->input->post('cmbCifrao');
        $this->tomadaCozinha = $this->input->post('cmbTomada');
        $this->embolsoCozinha = $this->input->post('cmbEmbCozinha');
        $this->pisoCozinha = $this->input->post('cmbPisCozinha');
        $this->pinturaCozinha = $this->input->post('cmbPinturaCozinha');
        $this->portaCozinha = $this->input->post('cmbPortaCozinha');
        $this->janelaCozinha = $this->input->post('cmbJanelaCozinha');
        $this->obsCozinha = $this->input->post('cmbObsCozinha');
        // Banheiro
        $this->torneiraBanheiro = $this->input->post('cmbTorneiraBanh');
        $this->cifraoBanheiro = $this->input->post('cmbCifraoBanheiro');
        $this->vasoBanheiro = $this->input->post('cmbVasoSanitarioBanh');
        $this->chuveiroBanheiro = $this->input->post('cmbChuveiroBanh');
        $this->raloBanheiro = $this->input->post('cmbRaloBanheiro');
        $this->TomadaBanheiro = $this->input->post('cmbTomadaBanh');
        $this->embolsoBanheiro = $this->input->post('cmbEmbolsoBanh');
        $this->pisoBanheiro = $this->input->post('cmbPisoBanh');
        $this->pinturaBanheiro = $this->input->post('cmbPinturaBanh');
        $this->portaBanheiro = $this->input->post('cmbPortaBanh');
        $this->janelaBanheiro = $this->input->post('cmbJanelaBanh');
        $this->obsBanheiro = $this->input->post('obsBanh');
        // Area de Serviço
        $this->torneiraAreaServico = $this->input->post('cmbTornAreaServico');
        $this->cifraoAreaServico = $this->input->post('cmbCifAreaServico');
        $this->TomadaAreaServico = $this->input->post('cmbTomaAreaServico');
        $this->pisoAreaServico = $this->input->post('cmbPisAreaServico');
        $this->pinturaAreaServico = $this->input->post('cmbPinturaAreaServico');
        $this->portaAreaServico = $this->input->post('cmbPortaAreaServico');
        $this->janelaAreaServico = $this->input->post('cmbJanelaAreaServico');
        $this->obsAreaServico = $this->input->post('cmbObsAreaServico');
        $this->_arrdata = array(
            "id_usuario" => $session->id,
            "id_proprietario" => "$this->proprietario",
            "id_imovel" => "$this->imovel",
            "audi_tomada_qto_sla" => "$this->tomadaSlaQto",
            "audi_embolso_qto_sla" => "$this->embolsoSlaQto",
            "audi_pisos_qto_sla" => "$this->pisoSlaQtoto",
            "audi_pintura_qto_sla" => "$this->pinturaSlaQto",
            "audi_porta_qto_sla" => "$this->portaSlaQto",
            "audi_janela_qto_sla" => "$this->janelaSlaQto",
            "audi_obs_qto_sla" => "$this->obsSlaQto",
            "audi_torneira_coz" => "$this->torneiraCozinha",
            "audi_cifrao_coz" => "$this->cifraoCozinha",
            "audi_tomada_coz" => "$this->TomadaCozinha",
            "audi_embolso_coz" => "$this->embolsoCozinha",
            "audi_pisos_coz" => "$this->pisoCozinha",
            "audi_pintura_coz" => "$this->pinturaCozinha",
            "audi_porta_coz" => "$this->portaCozinha",
            "audi_janela_coz" => "$this->janelaCozinha",
            "audi_obs_coz" => "$this->obsCozinha",
            "audi_torneira_banh" => "$this->torneiraBanheiro",
            "audi_cifrao_banh" => "$this->cifraoBanheiro",
            "audi_vaso_banh" => "$this->vasoBanheiro",
            "audi_chuveiro_banh" => "$this->chuveiroBanheiro",
            "audi_ralo_banh" => "$this->raloBanheiro",
            "audi_tomada_banh" => "$this->TomadaBanheiro",
            "audi_embolso_banh" => "$this->embolsoBanheiro",
            "audi_pisos_banh" => "$this->pisoBanheiro",
            "audi_pintura_banh" => "$this->pinturaBanheiro",
            "audi_porta_banh" => "$this->portaBanheiro",
            "audi_janela_banh" => "$this->janelaBanheiro",
            "audi_obs_banh" => "$this->obsBanheiro",
            "audi_torneira_area" => "$this->torneiraAreaServico",
            "audi_cifrao_area" => "$this->cifraoAreaServico",
            "audi_tornada_area" => "$this->TomadaAreaServico",
            "audi_piso_area" => "$this->pisoAreaServico",
            "audi_pintura_area" => "$this->pinturaAreaServico",
            "audi_porta_area" => "$this->portaAreaServico",
            "audi_janela_area" => "$this->janelaAreaServico",
            "audi_obs_area" => "$this->obsAreaServico",
            "audi_data_cadastro" => date('d/m/Y')
        );
        $this->_return = $this->Model_Auditoria->_edit($this->id, $this->_arrdata);
        if ($this->_return) :
            echo 'TRUE';
        else :
            echo 'FALSE';
        endif;
    }

    
    /*
     * executa a exclusão dos dados na tabela
     */

    public function setDelete() {
        $this->id = $this->input->post('id');
        $this->_return = $this->Model_Auditoria->_delete($this->id);        
        if ($this->_return) :
            echo "TRUE";
        else :
            echo "FALSE";
        endif;
    }

}
