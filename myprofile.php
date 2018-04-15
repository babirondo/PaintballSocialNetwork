<?php
namespace raiz;
session_start();
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

require_once("include/class_api.php");
require_once("include/globais.php");

$API = new class_API();
$Globais = new Globais();
$verbose = 1;

if ( $_POST["submitted"] == 1) {


    $array = null;
    $nome = $array['nome'] = $_POST["nome"];

    $query_API = $API->CallAPI("PUT", $Globais->Players_UPDATE_endpoint.$_SESSION["idusuariologado"], json_encode($array));

    if ($query_API){
        if ($query_API["resultado"] == "SUCESSO") {
            $mensagem_retorno =  "Dados Salvos com sucesso";
        }
        else
            $mensagem_retorno = "ERRO".$query_API["erro"];
    }
    else
        $mensagem_retorno =  $query_API["erro"]."404 - API Indisponivel";

}
else{
    $query_API = $API->CallAPI("GET", $Globais->Players_GET_endpoint.$_SESSION["idusuariologado"] );
    $mensagem_retorno = $query_API["erro"];

    $nome = $query_API['nome'] ;

}

?>
<HTML>
<HEAD>
    <title> titulo da pagina</title>
</HEAD>
<body>
<table width=90% height=500 align=center border="1">
    <tr>
        <td>  <?php require("header.php");  ?> </td>
    </tr>
    <tr>
        <td>  <?php require("menu.php");  ?> </td>
    </tr>
    <tr>
        <td>
            <table>
                <form action="<?=$Globais->ROTA_RAIZ;?>/MyProfile/" method="POST">
                    <input type="hidden"  name="submitted" value="1">
                    <tr>
                     <td>Nome</td>
                     <td><input type="text" name="nome" value="<?=$nome;?>"></td>
                 </tr>
                    <tr>
                        <td><input type="submit" value="Salvar"></td>
                    </tr>
                    <tr>
                        <td> <?=$mensagem_retorno;?> </td>
                    </tr>


                </form>
            </table>

        </td>
    </tr>
    <tr>
        <td>  <?php require("rodape.php");  ?> </td>
    </tr>
</table>

</body>

</HTML>