<head>

<script type="text/javascript">

function validateForm()

{

var x=document.forms["atualizar"]["nome"].value; //nome do form e nome do campo são case sensitive (a <> A)

if (x==null || x=="")

{

alert("O campo nome é obrigatorio");

return false;

}

}

</script>

</head>

<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/cadastro.css") ?>"  />
<h1>Cadastro de jogadores:</h1>
        <hr/>
        
        <form name="atualizar" id="adicionar" method="post" action="<?php echo site_url("usuario/atualizar") ?>" onsubmit="return validateForm()">
            <fieldset id="cadastro">
            
            <input type="hidden" name="codigo" value="<?= $usuario->id ?>"/>
            
            <label>Nome: </label>
            <input type="text" name="nome" value="<?php echo $usuario->nome ?>" /><br/>
            
            <label>Categoria: </label><br/>
            <input type="radio" name="categoria" value="Iniciante" id="cIniciante" checked /> <label for="cIniciante" >Iniciante</label><br/>
            <input type="radio" name="categoria" value="Intermediario" id="cIntermediario"  /> <label for="cIntermediario" >Intermediario</label><br/>
            <input type="radio" name="categoria" value="Avançado" id="cAvançado"  /> <label for="cAvançado" >Avançado</label><br/>
                 
            <button type="submit">Atualizar</button>
            </fieldset>
        </form>