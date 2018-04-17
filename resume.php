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
    //echo "<PRE>";var_dump($_POST); echo "</PRE>";


    $array_times = null;
    $time = $array_times['time'] = $_POST["time"];
    $inicio = $array_times['inicio'] = $_POST["inicio"];
    $fim = $array_times['fim'] = $_POST["fim"];



    $query_API = $API->CallAPI("POST", $Globais->Players_ADD_TEAM_endpoint.$_SESSION["idusuariologado"]."/Team", json_encode($array_times));


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


if ( $deletarExperience == 1) {
    //echo "<PRE>";var_dump($_POST); echo "</PRE>";
    $verbose = 1;

    /*
    $array_times = null;
    $time = $array_times['time'] = $_POST["time"];
    $inicio = $array_times['inicio'] = $_POST["inicio"];
    $fim = $array_times['fim'] = $_POST["fim"];
    */
    $array_times=nul;;


    $trans=null;$trans = array(":idusuariologado" => $_SESSION["idusuariologado"], ":idexperiencia" => $idexperiencia );
    $query_API = $API->CallAPI("DELETE", strtr(  $Globais->delete_experiencia, $trans) , false); //json_encode($array_times)


    if (is_array($query_API)){
        if ($query_API["resultado"] == "SUCESSO") {
            $mensagem_retorno_delete =  "Dados Salvos com sucesso";
        }
        else
            $mensagem_retorno_delete = "ERRO".$query_API["erro"];
    }
    else
        $mensagem_retorno_delete =   "404 - API Indisponivel" . (($verbose)?$query_API:"");

}


$endpoint_tratado = null;
$endpoint_tratado = str_replace(":idusuariologado", $_SESSION["idusuariologado"],  $Globais->listar_times_de_um_jogador);


$time_cadastrados = $API->CallAPI("GET",  $endpoint_tratado );

//$mensagem_retorno = $time_cadastrados["erro"];


?>

            <table>

                    <input type="hidden"  name="submitted" value="1">
                <tr>
                    <td>Time</td>
                    <td><input type="text" name="time" value="<?=$time;?>"></td>

                    <td>Inicio</td>
                    <td><input type="text" size=5   name="inicio" value="<?=$inicio;?>"></td>

                    <td>Fim</td>
                    <td><input type="text" size="5" name="fim" value="<?=$fim;?>"></td>
                </tr>




                    <tr>
                        <td>
                                <font color="red">
                            <?=$mensagem_retorno_resume;?>
                            <?=$mensagem_retorno_delete;?>
                                </font>
                        </td>
                    </tr>
<?php

                if (is_array($time_cadastrados[TIMES]))
                {
                    foreach ($time_cadastrados[TIMES] as $id => $experiencia){
                        $trans=null;$trans = array(":idusuariologado" => $_SESSION["idusuariologado"], ":idexperiencia" => $id );
                        echo " <TR>
                                <td>Time: ".$experiencia["idtime"]."</td>
                                <td>Inicio: ".$experiencia["inicio"]."</td>
                                <td>Fim: ".$experiencia["fim"]."</td>
                                
                                <td><a href='".strtr(  $Globais->excluir_experiencia, $trans)."'> Excluir</a></td>
                            </TR>";
                    }
                }
                else{
                    echo " <TR>
                                <td>Nenhuma experiencia cadastrada</td>
                            </TR>";
                }

//
?>


            </table>

