<?php

class Usuario_model extends CI_Model {

    var $nome;
    var $categoria;
    var $pontos;
    var $vitorias;
    var $derrotas;
    var $empates;
    var $jogos;

    public function inserir() {

        $this->nome = $this->input->post("nome");
        $this->categoria = $this->input->post("categoria");
        $this->pontos = 0;
        $this->vitorias = 0;
        $this->derrotas = 0;
        $this->empates = 0;
        $this->jogos = 0;
        $this->db->insert("usuario", $this);
    }

    public function inserirPontos($jogador) {
        $this->db->where("id", $jogador['id']);
        $this->db->update("usuario", $jogador);
    }

    public function obterTodos() {
        return $this->db->get("usuario")->result();
    }

    public function deletar($codigoUsuario) {
        $this->db->where("id", $codigoUsuario);
        $this->db->delete("usuario");
    }

    public function pegaUsuarioPorId($id) {
        $this->db->where("id", $id);
        return $this->db->get("usuario")->row();
    }

    public function update() {
        $this->nome = $this->input->post("nome");
        $this->categoria = $this->input->post("categoria");
        $idusuario = $this->input->post("codigo");
        $this->db->set("nome", $this->nome);
        $this->db->set("categoria", $this->categoria);        
        $this->db->where("id", $idusuario);
        $this->db->update("usuario");
    }

    public function updatePontos($id, $pontos) {
        $this->db->where("id", $id);
        $this->db->set("pontos", $pontos);
        $this->db->update("usuario");
    }

    public function selecionar() {
        $this->db->select('nome');
        $this->db->select('categoria');
        $this->db->select('pontos');
        $this->db->select('vitorias');
        $this->db->select('empates');
        $this->db->select('derrotas');
        $this->db->order_by("pontos desc, vitorias desc, empates desc, derrotas asc");
        $this->db->from('usuario');
        return $this->db->get()->result();
    }
    public function pegarNome($id) {
        $this->db->select("nome");
        $this->db->where("id", $id);
        $this->db->from("usuario");
        return $this->db->get()->row();
    }
    public function pegarNomes() {
        $this->db->select("nome");
        $this->db->from("usuario");
        return $this->db->get()->result();
    }

}
