<head>

<script type="text/javascript">

function validateForm()

{

var x=document.forms["cadastro"]["nome"].value; //nome do form e nome do campo são case sensitive (a <> A)

if (x==null || x=="")

{

alert("O campo nome é obrigatorio");

return false;

}

}

</script>

</head>


<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/cadastro.css") ?>" />
        <h1>Cadastro de jogadores</h1>
        <hr/>
        
        <form name="cadastro" id="adicionar" method="post" action="<?php echo site_url("usuario/salvar") ?>" onsubmit="return validateForm()" >
            <fieldset id="cadastro">
            <label>Nome: </label>
            <input type="text" name="nome" /><br/>
            
            <label>Categoria: </label><br/>
            <input type="radio" name="categoria" value="Iniciante" id="cIniciante" checked /> <label for="cIniciante" >Iniciante</label><br/>
            <input type="radio" name="categoria" value="Intermediario" id="cIntermediario" /> <label for="cIntermediario" >Intermediario</label><br/>
            <input type="radio" name="categoria" value="Avançado" id="cAvançado" /> <label for="cAvançado" >Avançado</label><br/>
                 
            <button type="submit">Cadastrar</button>
            </fieldset>
        </form>
