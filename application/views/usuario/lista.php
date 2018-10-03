
<h1><?php echo $titulo; ?></h1>
    <a class="botao"  href="<?php echo site_url("usuario/adicionar")?>"><button id="botao">Adicionar Jogador</button></a>
        <hr/>
        
        
        
        <table class="home" border="1" width="100%">
            <tr>
                <td id="home">Nº</td>
                <td id="home">Nome</td>
                <td id="home">Categoria</td>
                <td id="home">Ações</td>
                
            </tr>

            <?php
            $i = 1;
            foreach ($usuarios as $usuario) {
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>$usuario->nome </td>";
                echo "<td>$usuario->categoria </td>";
                echo "<td>"
                     ."<a href='". site_url("usuario/excluir/$usuario->id") ."'><button id='but'> Excluir </button> </a>"
                     ."<a href='". site_url("usuario/form_edit/$usuario->id") ."'> <button id='but'>Atualizar </button> </a>"
                     ."</td>";
                echo "</tr>";
                $i++;
            }
            ?>
            <table/>
