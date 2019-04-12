<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loading_Immobile extends CI_Controller {
    public $propri;
    public $immobile;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Loading_Imovel');
    }
    
    /**
     * Recebe e retorna os imoveis do locatário
     */
    public function Index() {
        $this->propri = $this->input->post('cmbLocatario');
        //echo $this->propri;
        $this->immobile = $this->Model_Loading_Imovel->_getImmobile($this->propri);
        if (!empty($this->immobile)) :
            $i = new ArrayIterator($this->immobile);
        while ($i->valid()) :
            ?>
            <option value="<?php echo $i->current()->id_imo; ?>">
                <?php echo $i->current()->imo_desc; ?>
            </option>
            <?php
                $i->next();
        endwhile; else :
            ?>
            <option value="">Registros não encontrados.</option>
            <?php
        endif;
    }
}
