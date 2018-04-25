<?php
namespace raiz;
session_start();

require_once("include/class_api.php");
require_once("include/globais.php");

$API = new class_API();
$Globais = new Globais();

$array_times = null;
$time = $array_times['time'] = $_POST["time"];
$treino = $array_times['treino'] = $_POST["treino"];
$localtreino = $array_times['localtreino'] = $_POST["localtreino"];
$nivelcompeticao = $array_times['nivelcompeticao'] = $_POST["nivelcompeticao"];
$procurando = $array_times['procurando'] = $_POST["procurando"];
$array_times['filtro'] = 1;

?>

            <tr>
                <td>

                    <table border="1">

                        <tr>
                            <td>Time</td>
                            <td><input type="text" name="time" value="<?=$time;?>" ></td>
                        </tr>
                        <tr>
                            <td>Local de Treino</td>
                            <td><input type="text" name="localtreino" value="<?=$localtreino;?>" ></td>
                        </tr>
                    <tr>
                        <td>Nivel de Competicao</td>
                        <td><input type="text" name="nivelcompeticao"  value="<?=$nivelcompeticao;?>" ></td>
                    </tr>
                    <tr>
                        <td>Procurando por Integrantes ?</td>
                        <td>
                            Snake  <input type="checkbox" name="procurando[Snake]" <?=(($procurando[Snake])?" checked ":"");?> value="Snake">
                            Snake Corner <input type="checkbox" name="procurando[SnakeCorner]"  <?=(($procurando[SnakeCorner])?" checked ":"");?> value="SnakeCorner">
                            Back Center <input type="checkbox" name="procurando[BackCenter]"  <?=(($procurando[BackCenter])?" checked ":"");?> value="BackCenter">
                            Doritos Corner <input type="checkbox" name="procurando[DoritosCorner]"  <?=(($procurando[DoritosCorner])?" checked ":"");?> value="DoritosCorner">
                            Doritos <input type="checkbox" name="procurando[Doritos]"  <?=(($procurando[Doritos])?" checked ":"");?> value="Doritos">
                            Coach <input type="checkbox" name="procurando[Coach]"  <?=(($procurando[Coach])?" checked ":"");?> value="Coach">

                        </td>
                    </tr>
                    <tr>
                        <td>Disponibilidade de Treinos</td>
                        <td>
                            Segunda Feira  <input type="checkbox" name="treino[Segunda]"  <?=(($treino[Segunda])?" checked ":"");?> value="Segunda">
                            Terca Feira  <input type="checkbox" name="treino[Terca]" <?=(($treino[Terca])?" checked ":"");?> value="Terca">
                            Quarta Feira  <input type="checkbox" name="treino[Quarta]" <?=(($treino[Quarta])?" checked ":"");?> value="Quarta">
                            Quinta Feira  <input type="checkbox" name="treino[Quinta]" <?=(($treino[Quinta])?" checked ":"");?>  value="Quinta">
                            Sexta Feira  <input type="checkbox" name="treino[Sexta]" <?=(($treino[Sexta])?" checked ":"");?>  value="Sexta">
                            Sabado   <input type="checkbox" name="treino[Sabado]" <?=(($treino[Sabado])?" checked ":"");?>  value="Sabado">
                            Domingo   <input type="checkbox" name="treino[Domingo]" <?=(($treino[Domingo])?" checked ":"");?>  value="Domingo">
                        </td>

                        <td rowspan="4">
                            <input type="submit" name="pesquisar" value="Pesquisar">
                        </td>
                    </tr>
                    </table>

                </td>
            </tr>

<tr>
    <td>

        <table border="1">

<?php


if ($_POST["submitted"]==1){

    $trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"], ":idexperiencia" => $id );
    $time_pesquisados = $API->CallAPI("POST",  strtr(  $Globais->ProcurarTimes, $trans)  , json_encode($array_times));

    if (@is_array($time_pesquisados[TIMES]))
    {



        foreach ($time_pesquisados[TIMES] as $id => $linha){
            $p++;

            echo " <TR bgcolor=".(($p%2)?"cccccc":"").">
                        <td>Time: ".$linha["nome"]."</td>
                        <td>Nivel Competicao: ".$linha["nivelcompeticao"]."</td>
                        <td>Local Treino: ".$linha["localtreino"]."</td>
    
                        <td>Owner: ".$linha["idowner"]."</td>
                        <td>Quantidade de Jogadores: ".$linha["qtde_jogadores"]."</td>
                   </TR>
                   <tr bgcolor=".(($p%2)?"cccccc":"").">      
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
}
else{
    echo " <TR>
                    <td>Selecione um filtro</td>
                </TR>";
}

//
?>
        </table>

    </td>
</tr>