<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loading_City extends CI_Controller {

    public $city;
    public $state;

    /**
     * Recebe e retorna as cidades de cada estado
     */
    public function Index() {
        $this->load->model('Model_Loading_City');
        $this->state = $this->input->post('id');
        //echo $this->state;
        $this->city = $this->Model_Loading_City->_getCity($this->state);
        if (!empty($this->city)) :
            $c = new ArrayIterator($this->city);
            while ($c->valid()) :
                ?>
                <option value="<?php echo $c->current()->id; ?>"><?php echo $c->current()->descricao; ?></option>
                <?php
                $c->next();
            endwhile;
        else :
            ?>
            <option value="">Cidades não encontradas.</option>
        <?php
        endif;
    }

}
