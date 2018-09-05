<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loading_Imovel extends CI_Controller {
    public $city;
    public $state;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Loading_Imovel');
    }
    
    /**
     * Recebe e retorna as cidades de cada estado
     */
    public function Index() {
        $this->propri = $this->input->post('id');
        echo $this->propri;
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
