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


    $array = null;
    $nome = $array['nome'] = $_POST["nome"];
    $idade = $array['idade'] = $_POST["idade"];
    $cidade = $array['cidade'] = $_POST["cidade"];
    $snake = $array['Snake'] = $_POST["Snake"];
    $snakecorner = $array['SnakeCorner'] = $_POST["SnakeCorner"];
    $backcenter = $array['BackCenter'] = $_POST["BackCenter"];
    $doritos = $array['Doritos'] = $_POST["Doritos"];
    $doritoscorner = $array['DoritosCorner'] = $_POST["DoritosCorner"];


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


    $nome = $query_API['nome'];
    $idade = $query_API['idade'];
    $cidade = $query_API['cidade'];
    $snake = $query_API['snake'] ;
    $snakecorner = $query_API['snakecorner'] ;
    $backcenter = $query_API['backcenter'] ;
    $doritos = $query_API['doritos'] ;
    $doritoscorner = $query_API['doritoscorner'] ;
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
                        <td>Idade</td>
                        <td><input type="text" name="idade" value="<?=$idade;?>"></td>
                    </tr>
                    <tr>
                        <td>Cidade/Pais</td>
                        <td><input type="text" name="cidade" value="<?=$cidade;?>"></td>
                    </tr>
                    <tr>
                        <td>Posicoes</td>
                    </tr>
                    <tr>
                        <td> Snake</td>
                        <td>
                            <select name="Snake">
                                <option value="-">Sem experiencia</option>
                                <option <?=(($snake=="<1")?"selected":"");?> value="<1">< 1 ano</option>
                                <option <?=(($snake=="1-3")?"selected":"");?>  value="1-3">1 a 3 anos</option>
                                <option  <?=(($snake=="3-5")?"selected":"");?> value="3-5">3 a 5</option>
                                <option <?=(($snake==">5")?"selected":"");?>  value=">5">> 5</option>
                            </select>
                        </td>

                        <td> </td>
                        <td> </td>

                        <td>Doritos</td>
                        <td>
                            <select name="Doritos">
                                <option value="-">Sem experiencia</option>
                                <option <?=(($doritos=="<1")?"selected":"");?> value="<1">< 1 ano</option>
                                <option <?=(($doritos=="1-3")?"selected":"");?>  value="1-3">1 a 3 anos</option>
                                <option  <?=(($doritos=="3-5")?"selected":"");?> value="3-5">3 a 5</option>
                                <option <?=(($doritos==">5")?"selected":"");?>  value=">5">> 5</option>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Snake Corner</td>
                        <td>
                            <select name="SnakeCorner">
                                <option value="-">Sem experiencia</option>
                                <option <?=(($snakecorner=="<1")?"selected":"");?> value="<1">< 1 ano</option>
                                <option <?=(($snakecorner=="1-3")?"selected":"");?>  value="1-3">1 a 3 anos</option>
                                <option  <?=(($snakecorner=="3-5")?"selected":"");?> value="3-5">3 a 5</option>
                                <option <?=(($snakecorner==">5")?"selected":"");?>  value=">5">> 5</option>
                            </select>
                        </td>

                        <td>Back Center</td>
                        <td>
                            <select name="BackCenter">
                                <option value="-">Sem experiencia</option>
                                <option <?=(($backcenter=="<1")?"selected":"");?> value="<1">< 1 ano</option>
                                <option <?=(($backcenter=="1-3")?"selected":"");?>  value="1-3">1 a 3 anos</option>
                                <option  <?=(($backcenter=="3-5")?"selected":"");?> value="3-5">3 a 5</option>
                                <option <?=(($backcenter==">5")?"selected":"");?>  value=">5">> 5</option>
                            </select>
                        </td>

                        <td>Doritos Corner</td>
                        <td>
                            <select name="DoritosCorner">
                                <option value="-">Sem experiencia</option>
                                <option <?=(($doritoscorner=="<1")?"selected":"");?> value="<1">< 1 ano</option>
                                <option <?=(($doritoscorner=="1-3")?"selected":"");?>  value="1-3">1 a 3 anos</option>
                                <option  <?=(($doritoscorner=="3-5")?"selected":"");?> value="3-5">3 a 5</option>
                                <option <?=(($doritoscorner==">5")?"selected":"");?>  value=">5">> 5</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                         <td colspan="5"><?php require("resume.php");?>  </td>
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