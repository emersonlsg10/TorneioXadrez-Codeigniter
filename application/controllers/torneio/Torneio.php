<?php
require_once 'Ponto.php';
class Torneio extends CI_Controller {

    var $id_torneio;
    var $jogador1 = array('id' => null, 'categoria' => null, 'pontos' => null, 'vitorias' => null, 'derrotas' => null, 'empates' => null, 'jogos' => null);
    var $jogador2 = array('id' => null, 'categoria' => null, 'pontos' => null, 'vitorias' => null, 'derrotas' => null, 'empates' => null, 'jogos' => null);
    var $resultado;
    var $j1;
    var $j2;

    function __construct() {
        parent::__construct();
        $this->load->model("torneio_model");
        $this->load->model("usuario_model");
    }

    public function index() {

        $result = $this->usuario_model->obterTodos();

        $vetor["usuarios"] = $result;

        $this->template->load("template/teste", "torneio/formularioTorneio", $vetor);
    }

    public function salvar() {
        $this->torneio_model->inserir();
        $this->obterDadosTorneio();
        $this->obterDadosUsuario();     
        $ponto = new Ponto();
        $ponto->carregarDados($this->resultado, $this->jogador1, $this->jogador2);
        redirect(site_url("torneio/torneio/index"));
    }

    function obterDadosTorneio() {
        $this->result = $this->torneio_model->obterLinha($this->torneio_model->pegaUltimoid());
//pega dados da tabela torneio
        foreach ($this->result as $key => $value) {
            $this->id_torneio = $value->id_torneio;
            $this->jogador1['id'] = $value->jogador1;
            $this->jogador2['id'] = $value->jogador2;
            $this->resultado = $value->resultado;
        }
    }
 
    function obterDadosUsuario() {
        //pega dados da tabela usuario
        $this->j1 = $this->usuario_model->pegaUsuarioPorId($this->jogador1['id']);
        $this->j2 = $this->usuario_model->pegaUsuarioPorId($this->jogador2['id']);

        $this->objeto = (object) $this->j1;
        $this->object = (object) $this->j2;

        $this->jogador1['categoria'] = $this->objeto->categoria;
        $this->jogador1['pontos'] = $this->objeto->pontos;
        $this->jogador1['vitorias'] = $this->objeto->vitorias;
        $this->jogador1['derrotas'] = $this->objeto->derrotas;
        $this->jogador1['empates'] = $this->objeto->empates;
        $this->jogador1['jogos'] = $this->objeto->jogos;
        
        $this->jogador2['categoria'] = $this->object->categoria;
        $this->jogador2['pontos'] = $this->object->pontos;
        $this->jogador2['vitorias'] = $this->object->vitorias;
        $this->jogador2['derrotas'] = $this->object->derrotas;
        $this->jogador2['empates'] = $this->object->empates;
        $this->jogador2['jogos'] = $this->objeto->jogos;
    }       
}
