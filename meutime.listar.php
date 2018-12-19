<?php
namespace raiz;
session_start();
set_time_limit(6);

require_once("include/class_api.php");
require_once("include/globais.php");

$API = new class_API();
$Globais = new Globais();

?><tr>
    <td>Time</td>
</tr>

<tr>
    <?php
    $trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"], ":idexperiencia" => $id );
    ?>
    <td><a href="<?=strtr(  $Globais->CriarMeuTime, $trans);?>">Criar novo Time</a> </td>
</tr>


<?php


$endpoint_tratado = null;
$endpoint_tratado = str_replace(":idjogadorlogado", $_SESSION["idjogadorlogado"],  $Globais->MeusTimesRemoto);
$time_cadastrados = $API->CallAPI("GET",  $endpoint_tratado );

if (@is_array($time_cadastrados[TIMES]))
{



    foreach ($time_cadastrados[TIMES] as $id => $linha){

        echo " <TR>
                    <td>Time: ".$linha["time"]."</td>
               </TR>";
        if (is_array($jogadores_dos_times["TIMES"][$id]["JOGADORES"])){
            foreach ($jogadores_dos_times["TIMES"][$id]["JOGADORES"] as $idjogador => $dadosJogador){

                echo " <TR>
                    <td></td>
                    <td>  ".$dadosJogador["NOME"]."</td>
               </TR>";
            }

        }


    }
}
else{
    echo " <TR>
                <td>Nenhuma Time cadastrado</td>
            </TR>";
}

//
?>
