<?php
namespace raiz;
session_start();
set_time_limit(6);
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

require_once("include/class_api.php");
require_once("include/globais.php");

$API = new class_API();
$Globais = new Globais();
$verbose = 1;







$endpoint_tratado = null;
$endpoint_tratado = str_replace(":idjogadorlogado", $_SESSION["idjogadorlogado"],  $Globais->listar_times_de_um_jogador);

$time_cadastrados = $API->CallAPI("GET",  $endpoint_tratado );


//$mensagem_retorno = $time_cadastrados["erro"];


?>



            <table>

                    <input type="hidden"  name="submitted" value="1">
                <tr>
                    <td>Time</td>
                    <td><input type="text"  id="Time" name="time" value="<?=$time;?>"></td>

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

