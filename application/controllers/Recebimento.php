<?php

class Recebimento extends CI_Controller {

    public $id;
    public $cliente;
    public $data_rec;
    public $forma_pag;
    public $valor;
    public $_arrdata;
    public $_return;

    public function index() {
        if (isset($_SESSION['session'])) :
            $this->load->model('Model_Recebimento');
            $session = $this->session->userdata('session');
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;

            $data['data_rec'] = $this->Model_Recebimento->_selectAll($session->id);

            $this->load->view('recebimento/view', $data);

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
            //Atribui o nome armazenado na sessao
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;

            $this->load->view('recebimento/novo', $data);
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

            $this->load->model('Model_Recebimento');
            $data['data_rec'] = $this->Model_Recebimento->_selectById($id);

            //Atribui o nome armazenado na sessao
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;

            $this->load->view('recebimento/editar', $data);
        else :
            header('Location: ' . base_url());
        endif;
    }

    /*
     * executa a inserção dos dados na tabela
     */

    public function setInsert() {
        $session = $this->session->userdata('session');
        $this->load->model('Model_Recebimento');
        $this->cliente = $this->input->post('edtCliente');
        $this->data_rec = $this->input->post('edtData');
        $this->forma_pag = $this->input->post('cmbFormaPag');
        $this->valor = $this->input->post('edtValor');

        $this->_arrdata = array(
            "id_usuario" => $session->id,
            "cliente" => $this->cliente,
            "data_recebimento" => $this->data_rec,
            "pagamento" => $this->forma_pag,
            "valor" => $this->valor,
            "data_cadastro" => date('d/m/Y'),
            "excluido" => '0'
        );

        $this->_return = $this->Model_Recebimento->_insert($this->_arrdata);

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
        $this->load->model('Model_Recebimento');
        
        $this->id = $this->input->post('edtIdRecebimento');
        $this->cliente = $this->input->post('edtCliente');
        $this->data_rec = $this->input->post('edtData');
        $this->forma_pag = $this->input->post('cmbFormaPag');
        $this->valor = $this->input->post('edtValor');

        $this->_arrdata = array(
            "cliente" => $this->cliente,
            "data_recebimento" => $this->data_rec,
            "pagamento" => $this->forma_pag,
            "valor" => $this->valor,
            "data_alteracao" => date('d/m/Y'),
            "excluido" => '0'
        );

        $this->_return = $this->Model_Recebimento->_edit($this->id, $this->_arrdata);

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
        $this->load->model('Model_Recebimento');
        $this->id = $this->input->post('id');

        $this->_arrdata = array(
            "excluido" => '1'
        );

        $this->_return = $this->Model_Recebimento->_edit($this->id, $this->_arrdata);
        if ($this->_return) :
            echo "TRUE";
        else :
            echo "FALSE";
        endif;
    }

}
