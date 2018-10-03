<?php

class InicianteAvancado extends Ponto {

    var $jogador1;
    var $jogador2;
    var $resultado;

    function index($jogador1, $jogador2, $resultado) {
        $this->jogador1 = $jogador1;
        $this->jogador2 = $jogador2;
        $this->resultado = $resultado;


        $this->verificar();
        $this->salvar();
        $this->resetar();
    }

    function resetar() {
        $this->jogador1 = null;
        $this->jogador2 = null;
        $this->resultado = null;
    }

    function verificar() {
        if ($this->jogador1['categoria'] == "Iniciante") {
            $this->primeiroJogador();
        } else {
            $this->segundoJogador();
        }
    }

    function primeiroJogador() {
        switch ($this->resultado) {
            case 1:
                $this->jogador1['pontos'] += 2;
                $this->jogador2['pontos'] += 0;
                //vitoria e derrota
                $this->jogador1['vitorias'] += 1;
                $this->jogador2['derrotas'] += 1;
                break;
            case 2:
                $this->jogador2['pontos'] += 1;
                $this->jogador1['pontos'] += 0.5;
                //vitoria e derrota
                $this->jogador2['vitorias'] += 1;
                $this->jogador1['derrotas'] += 1;
                break;
            case 3:
                $this->jogador1['pontos'] += 1;
                $this->jogador2['pontos'] += 0.5;
                //empates
                $this->jogador1['empates'] += 1;
                $this->jogador2['empates'] += 1;
        }
    }

    function segundoJogador() {
        switch ($this->resultado) {
            case 1:
                $this->jogador1['pontos'] += 1;
                $this->jogador2['pontos'] += 0.5;
                //vitoria e derrota
                $this->jogador1['vitorias'] += 1;
                $this->jogador2['derrotas'] += 1;
                break;
            case 2:
                $this->jogador2['pontos'] += 2;
                $this->jogador1['pontos'] += 0;
                //vitoria e derrota
                $this->jogador2['vitorias'] += 1;
                $this->jogador1['derrotas'] += 1;
                break;
            case 3:
                $this->jogador1['pontos'] += 0.5;
                $this->jogador2['pontos'] += 1;
                //empates
                $this->jogador1['empates'] += 1;
                $this->jogador2['empates'] += 1;
        }
    }

    function salvar() {//seta jogos
        $this->jogador1['jogos'] = $this->jogador1['vitorias'] + $this->jogador1['derrotas'] + $this->jogador1['empates'];
        $this->jogador2['jogos'] = $this->jogador2['vitorias'] + $this->jogador2['derrotas'] + $this->jogador2['empates'];
        $this->injetarDados($this->jogador1, $this->jogador2);
    }

}
