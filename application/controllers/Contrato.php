<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contrato extends CI_Controller {

    public $id;
    public $locatario;
    public $locador;
    public $imovel;
    public $_resultLoc;
    public $_html;
    public $_arrData;
    public $_return;

    public function index() {
        if (isset($_SESSION['session'])) :
            $this->load->model('Model_Contrato');
            $session = $this->session->userdata('session');
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;

            $this->load->view('contrato/view', $data);
        else :
            header('Location: ' . base_url());
        endif;
    }

    /*
     * Renderiza a view Novo Registro
     */

    public function emitir() {
        if (isset($_SESSION['session'])) :
            $this->load->model('Model_Contrato');
            $session = $this->session->userdata('session');
            //Atribui o nome armazenado na sessao
            $data['name'] = $session->nome;
            $data['level'] = $session->nivel;
            $data['imo'] = $this->Model_Contrato->_selectImoble($session->id);
            $data['locator'] = $this->Model_Contrato->_selectLocator($session->id);
            $data['propri'] = $this->Model_Contrato->_selectTenant($session->id);
            $this->load->view('contrato/emitir', $data);
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
            $this->load->model('Model_Auditoria');
            $data['data_imo'] = $this->Model_Auditoria->_selectImoble($session->id);
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
     * GERA O CONTRATO 
     */

    public function generateContract() {
        if (isset($_SESSION['session'])) :
            $this->load->model('Model_Contrato');
            $this->imovel = $this->input->post('cmbImovel');
            $this->locador = $this->input->post('cmbLocador');
            $this->locatario = $this->input->post('cmbLocatario');

            $this->_result = $this->Model_Contrato->_generate($this->locatario, $this->locador);

            $arrLoc = new ArrayIterator($this->_result);
            while ($arrLoc->valid()) :
                        $this->_html = '<p style="text-align: center;"><strong>Marcelo Bonifácio &ndash; Corretor de Im&oacute;veis&nbsp;</strong><strong>CRECI 65656 \ RJ&nbsp;</strong><strong>Tel.: 98835-2689 \ 99301-5954</strong></p>
                    <h2 id="mcetoc_1ba09lrtg1" style="text-align: center;"><strong><span style="color: #000000;">CONTRATO DE LOCA&Ccedil;&Atilde;O COMERCIAL</span></strong></h2>
                    <p><strong><u>LOCADOR:</u></strong> &nbsp;<strong><u style="text-transform: uppercase;">' . $arrLoc->current()->cli_nome . '</u></strong>, brasileiro, casado, empres&aacute;rio, portador da carteira de identidade n&ordm; 04280134-0 IFP/RJ, inscrito no CPF/MF sob o n&ordm; 470.473.307-63 e sua esposa <strong><u>[NOME]</u></strong>, brasileira, casada, comerciante, portadora da carteira de identidade n&ordm;04379959-7 IFP/RJ, inscrita no CPF/MF sob o n&ordm; 014.346.147-68, AMBOS RESIDENTES &Agrave; Rua: Cristiano Otoni, n&ordm;490, Centro, Barra do Pira&iacute;.&nbsp;&nbsp;</p>
                    <p><strong><u>LOCAT&Aacute;RIO:</u></strong> &nbsp;<strong><u style="text-transform: uppercase;">'. $arrLoc->current()->nome .'</u></strong>, brasileiro, casado, T&eacute;cnico em Contabilidade, residente e domiciliado sito &aacute; Travessa Ernestina Braga, 67, FD, Bairro Carv&atilde;o, Barra do Pira&iacute; &ndash; RJ, portador da Carteira de Identidade n&uacute;mero 066806951 IFP &ndash; RJ, CRC &ndash; RJ 110993/O7, CPF n&uacute;mero 919.092.287-53.</p>
                    <p><u></u><strong><u>CL&Aacute;USULA 1</u></strong> - O Locador coloca a disposi&ccedil;&atilde;o do locat&aacute;rio o im&oacute;vel comercial (sala) edificado a Rua Moraes Barbosa, n&uacute;mero 60, sala 202, Centro &ndash; Barra do Pira&iacute; &ndash; RJ. Agregado a um banheiro j&aacute; com Pia e vaso sanit&aacute;rio.</p>
                    <p><strong><u>CL&Aacute;USULA 2</u></strong> - Em contra-presta&ccedil;&atilde;o o locat&aacute;rio se compromete a pagar pelo pre&ccedil;o de R$ 1.400,00 (Hum mil e quatrocentos Reais), sem impostos at&eacute; o &nbsp;dia 05 (Cinco) de cada m&ecirc;s e, na falta da pontualidade ser&aacute; acrescido de 10% (dez por cento) de multa, ap&oacute;s 5(Cinco) dias do vencimento e 0,33 ao dia de juros.</p>
                    <p><strong><u>Par&aacute;grafo Primeiro&ndash;</u></strong> O locador coloca a disposi&ccedil;&atilde;o do locat&aacute;rio um <strong><u>desconto de 50% </u></strong>do valor total da contrapresta&ccedil;&atilde;o caso o pagamento ocorra at&eacute; o dia 05 (Cinco) de cada m&ecirc;s.</p>
                    <p><strong><u>Par&aacute;grafo Segundo -</u></strong> Ocorrendo o pagamento ap&oacute;s o dia 05 (cinco) fica mantido o desconto, acrescido ao valor l&iacute;quido, multa de 10% (dez por cento) e 0,33% ao dia.</p>
                    <p><strong><u>Par&aacute;grafo Terceiro -</u></strong> Ocorridos 30 (trinta) dias do vencimento do pagamento da contrapresta&ccedil;&atilde;o o locat&aacute;rio se submeter&aacute; a todas as condi&ccedil;&otilde;es de pagamento conforme a cl&aacute;usula 2, n&atilde;o podendo negociar, questionar ou receber qualquer tipo de benef&iacute;cio do locador, tendo em vista ainda que os pr&oacute;ximos meses a serem pagos dever&atilde;o obedecer o valor integral e todas as condi&ccedil;&otilde;es previstas na cl&aacute;usula 2.</p>
                    <p><strong><u>Par&aacute;grafo Quarto &ndash; </u></strong>&nbsp;Em caso de feriado ou finais de semana, considera-se o pr&oacute;ximo dia &uacute;til o dia para pagamento da contrapresta&ccedil;&atilde;o.</p>
                    <p><strong><u>CL&Aacute;USULA 3 &ndash;</u></strong> O aluguel supra mencionado ser&aacute; reajustado anualmente pelo IGPM e ou, na falta deste, pela livre negocia&ccedil;&atilde;o entre as partes.</p>
                    <p><strong><u>CL&Aacute;USULA 4</u></strong> &ndash; O locador recebe o im&oacute;vel em condi&ccedil;&otilde;es de funcionamento tais como, instala&ccedil;&otilde;es el&eacute;tricas, hidr&aacute;ulicas e pintura , respondendo por qualquer estrago superveniente &aacute; assinatura do presente Contrato, comprometendo-se a entregar o im&oacute;vel objeto da presente loca&ccedil;&atilde;o devidamente em condi&ccedil;&otilde;es de uso, vez que as benfeitorias se agregam ao im&oacute;vel. Dever&aacute; o locat&aacute;rio restituir o im&oacute;vel ao locador, finda a loca&ccedil;&atilde;o, nas mesmas condi&ccedil;&otilde;es em que hoje receber, livre, desembara&ccedil;ado, com necess&aacute;rio &ldquo;habite-se&rdquo; e nas condi&ccedil;&otilde;es ajustadas.</p>
                    <p><strong><u>CL&Aacute;USULA 5</u></strong> &ndash; O locat&aacute;rio s&oacute; poder&aacute; sublocar ou transferir este contrato a terceiros, com pr&eacute;vio consentimento por escrito do locador.</p>
                    <p><strong><u>CL&Aacute;USULA 6</u></strong> - O locat&aacute;rio n&atilde;o poder&aacute; fazer nenhuma obra ou modifica&ccedil;&atilde;o no im&oacute;vel, em car&aacute;ter provis&oacute;rio, permanente ou at&eacute; mesmo as que forem necess&aacute;rias, sem pr&eacute;via autoriza&ccedil;&atilde;o por escrito do locador ou seus administradores que exigir&atilde;o, finda a loca&ccedil;&atilde;o, sejam tudo reposto ao seu antigo estado, se lhe assim indeniza&ccedil;&atilde;o ou direito de reten&ccedil;&atilde;o, porque ficar&atilde;o incorporadas de imediato, de pleno direito ao im&oacute;vel em quest&atilde;o.</p>
                    <p><strong><u>Par&aacute;grafo &Uacute;nico &ndash; </u></strong>Caso o locat&aacute;rio, seja autorizado a fazer obras de qualquer natureza ou modifica&ccedil;&otilde;es, fica o locat&aacute;rio de modo avisado que n&atilde;o haver&aacute; restitui&ccedil;&atilde;o daquilo que for feito. Devendo em car&aacute;ter extraordin&aacute;rio abater a parcela m&aacute;xima de R$ 50,00 (cinq&uuml;enta reais), mensais no aluguel de refer&ecirc;ncia, para fins de reembolso.</p>
                    <p><strong><u>CL&Aacute;USULA 7</u></strong> - Em caso de inc&ecirc;ndio ou outras hip&oacute;teses que possam ocorrer e exijam provid&ecirc;ncias imediatas, o locat&aacute;rio desde j&aacute;, autoriza o locador ou administrador a ingressar ou mesmo mandar ingressar no im&oacute;vel, objeto deste contrato, por qualquer meio, inclusive atrav&eacute;s de arrombamento.</p>
                    <p><strong><u>CL&Aacute;USULA 8</u></strong> - O locat&aacute;rio poder&aacute; rescindir o contrato, sem qualquer penalidade (multa), caso realize o comunicado por escrito <strong><em>seis meses antes</em></strong>.</p>
                    <p><u></u><strong><u>Par&aacute;grafo 1</u></strong> &ndash; Em caso de rescis&atilde;o de contrato, o n&atilde;o cumprimento da cl&aacute;usula 08, acarretar&aacute; em <strong><em>multa de 50% dos meses de aluguel a vencer</em></strong>.</p>
                    <p><strong><u>CL&Aacute;USULA 9</u></strong> -&nbsp; O prazo de loca&ccedil;&atilde;o &eacute; de 12 (doze) meses, iniciando-se em 5 de Junho de 2015 e a &nbsp;terminar em 5 de Junho &nbsp;de 2016, independente de qualquer interpela&ccedil;&atilde;o ou notifica&ccedil;&atilde;o, judicial ou extrajudicial, e que, poder&aacute; ser renovado, desde que haja concord&acirc;ncia de ambas as partes.</p>
                    <p><strong><u>CL&Aacute;USULA 10</u></strong> &ndash; Com o consentimento do locador o locat&aacute;rio n&atilde;o apresenta ningu&eacute;m como fiador(a).</p>
                    <p><strong><u>C</u></strong><strong><u>L&Aacute;USULA 11</u></strong><strong> - </strong>Por perdas e danos, responder&aacute; a parte contratante pela infra&ccedil;&atilde;o de qualquer das cl&aacute;usulas inclusive a impontualidade no pagamento dos alugueres, ou das despesas de responsabilidade do locat&aacute;rio, podendo inocente, se lhe interessar, considerar rescindida a loca&ccedil;&atilde;o.</p>
                    <p><strong><u>CL&Aacute;USULA 12</u></strong> - O locador reserva-se do direito de mandar ou mesmo vistoriar o im&oacute;vel locado, trimestralmente, sendo esta vistoria completa com fotos e relat&oacute;rios.</p>
                    <p><u></u><strong><u>CL&Aacute;USULA 13 </u></strong>&nbsp;- A vistoria ser&aacute; com pr&eacute;vio agendamento, realizado pelo Corretor de Im&oacute;veis.</p>
                    <p><strong><u>CL&Aacute;USULA 14</u></strong> - As taxas de luz e ser&atilde;o pagas pelo locat&aacute;rio, internamente desvinculadas do contrato diretamente ao &oacute;rg&atilde;o arrecadador e, por ocasi&atilde;o de seus vencimentos dever&atilde;o serem apresentadas quitadas junto ao locador.</p>
                    <p><u></u><strong><u>CL&Aacute;USULA 15</u></strong> - O locat&aacute;rio ser&aacute; respons&aacute;vel por qualquer multa em que possa incorrer por desrespeito as leis federais, estaduais e municipais, obrigando-se a fazer a entrega em m&atilde;os do locador ou seus administradores, das intima&ccedil;&otilde;es ou notifica&ccedil;&otilde;es das autoridades de &oacute;rg&atilde;o p&uacute;blico relativo ao im&oacute;vel, responsabilizando-se pela multa conseq&uuml;ente, caso o fa&ccedil;a no prazo de 48 (quarenta e oito horas).</p>
                    <p><u></u><strong><u>CL&Aacute;USULA 16</u></strong> &ndash; O aluguel ora convencionado, ainda pago por terceiros, n&atilde;o constituir&aacute; nova&ccedil;&atilde;o nas condi&ccedil;&otilde;es estabelecidas e presumir-se-&aacute; a exist&ecirc;ncia de subloca&ccedil;&atilde;o ou cess&atilde;o, n&atilde;o passando de mera liberalidade do locador em receber de terceiros os respectivos alugueres.</p>
                    <p><strong><u>CL&Aacute;USULA 18</u></strong> &ndash; Para solucionar diverg&ecirc;ncia decorrente da presente loca&ccedil;&atilde;o, fica eleito o foro da comarca de Barra do Pira&iacute; &ndash; RJ, onde situa o im&oacute;vel, com prefer&ecirc;ncia sobre qualquer outro, por mais privilegiado que venha a ser.</p>
                    <p><u></u>E por estarem justos e acordados, de pleno acordo com todas as cl&aacute;usulas acima estabelecidas, assinam o presente contrato de loca&ccedil;&atilde;o particular em 02 (duas) vias de igual teor e forma, na presen&ccedil;a das testemunhas abaixo que a tudo assistiram, visando surtir seus efeitos e fins legais.</p>
                    <p>&nbsp;</p>
                    <p style="text-align: center;">Barra do Pira&iacute;, de '. date('d').' de '. date('M') .' de '. date('Y') .'</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>_________________________ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;___________________________</p>
                    <p><strong>LOCADOR</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>LOCAT&Aacute;RIO</strong></p>
                    <p style="text-transform: uppercase;"><strong>'.$arrLoc->current()->cli_nome.'</strong><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><strong>'.$arrLoc->current()->nome.'</strong></p>
                    <p>&nbsp;</p>
                    <p><strong>&nbsp;</strong></p>
                    <p><strong>TESTEMUNHAS</strong></p>
                    <p>____________________________</p>
                    <p>MARCELO BONIF&Aacute;CIO DA SILVA</p>
                    <p>CRECI 065656 - RJ</p>
                    <p>&nbsp;_______________________________</p>
                    <p>ALECSANDRA RODRIGUES DA SILVA</p>
                    <p>CPF 051.641.887-40</p>';
                $arrLoc->next();
            endwhile;

            if (!empty($this->_html)) :
                echo $this->_html;
            else :
                echo 'FALSE';
            endif;

        else :
            header('Location: ' . base_url());
        endif;
    }

    /*
     * executa a inserção dos dados na tabela
     */

    public function setInsert() {
        $session = $this->session->userdata('session');
        $this->load->model('Model_Contrato');

        $this->imovel = $this->input->post('cmbImovel');

        $this->_arrdata = array(
            "id_usuario" => $session->id,
            "id_imovel" => "$this->imovel",
            "audi_data_cadastro" => date('d/m/Y')
        );

//        echo "<pre>";
//        print_r($this->_arrdata);
//        echo "</pre>";

        $this->_return = $this->Model_Contrato->_insert($this->_arrdata);

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
        $this->load->model('Model_Auditoria');

        $this->id = $this->input->post('edtID');

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

//        echo "<pre>";
//        print_r($this->_arrdata);
//        echo "</pre>";

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
        $this->load->model('Model_Auditoria');
        $this->id = $this->input->post('id');

        $this->_return = $this->Model_Auditoria->_delete($this->id);

        if ($this->_return) :
            echo "TRUE";
        else :
            echo "FALSE";
        endif;
    }

}
