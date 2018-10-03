<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/classificacao.css") ?>" />        
<h1>Classificação Geral</h1>
        <hr/>
        
        <table id="classificacao" class="classificacao" border="1" width="100%">
            <tr>
                <td id="classific">Posição</td>
                <td id="classific">Nome</td>
                <td id="classific">Categoria</td>
                <td id="classific">Pontos</td>
                <td id="classific">Vitorias</td>
                <td id="classific">Empates</td>
                <td id="classific">Derrotas</td>
            </tr>

            <?php
            $this->i=1;
            foreach ($usuarios as $usuario) {
                echo "<tr>";
                echo "<td>$this->i º</td>";
                echo "<td>$usuario->nome </td>";
                echo "<td>$usuario->categoria </td>";
                echo "<td>$usuario->pontos </td>";
                echo "<td>$usuario->vitorias </td>";
                echo "<td>$usuario->empates </td>";
                echo "<td>$usuario->derrotas </td>";
                $this->i++;
            }
            ?>
            <table/>

