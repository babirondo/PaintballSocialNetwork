<?php
namespace raiz;
session_start();
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

require_once("include/class_api.php");
require_once("include/globais.php");

$API = new class_API();
$Globais = new Globais();
$verbose = 1;


if ( $_POST["submitted"] == "criartimeG") {
    //echo "<PRE>";var_dump($_POST); echo "</PRE>";


    $array_times = null;
    $time = $array_times['time'] = $_POST["time"];
    $treino = $array_times['treino'] = $_POST["treino"];
    $localtreino = $array_times['localtreino'] = $_POST["localtreino"];
    $nivelcompeticao = $array_times['nivelcompeticao'] = $_POST["nivelcompeticao"];
    $procurando = $array_times['procurando'] = $_POST["procurando"];


    $trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
    $query_API = $API->CallAPI("POST", strtr(  $Globais->CriarMeuTimeSalvar, $trans) , json_encode($array_times) ) ;

    $operacao=null;
    if (is_array($query_API)){
        if ($query_API["resultado"] == "SUCESSO") {
            $mensagem_retorno =  "Dados Salvos com sucesso";
        }
        else
            $mensagem_retorno = "ERRO".$query_API["erro"];
    }
    else
        $mensagem_retorno =   "404 - API Indisponivel" . (($verbose)?$query_API:"");

}




//$mensagem_retorno = $time_cadastrados["erro"];


?>


<HTML>
<HEAD>
    <title> sem cache da pagina</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">



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
            <table border="1">
                <form action="<?=$Globais->MeusTimes;?>" method="POST">

                    <input type="hidden"  name="submitted" value="1">


                <?php
                echo "<tr>
                            <td><font color='red'>$mensagem_retorno</font></td>
                        </tr>";
                switch ($operacao){
                    case("criartime"):
                        include ("meutime.criar.php");
                    break;
                    default:
                        include ("meutime.listar.php");
                }

                ?>




            </table>
        </form>
    </body>
</HTML>

