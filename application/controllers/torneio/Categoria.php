<?php

require_once 'CategoriaIgual.php';
require_once 'InicianteIntermediario.php';
require_once 'InicianteAvancado.php';
require_once 'IntermediarioAvancado.php';

class Categoria {

    public function verificaCategoria($jogador1, $jogador2, $resultado) {
        $this->resultado = $resultado;
        //categorias iguais
        if ($jogador1['categoria'] == $jogador2['categoria']) {
            $cat = new CategoriaIgual();
            $cat->index($jogador1, $jogador2, $this->resultado);
        }
        //Inciante contra Intermediário
        if ($jogador1['categoria'] == "Iniciante" && $jogador2['categoria'] == "Intermediario" || $jogador1['categoria'] == "Intermediario" && $jogador2['categoria'] == "Iniciante") {
            $cat = new InicianteIntermediario();
            $cat->index($jogador1, $jogador2, $this->resultado);
        }
        //Inicante contra Avançado
        if ($jogador1['categoria'] == "Iniciante" && $jogador2['categoria'] == "Avançado" || $jogador1['categoria'] == "Avançado" && $jogador2['categoria'] == "Iniciante") {
            $cat = new InicianteAvancado();
            $cat->index($jogador1, $jogador2, $this->resultado);
        }
        //Intermediário contra Avançado
        if ($jogador1['categoria'] == "Intermediario" && $jogador2['categoria'] == "Avançado" || $jogador1['categoria'] == "Avançado" && $jogador2['categoria'] == "Intermediario") {
            $cat = new IntermediarioAvancado();
            $cat->index($jogador1, $jogador2, $this->resultado);
        }
    }

}
