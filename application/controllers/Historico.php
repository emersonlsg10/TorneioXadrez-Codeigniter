<?php

class Historico extends CI_Controller {

    var $dados;
    var $vetor;

    function __construct() {
        parent::__construct();
        $this->load->model("torneio_model");
        $this->load->model("usuario_model");
        $this->vetor["jogos"] = $this->torneio_model->obterTodos();
    }

    public function index() {

        $tabela["table"] = $this->criarTabela();

        $this->template->load("template/teste", "historico/historico", $tabela);
    }

    public function criarTabela() {
        $tabela = "";
        foreach ($this->vetor["jogos"] as $jogo) {
            $tabela .= "<tr>";
            $tabela .= "<td>$jogo->rodada ª </td>";
            $tabela .= "<td>" . $this->obterNome($jogo->jogador1)->nome . "</td>";
            $tabela .= "<td> X </td>";
            $tabela .= "<td>" . $this->obterNome($jogo->jogador2)->nome . "</td>";
            $tabela .= "<td>" . $this->obterResultado($jogo->resultado) . "</td>";
            $tabela .= "</tr>";
        }
        return $tabela;
    }

    public function obterResultado($param) {
        switch ($param) {
            case 1:
                $result = "Brancas venceram";
                break;
            case 2:
                $result = "Negras venceram";
                break;
            case 3:
                $result = "Empate";
                break;
        }
        return $result;
    }

    public function obterNome($id) {
        return $this->usuario_model->pegarNome($id);
    }

}
