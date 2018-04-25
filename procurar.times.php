<?php
namespace raiz;
session_start();

require_once("include/class_api.php");
require_once("include/globais.php");

$API = new class_API();
$Globais = new Globais();


$trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"], ":idexperiencia" => $id );
$time_pesquisados = $API->CallAPI("GET",  strtr(  $Globais->ProcurarTimes, $trans) );

if (@is_array($time_pesquisados[TIMES]))
{



    foreach ($time_pesquisados[TIMES] as $id => $linha){

        echo " <TR>
                    <td>Time: ".$linha["nome"]."</td>
                    <td>Nivel Competicao: ".$linha["nivelcompeticao"]."</td>
                    <td>Local Treino: ".$linha["localtreino"]."</td>

                    <td>Owner: ".$linha["idwoner"]."</td>
                    <td>Quantidade de Jogadores: ".$linha["qtde_jogadores"]."</td>
               </TR>
               <tr>      
                    <td>Treinos: ".$linha["treino_segunda"]." ".$linha["treino_terca"]." ".$linha["treino_quarta"]." ".$linha["treino_quinta"]." ".$linha["treino_sexta"]." ".$linha["treino_sabado"]." ".$linha["treino_domingo"]." </td>
                    <td>Procurando Jogadores: ".$linha["procurando_snakecorner"]." ".$linha["procurando_snake"]." ".$linha["procurando_backcenter"]." ".$linha["procurando_doritoscorner"]." ".$linha["procurando_doritos"]." ".$linha["procurando_coach"]." </td>
               </TR>";



    }
}
else{
    echo " <TR>
                <td>Nenhuma Time encontrado</td>
            </TR>";
}

//
?>
