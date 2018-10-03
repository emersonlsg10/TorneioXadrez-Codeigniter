<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("css/torneio.css") ?>" />
        <title>Torneio</title>
        <script type="text/javascript">

            function validateForm()

            {

                var x = document.forms["torneio"]["rodada"].value; //nome do form e nome do campo são case sensitive (a <> A)

                if (x == null || x == "")

                {

                    alert("Preencha o campo rodada!");

                    return false;

                }

            }

        </script>
    </head>
    <body>
        <h1>Partidas</h1>
        <hr/>
        <form name="torneio" id="torneio" method="post" action="<?php echo site_url("torneio/torneio/salvar") ?>" onsubmit="return validateForm()">
            <fieldset>
                <label>Brancas:</label>
                <select name="jogador1">
                    <?php
                    foreach ($usuarios as $usuario) {
                        echo "<option value='$usuario->id'>$usuario->nome</option>";
                    }
                    ?>
                </select>

                <label>&nbsp;&nbsp;Negras:</label>
                <select name="jogador2">
                    <?php
                    foreach ($usuarios as $usuario) {
                        echo "<option value='$usuario->id'>$usuario->nome</option>";
                    }
                    ?>
                </select>

                <label> &nbsp;&nbsp;Rodada:</label>
                <input type="number" name="rodada" /><br/>


                <label>Resultado: </label><br/>
                <input type="radio" name="resultado" value="1" id="jogador1" /> <label for="jogador1" >Brancas venceram!</label><br/>
                <input type="radio" name="resultado" value="2" id="jogador2" /> <label for="jogador2" >Negras venceram!</label><br/>
                <input type="radio" name="resultado" value="3" id="empate" checked/> <label for="empate" >Empate!</label><br/>


                <button type="submit">Salvar Partida</button>
            </fieldset>
        </form>
    </body>
</html>
