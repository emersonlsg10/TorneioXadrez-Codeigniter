<?php

class Usuario extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("usuario_model");
    }

    public function adicionar() {
        $this->template->load("template/teste", "usuario/formulario");
          }

    public function salvar() {
        $this->usuario_model->inserir();
        redirect(site_url("usuario/index"));
    }

    //envia dados para a visão LISTA
    public function index() {
        $resultado = $this->usuario_model->obterTodos();

        $vetor["usuarios"] = $resultado;
        $vetor["titulo"] = "Jogadores Inscritos";

        $this->template->load("template/teste","usuario/lista", $vetor);
    }

    public function excluir($codigo) {
        $this->usuario_model->deletar($codigo);
        redirect(site_url("usuario/index"));
    }

    public function form_edit($codigo) {
        $vetor["usuario"] = $this->usuario_model->pegaUsuarioPorId($codigo);
        $this->template->load("template/teste","usuario/form_edit", $vetor);
    }
    public function atualizar() {
        $this->usuario_model->update();
        redirect(site_url("usuario/index"));
    }

}
