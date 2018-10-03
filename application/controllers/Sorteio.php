<?php

class Sorteio extends CI_Controller {

    var $dados;

    function __construct() {
        parent::__construct();
        $this->load->model("usuario_model", "usuario");
        $this->dados = $this->usuario->pegarNomes();
    }

    public function index() {
        $data = array(
            'nomes' => $this->sortear());
        $this->template->load("template/teste", "torneio/tabelaSorteio", $data);
    }

    function sortear() {

        $tamanho = sizeof($this->dados);
        $nomes = array();

        //verifica se o numero de inscritos é par
        if ($tamanho % 2 == 0) {
            for ($i = 0; $i < $tamanho; $i++) {
                $rand = array_rand($this->dados, 1);
                $nome = $this->dados[$rand]->nome;
                array_push($nomes, $nome);
                unset($this->dados[$rand]);
            }
        } else {
            for ($i = 0; $i < $tamanho; $i++) {
                $rand = array_rand($this->dados, 1);
                $nome = $this->dados[$rand]->nome;
                array_push($nomes, $nome);
                unset($this->dados[$rand]);
            }
            array_push($nomes, "Aguarde!");
        }
        return $nomes;
    }

}
