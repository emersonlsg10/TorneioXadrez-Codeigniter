<?php

class Classificacao extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("usuario_model");
    }

    public function index() {

        $data = array(
            'usuarios' => $this->usuario_model->selecionar()
        );
        $this->template->load("template/teste", "usuario/classificacao", $data);
    }
}
