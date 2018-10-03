<?php

class Torneio_model extends CI_Model {

    var $jogador1;
    var $jogador2;
    var $resultado;
    var $rodada;

    public function inserir() {

        $this->jogador1 = $this->input->post("jogador1");
        $this->jogador2 = $this->input->post("jogador2");
        $this->resultado = $this->input->post("resultado");
        $this->rodada = $this->input->post("rodada");
        $this->db->insert("torneio", $this);
    }

    public function obterTodos() {
        return $this->db->get("torneio")->result();
    }

    public function deletar($codigoPartida) {
        $this->db->where("id_torneio", $codigoPartida);
        $this->db->delete("torneio");
    }

    public function pegaUltimoid() {
        return $this->db->insert_id();
    }

    public function obterLinha($id) {
        $this->db->where("id_torneio", $id);
        $resultado = $this->db->get("torneio")->result();
        return $resultado;
    }

    public function update() {
        $this->jogador1 = $this->input->post("jogador1");
        $this->jogador2 = $this->input->post("jogador2");
        $this->resultado = $this->input->post("resultado");
        $this->rodada = $this->input->post("rodada");
        $id_torneio = $this->input->post("id_torneio");
        $this->db->where("id", $id_torneio);
        $this->db->update("torneio", $this);
    }

}
