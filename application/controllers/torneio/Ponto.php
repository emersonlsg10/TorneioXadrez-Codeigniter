<?php

require_once 'Categoria.php';

class Ponto extends CI_Controller {

    var $resultado;
    var $jogador1;
    var $jogador2;

    function __construct() {
        parent::__construct();
        $this->load->model("usuario_model");
        $this->categoria = new Categoria();
    }

    function injetarDados($jogador1, $jogador2) {
        $this->usuario_model->inserirPontos($jogador1);
        $this->usuario_model->inserirPontos($jogador2);
    }

    function carregarDados($resultado, $jogador1, $jogador2) {
        $this->resultado = $resultado;
        $this->jogador1 = $jogador1;
        $this->jogador2 = $jogador2;
        $this->categoria->verificaCategoria($this->jogador1, $this->jogador2, $this->resultado);
    }

}
