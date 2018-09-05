<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Imovel extends CI_Controller
{
    public $id;
    public $proprietario;
    public $descricao;
    public $codImovel;
    public $tipoImovel;
    public $categoria;
    public $dormitorios;
    public $banheiros;
    public $vagasGaragem;
    public $areaConstruida;
    public $areaTotal;
    public $observacao;
    public $endereco;
    public $complemento;
    public $numero;
    public $estado;
    public $cidade;
    public $cep;
    public $bairro;
    public $tipoNegociacao;
    public $valorImovel;
    public $valorIPTUMensal;
    public $valorIPTUAnual;
    public $taxaExtra;
    public $descExtra;
    public $ObsFinanceiro;
    public $img;
    public $_state;
    public $_arrdata;
    public $_return;

    
    public function __construct() {
        parent::__construct();
        $this->load->library('convert_coin');
        $this->load->model('Model_Imovel');
    }    

    public function index() {
        if (isset($_SESSION['session'])) :            
            $session = $this->session->userdata('session');
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;
            $data['data_imo'] = $this->Model_Imovel->_selectAll($session->id);
            $this->load->view('imovel/view', $data); 
        else :
            header('Location: ' . base_url());
        endif;
    }

    /*
     * Renderiza a view Galeria
     */
    public function galeria() {
        if (isset($_SESSION['session'])) :
            //armazena a sessao criada
            $session = $this->session->userdata('session');
            
        //retorna todos os proprietarios
        $this->load->model('Model_Imovel');
        $data['galery'] = $this->Model_Imovel->_selectGalery($session->id);

        //Atribui o nome armazenado na sessao
        $data['name'] = $session->nome;
        $data['level'] = $session->nivel;

        $this->load->view('imovel/galeria', $data); else :
            header('Location: ' . base_url());
        endif;
    }
    
    /*
     * Renderiza a view Novo Registro
     */

    public function novo()
    {
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

        //Atribui o nome armazenado na sessao
        $data['name'] = $session->nome;
        $data['level'] = $session->nivel;

        $this->load->view('imovel/novo', $data); else :
            header('Location: ' . base_url());
        endif;
    }

    public function editar($id)
    {
        if (isset($_SESSION['session'])) :

            //armazena a sessao criada
            $session = $this->session->userdata('session');

        //retorna todos os estados
        $this->load->model('Model_Loading_State');
        $this->_state = $this->Model_Loading_State->_getState();
        if ($this->_state) :
                $data['state'] = $this->_state;
        endif;

        $this->load->model('Model_Imovel');
        $data['data_imo'] = $this->Model_Imovel->_selectById($id);
            
        //retorna todos os proprietarios
        $this->load->model('Model_Proprietario');
        $data['propri'] = $this->Model_Proprietario->_selectAll($session->id);

        //Atribui o nome armazenado na sessao
        $data['name'] = $session->nome;
        $data['level'] = $session->nivel;

        $this->load->view('imovel/editar', $data); else :
            header('Location: ' . base_url());
        endif;
    }

    /*
     * executa a inserção dos dados na tabela
     */

    public function setInsert() {
        $session = $this->session->userdata('session');        
        $this->proprietario = $this->input->post('cmbPropri');
        $this->descricao = $this->input->post('edtDescricao');
        $this->codImovel = $this->input->post('edtCodImovel');
        $this->tipoImovel = $this->input->post('cmbTipoImovel');
        $this->categoria = $this->input->post('cmbCategoria');
        $this->dormitorios = $this->input->post('edtQtdDormitorios');
        $this->banheiros = $this->input->post('edtQtdBanheiros');
        $this->vagasGaragem = $this->input->post('edtVagaGaragem');
        $this->areaConstruida = $this->input->post('edtAreaConstruida');
        $this->areaTotal = $this->input->post('edtAreaTotal');
        $this->observacao = $this->input->post('txtObsImovel');
        $this->endereco = $this->input->post('edtEndereco');
        $this->complemento = $this->input->post('edtComplemento');
        $this->numero = $this->input->post('edtNumero');
        $this->estado = $this->input->post('cmbEstado');
        $this->cidade = $this->input->post('cmbCidade');
        $this->cep = $this->input->post('edtCep');
        $this->bairro = $this->input->post('edtBairro');
        $this->tipoNegociacao = $this->input->post('cmbTipoNegociacao');
        $this->valorImovel = $this->convert_coin->coin("EN", 2, $this->input->post('edtValorImovel'));
        $this->valorIPTUMensal = $this->convert_coin->coin("EN", 2, $this->input->post('edtValorIptuMensal'));
        $this->valorIPTUAnual = $this->convert_coin->coin("EN", 2, $this->input->post('edtValorIptuAnual'));
        $this->taxaExtra = $this->convert_coin->coin("EN", 2, $this->input->post('edtTaxasExtras'));
        $this->descExtra = $this->input->post('edtDescricaoTaxa');
        $this->ObsFinanceiro = $this->input->post('txtObservacao');

        /**
         * UPLOAD IMAGEM
         */
        // If file upload form submitted
        if(!empty($_FILES['image']['name'])) {
            // Pasta onde o arquivo vai ser salvo
            //$_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/';
            $_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/novogiblivebrasil/assets/uploads/';
            //$_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/homologacao/novogiblivebrasil/assets/uploads/';

            $filesCount = count(array_filter($_FILES['image']['name']));
            for($i = 0; $i < $filesCount; $i++){

                // Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
                // Faz a verificação da extensão do arquivo
                $extensao = @strtolower(end(explode('.', $_FILES['image']['name'][$i])));

                $nome_final[$i] = md5($_FILES['image']['name'][$i]) . '.jpg';

                // Depois verifica se é possível mover o arquivo para a pasta escolhida
               move_uploaded_file($_FILES['image']['tmp_name'][$i], $_UP['pasta'] . $nome_final[$i]);
            }
            
           $this->img = implode(";", $nome_final);
            
            $this->_arrdata = array(
                "id_usuario" => $session->id,
                "id_proprietario" => $this->proprietario,
                "imo_desc" => "$this->descricao",
                "imo_cod" => "$this->codImovel",
                "imo_tipo_imovel" => "$this->tipoImovel",
                "imo_cate" => "$this->categoria",
                "imo_qtd_dorm" => "$this->dormitorios",
                "imo_qtd_ban" => "$this->banheiros",
                "imo_qtd_vag_garg" => "$this->vagasGaragem",
                "imo_area_const" => "$this->areaConstruida",
                "imo_area_total" => "$this->areaTotal",
                "imo_obs" => "$this->observacao",
                "imo_end" => "$this->endereco",
                "imo_comp" => "$this->complemento",
                "imo_num" => "$this->numero",
                "id_estado" => "$this->estado",
                "id_cidade" => "$this->cidade",
                "imo_cep" => "$this->cep",
                "imo_bairro" => "$this->bairro",
                "imo_tipo_neg" => "$this->tipoNegociacao",
                "imo_valor" => "$this->valorImovel",
                "imo_valor_iptu" => "$this->valorIPTUMensal",
                "imo_valor_iptu_anual" => "$this->valorIPTUAnual",
                "imo_taxas_extras" => "$this->taxaExtra",
                "imo_desc_taxa" => "$this->descExtra",
                "imo_obs_finan" => "$this->ObsFinanceiro",
                "imo_image" => "$this->img",
                "imo_data_cadastro" => date('d/m/Y'),
                "imo_excluido" => '0'
            );

            $this->_return = $this->Model_Imovel->_insert($this->_arrdata);
            if ($this->_return) :
                echo 'TRUE'; 
            else :
                echo 'FALSE';
            endif;
        } else {
            $this->_arrdata = array(
                "id_usuario" => $session->id,
                "id_proprietario" => $this->proprietario,
                "imo_desc" => "$this->descricao",
                "imo_cod" => "$this->codImovel",
                "imo_tipo_imovel" => "$this->tipoImovel",
                "imo_cate" => "$this->categoria",
                "imo_qtd_dorm" => "$this->dormitorios",
                "imo_qtd_ban" => "$this->banheiros",
                "imo_qtd_vag_garg" => "$this->vagasGaragem",
                "imo_area_const" => "$this->areaConstruida",
                "imo_area_total" => "$this->areaTotal",
                "imo_obs" => "$this->observacao",
                "imo_end" => "$this->endereco",
                "imo_comp" => "$this->complemento",
                "imo_num" => "$this->numero",
                "id_estado" => "$this->estado",
                "id_cidade" => "$this->cidade",
                "imo_cep" => "$this->cep",
                "imo_bairro" => "$this->bairro",
                "imo_tipo_neg" => "$this->tipoNegociacao",
                "imo_valor" => "$this->valorImovel",
                "imo_valor_iptu" => "$this->valorIPTUMensal",
                "imo_valor_iptu_anual" => "$this->valorIPTUAnual",
                "imo_taxas_extras" => "$this->taxaExtra",
                "imo_desc_taxa" => "$this->descExtra",
                "imo_obs" => "$this->ObsFinanceiro",
                "imo_data_cadastro" => date('d/m/Y'),
                "imo_excluido" => '0'
            );

            /*echo "<pre>";
                print_r($this->_arrdata);
            echo "</pre>";*/

            $this->_return = $this->Model_Imovel->_insert($this->_arrdata);
            if ($this->_return) :
                echo 'TRUE'; 
            else :
                echo 'FALSE';
            endif;
        }
    }

    /*
     * executa a edição dos dados na tabela
     */

    public function setEdit()
    {
        $session = $this->session->userdata('session');

        $this->load->library('convert_coin');

        $this->load->model('Model_Imovel');

        $this->id =  $this->input->post('edtID');
        $this->proprietario = $this->input->post('cmbPropri');
        $this->descricao = $this->input->post('edtDescricao');
        $this->codImovel = $this->input->post('edtCodImovel');
        $this->tipoImovel = $this->input->post('cmbTipoImovel');
        $this->categoria = $this->input->post('cmbCategoria');
        $this->dormitorios = $this->input->post('edtQtdDormitorios');
        $this->banheiros = $this->input->post('edtQtdBanheiros');
        $this->vagasGaragem = $this->input->post('edtVagaGaragem');
        $this->areaConstruida = $this->input->post('edtAreaConstruida');
        $this->areaTotal = $this->input->post('edtAreaTotal');
        $this->observacao = $this->input->post('txtObsImovel');
        $this->endereco = $this->input->post('edtEndereco');
        $this->complemento = $this->input->post('edtComplemento');
        $this->numero = $this->input->post('edtNumero');
        $this->estado = $this->input->post('cmbEstado');
        $this->cidade = $this->input->post('cmbCidade');
        $this->cep = $this->input->post('edtCep');
        $this->bairro = $this->input->post('edtBairro');
        $this->tipoNegociacao = $this->input->post('cmbTipoNegociacao');

        $this->valorImovel = $this->convert_coin->coin("EN", 2, $this->input->post('edtValorImovel'));
        $this->valorIPTUMensal = $this->convert_coin->coin("EN", 2, $this->input->post('edtValorIptuMensal'));
        $this->valorIPTUAnual = $this->convert_coin->coin("EN", 2, $this->input->post('edtValorIptuAnual'));
        $this->taxaExtra = $this->convert_coin->coin("EN", 2, $this->input->post('edtTaxasExtras'));

        $this->descExtra = $this->input->post('edtDescricaoTaxa');
        $this->ObsFinanceiro = $this->input->post('txtObservacao');


        /**
         * UPLOAD IMAGEM
         */
        if (!empty($_FILES['image']['name'])) {

            // Pasta onde o arquivo vai ser salvo
            $_UP['pasta'] = $_SERVER['DOCUMENT_ROOT'] . '/novogiblivebrasil/assets/uploads/';

            // Tamanho máximo do arquivo (em Bytes)
            $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
            // Array com as extensões permitidas
            $_UP['extensoes'] = array("jpg", "png", "gif", "bmp", "jpeg");

            // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
            $_UP['renomeia'] = true;

            // Array com os tipos de erros de upload do PHP
            $_UP['erros'][0] = 'Não houve erro';
            $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
            $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
            $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
            $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

            // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
            if ($_FILES['image']['error'] != 0) {
                die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['arquivo']['error']]);
                exit; // Para a execução do script
            }

            // Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
            // Faz a verificação da extensão do arquivo
            $extensao = @strtolower(end(explode('.', $_FILES['image']['name'])));

            if (array_search($extensao, $_UP['extensoes']) === false) {
                echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
                exit;
            }

            // Faz a verificação do tamanho do arquivo
            if ($_UP['tamanho'] < $_FILES['image']['size']) {
                echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
                exit;
            }

            // O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
            // Primeiro verifica se deve trocar o nome do arquivo
            if ($_UP['renomeia'] == true) {
                // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
                $nome_final = md5($_FILES['image']['name']) . '.jpg';
            } else {
                // Mantém o nome original do arquivo
                $nome_final = $_FILES['image']['name'];
            }

            // Depois verifica se é possível mover o arquivo para a pasta escolhida
            if (move_uploaded_file($_FILES['image']['tmp_name'], $_UP['pasta'] . $nome_final)) {
                $this->img = $nome_final;
            } else {
                // Não foi possível fazer o upload, provavelmente a pasta está incorreta
                echo "Não foi possível enviar o arquivo, tente novamente";
            }

            $this->_arrdata = array(
                "id_proprietario" => $this->proprietario,
                "imo_desc" => "$this->descricao",
                "imo_cod" => "$this->codImovel",
                "imo_tipo_imovel" => "$this->tipoImovel",
                "imo_cate" => "$this->categoria",
                "imo_qtd_dorm" => "$this->dormitorios",
                "imo_qtd_ban" => "$this->banheiros",
                "imo_qtd_vag_garg" => "$this->vagasGaragem",
                "imo_area_const" => "$this->areaConstruida",
                "imo_area_total" => "$this->areaTotal",
                "imo_obs" => "$this->observacao",
                "imo_end" => "$this->endereco",
                "imo_comp" => "$this->complemento",
                "imo_num" => "$this->numero",
                "id_estado" => "$this->estado",
                "id_cidade" => "$this->cidade",
                "imo_cep" => "$this->cep",
                "imo_bairro" => "$this->bairro",
                "imo_tipo_neg" => "$this->tipoNegociacao",
                "imo_valor" => "$this->valorImovel",
                "imo_valor_iptu" => "$this->valorIPTUMensal",
                "imo_valor_iptu_anual" => "$this->valorIPTUAnual",
                "imo_taxas_extras" => "$this->taxaExtra",
                "imo_desc_taxa" => "$this->descExtra",
                "imo_obs_finan" => "$this->ObsFinanceiro",
                "imo_image" => "$this->img",
                "imo_data_alteracao" => date('d/m/Y'),
                "imo_excluido" => '0'
            );

//            echo "<pre>";
//            print_r($this->_arrdata);
//            echo "</pre>";

            $this->_return = $this->Model_Imovel->_edit($this->id, $this->_arrdata);
            if ($this->_return) :
                echo 'TRUE'; else :
                echo 'FALSE';
            endif;
        } else {
            $this->_arrdata = array(
                "id_proprietario" => $this->proprietario,
                "imo_desc" => "$this->descricao",
                "imo_cod" => "$this->codImovel",
                "imo_tipo_imovel" => "$this->tipoImovel",
                "imo_cate" => "$this->categoria",
                "imo_qtd_dorm" => "$this->dormitorios",
                "imo_qtd_ban" => "$this->banheiros",
                "imo_qtd_vag_garg" => "$this->vagasGaragem",
                "imo_area_const" => "$this->areaConstruida",
                "imo_area_total" => "$this->areaTotal",
                "imo_obs" => "$this->observacao",
                "imo_end" => "$this->endereco",
                "imo_comp" => "$this->complemento",
                "imo_num" => "$this->numero",
                "id_estado" => "$this->estado",
                "id_cidade" => "$this->cidade",
                "imo_cep" => "$this->cep",
                "imo_bairro" => "$this->bairro",
                "imo_tipo_neg" => "$this->tipoNegociacao",
                "imo_valor" => "$this->valorImovel",
                "imo_valor_iptu" => "$this->valorIPTUMensal",
                "imo_valor_iptu_anual" => "$this->valorIPTUAnual",
                "imo_taxas_extras" => "$this->taxaExtra",
                "imo_desc_taxa" => "$this->descExtra",
                "imo_obs" => "$this->ObsFinanceiro",
                "imo_data_alteracao" => date('d/m/Y'),
                "imo_excluido" => '0'
            );

//            echo "<pre>";
//            print_r($this->_arrdata);
//            echo "</pre>";
            
            $this->_return = $this->Model_Imovel->_edit($this->id, $this->_arrdata);
            if ($this->_return) :
                echo 'TRUE'; else :
                echo 'FALSE';
            endif;
        }
    }

    /*
     * executa a exclusao dos dados na tabela
     */

    public function setDelete()
    {
        $this->load->model('Model_Imovel');
        $this->id = $this->input->post('id');

        $this->_arrdata = array(
            "imo_excluido" => '1'
        );

        $this->_return = $this->Model_Imovel->_edit($this->id, $this->_arrdata);
        if ($this->_return) :
            echo "TRUE"; else :
            echo "FALSE";
        endif;
    }
}