<?php

class CategoriaIgual extends Ponto {

    var $jogador1;
    var $jogador2;
    var $resultado;

    function index($jogador1, $jogador2, $resultado) {
        $this->jogador1 = $jogador1;
        $this->jogador2 = $jogador2;
        $this->resultado = $resultado;
        //seta jogos
         $this->setPontos();
          $this->salvar();
         $this->resetar();
    }

    function resetar() {
        $this->jogador1 = null;
        $this->jogador2 = null;
        $this->resultado = null;
    }

    function setPontos() {

        switch ($this->resultado) {
            case 1:
                $this->jogador1['pontos'] += 1;
                $this->jogador2['pontos'] += 0;
                //vitoria e derrota
                $this->jogador1['vitorias'] += 1;
                $this->jogador2['derrotas'] += 1;
                break;
            case 2:
                $this->jogador2['pontos'] += 1;
                $this->jogador1['pontos'] += 0;
                //vitoria e derrota
                $this->jogador2['vitorias'] += 1;
                $this->jogador1['derrotas'] += 1;
                break;
            case 3:
                $this->jogador1['pontos'] += 0.5;
                $this->jogador2['pontos'] += 0.5;
                //empate
                $this->jogador1['empates'] += 1;
                $this->jogador2['empates'] += 1;
        }
    }

    function salvar() {
        $this->jogador1['jogos'] = $this->jogador1['vitorias'] + $this->jogador1['derrotas'] + $this->jogador1['empates'] ;
        $this->jogador2['jogos'] = $this->jogador2['vitorias'] + $this->jogador2['derrotas'] + $this->jogador2['empates'];
        $this->injetarDados($this->jogador1, $this->jogador2);
    }

}
