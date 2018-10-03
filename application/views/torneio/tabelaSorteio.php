<h1>Emparceiramento dos jogos</h1>
        <table class="home" border="1" width="100%">
            <tr>
                <td id="home">Nº</td>
                <td id="home">Brancas</td>
                <td id="home"> &DoubleLeftRightArrow;</td>
                <td id="home">Negras</td>                
            </tr>
        <?php    
        $i = 0;
        $j = 1;
        $b = 1;
        
        for($a= 0; $a< sizeof($nomes)/2; $a++){
            echo "<tr>";
                echo "<td>$b</td>";
                echo "<td>$nomes[$i] </td>";
                echo "<td> X </td>";
                echo "<td>$nomes[$j] </td>";
                echo "</tr>";
                $b++;
                $i += 2;
                $j +=2;  } ?> 
        </table>

 
                
       
