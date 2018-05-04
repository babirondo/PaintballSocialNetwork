<?php
namespace raiz;
session_start();
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);



require_once("include/class_api.php");
require_once("include/globais.php");

$API = new class_API();
$Globais = new Globais();
// Load our autoloader
require_once ("vendor/autoload.php");


$trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
$Dados_Usuario_logado = $API->CallAPI("GET",  strtr(  $Globais->Players_GET_endpoint, $trans)  ) ;


//echo "<PRE>";var_dump($_POST); echo "</PRE>";

if ( $_POST["editarExperience"] == 1) {

    // posting new experience
    $array_times = null;
    $time = $array_times['time'] = $_POST["time"];
    $inicio = $array_times['inicio'] = $_POST["inicio"];

    $fim = $array_times['fim'] = $_POST["fim"];
    $idtime = $array_times['idtime'] = $_POST["idtime"];
    $resultados = $array_times['resultados'] = $_POST["resultados"];
    $array_times['idjogadorlogado'] =  $_SESSION["idjogadorlogado"];
    $trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"], ":idexperiencia" => $_POST["idexperience"] );
    $query_API = $API->CallAPI("PUT", strtr(  $Globais->editar_experiencia, $trans) , json_encode($array_times)); //


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


    $trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"], ":idexperiencia" => $idexperiencia );
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

if ( $_POST["submitted"] == 1) {

  //  var_dump($_FILES);
    $array = null;
    $nome = $array['nome'] = $_POST["nome"];
    $foto = $array['foto'] = $_FILES["foto"];
    $idade = $array['idade'] = $_POST["idade"];
    $cidade = $array['cidade'] = $_POST["cidade"];
    $snake = $array['Snake'] = $_POST["Snake"];
    $snakecorner = $array['SnakeCorner'] = $_POST["SnakeCorner"];
    $backcenter = $array['BackCenter'] = $_POST["BackCenter"];
    $doritos = $array['Doritos'] = $_POST["Doritos"];
    $doritoscorner = $array['DoritosCorner'] = $_POST["DoritosCorner"];
    $coach = $array['Coach'] = $_POST["Coach"];

    $treino = $array['treino'] = $_POST["treino"];
    $nivelcompeticao = $array['nivelcompeticao'] = $_POST["nivelcompeticao"];
    $procurando = $array['procurando'] = $_POST["procurando"];


    $trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );

    $query_API = $API->CallAPI("PUT", strtr(  $Globais->Players_UPDATE_endpoint, $trans)  , json_encode($array));

    //var_dump($query_API);
    if ($query_API){
        if (@$query_API["resultado"] == "SUCESSO") {
            $mensagem_retorno_dados =  "Dados Salvos com sucesso";
        }
        else
            $mensagem_retorno_dados = "ERRO".@$query_API["erro"];
    }
    else
        $mensagem_retorno_dados =  $query_API["erro"]."404 - API Indisponivel";





    if ($_POST["time"] && $_POST["inicio"])
    {
        // posting new experience
        $array_times = null;
        $time = $array_times['time'] = $_POST["time"];
        $inicio = $array_times['inicio'] = $_POST["inicio"];

        $fim = $array_times['fim'] = $_POST["fim"];
        $idtime = $array_times['idtime'] = $_POST["idtime"];
        $resultados = $array_times['resultados'] = $_POST["resultados"];
        $array_times['idjogadorlogado'] =  $_SESSION["idjogadorlogado"];

        $query_API = $API->CallAPI("POST", $Globais->Players_ADD_TEAM_endpoint, json_encode($array_times));


        if (is_array($query_API)){
            if ($query_API["resultado"] == "SUCESSO") {
                $mensagem_retorno_experience =  "Dados Salvos com sucesso";
            }
            else
                $mensagem_retorno_experience = "ERRO".$query_API["erro"];
        }
        else
            $mensagem_retorno_experience =   "404 - API Indisponivel" . (($verbose)?$query_API:"");

    }

}


$trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
$query_API = $API->CallAPI("GET",  strtr(  $Globais->Players_GET_endpoint, $trans));
$mensagem_retorno = @$query_API["erro"];

foreach (@$query_API["JOGADORES"] as $jog){
    $nome = @$jog['nome'];
    $idade = @$jog['idade'];
    $cidade = @$jog['cidade'];
    $foto = @$jog['foto'];
    $snake = @$jog['snake'] ;
    $snakecorner = @$jog['snakecorner'] ;
    $backcenter = @$jog['backcenter'] ;
    $doritos = @$jog['doritos'] ;
    $coach = @$jog['coach'] ;
    $doritoscorner = @$jog['doritoscorner'] ;


    $treino = @$jog['treino'] ;
    $nivelcompeticao = @$jog['nivelcompeticao'] ;
    $procurando =@$jog['procurando'] ;


}



try {

//buscando informacao de experienia
    $endpoint_tratado = null;
    $endpoint_tratado = str_replace(":idjogadorlogado", $_SESSION["idjogadorlogado"],  $Globais->listar_times_de_um_jogador);



    $jogador_experiences = $API->CallAPI("GET",  $endpoint_tratado );

} catch (Exception $e) {
    echo 'ERRO MEUPERFIL: ',  $e->getMessage(), "\n";

}



// CONFIGURANDO VARIAVEIS PARA TEMPLATE
$loader = new \Twig_Loader_Filesystem(__DIR__."/templates");
$twig = new \Twig_Environment( $loader );
$template = $twig->load('meuperfilUI.php');

$traduz_template = null;
$traduz_template["HOME"]["LINK"] = "HOME";
$traduz_template["HOME"]["URL"] = $Globais->ROTA_RAIZ;

$traduz_template["MYPROFILE"]["LINK"] = "My Profile";
$traduz_template["MYPROFILE"]["URL"] = $Globais->MyProfileUI;

$traduz_template["PROCURARTIMES"]["LINK"] = "Procurar Times";
$traduz_template["PROCURARTIMES"]["URL"] = $Globais->ProcurarTimesUI;
$traduz_template["PROCURARJOGADORES"]["LINK"] = "Procurar Jogadores";
$traduz_template["PROCURARJOGADORES"]["URL"] = $Globais->ProcurarJogadoresUI;

$traduz_template["MYSQUAD"]["LINK"] = "My Squad";
$traduz_template["MYSQUAD"]["URL"] = $Globais->MeusTimes;

$traduz_template["USUARIO_LOGADO"]["nome"] = $Dados_Usuario_logado["JOGADORES"][$_SESSION["idjogadorlogado"]]["nome"];

$traduz_template["LOGOUT"]["LINK"] = "LOGOUT";
$traduz_template["LOGOUT"]["URL"] = $Globais->LogoutUI ;



$traduz_template["FormACtion"] =  $Globais->MyProfileUI;
$traduz_template["mensagem_retorno_experience"] =  $mensagem_retorno_experience;
$traduz_template["mensagem_retorno_dados"] =  $mensagem_retorno_dados;


$traduz_template["nome"] = $nome;
$traduz_template["cidade"] = $cidade;
$traduz_template["idade"] = $idade;

$traduz_template["nivelcompeticao"] = $nivelcompeticao;
$traduz_template["treino"] = $treino;
$traduz_template["procurando"] = $procurando;

$traduz_template["Snakeno"] = (($snake=="-")?"selected":"");
$traduz_template["Snake1"] = (($snake=="<1")?"selected":"");
$traduz_template["Snake1-3"] = (($snake=="1-3")?"selected":"");
$traduz_template["Snake35"] = (($snake=="3-5")?"selected":"");
$traduz_template["Snake5"] = (($snake==">5")?"selected":"");

$traduz_template["SnakeCornerno"] = (($snakecorner=="-")?"selected":"");
$traduz_template["SnakeCorner1"] = (($snakecorner=="<1")?"selected":"");
$traduz_template["SnakeCorner13"] = (($snakecorner=="1-3")?"selected":"");
$traduz_template["SnakeCorner35"] = (($snakecorner=="3-5")?"selected":"");
$traduz_template["SnakeCorner5"] = (($snakecorner==">5")?"selected":"");

$traduz_template["BackCenterno"] = (($backcenter=="-")?"selected":"");
$traduz_template["BackCenter1"] = (($backcenter=="<1")?"selected":"");
$traduz_template["BackCenter13"] = (($backcenter=="1-3")?"selected":"");
$traduz_template["BackCenter35"] = (($backcenter=="3-5")?"selected":"");
$traduz_template["BackCenter5"] = (($backcenter==">5")?"selected":"");

$traduz_template["DoritosCornerno"] = (($doritoscorner=="-")?"selected":"");
$traduz_template["DoritosCorner1"] = (($doritoscorner=="<1")?"selected":"");
$traduz_template["DoritosCorner13"] = (($doritoscorner=="1-3")?"selected":"");
$traduz_template["DoritosCorner35"] = (($doritoscorner=="3-5")?"selected":"");
$traduz_template["DoritosCorner5"] = (($doritoscorner==">5")?"selected":"");

$traduz_template["Doritosno"] = (($doritos=="-")?"selected":"");
$traduz_template["Doritos1"] = (($doritos=="<1")?"selected":"");
$traduz_template["Doritos13"] = (($doritos=="1-3")?"selected":"");
$traduz_template["Doritos35"] = (($doritos=="3-5")?"selected":"");
$traduz_template["Doritos5"] = (($doritos==">5")?"selected":"");
$traduz_template["Doritos"] = $traduz_template["Doritos-3-5"];


$traduz_template["Coachno"] = (($coach=="-")?"selected":"");
$traduz_template["Coach1"] = (($coach=="<1")?"selected":"");
$traduz_template["Coach13"] = (($coach=="1-3")?"selected":"");
$traduz_template["Coach35"] = (($coach=="3-5")?"selected":"");
$traduz_template["Coach5"] = (($coach==">5")?"selected":"");

$traduz_template["endpoint_autocomplete"] = $Globais->getTimes;

//var_dump($foto);

$traduz_template["foto"] = $foto;
$traduz_template["time"] = $time;
$traduz_template["inicio"] = $inicio;
$traduz_template["fim"] = $fim;
$traduz_template["idtime"] = $idtime;

$traduz_template["title_pagina"] =  $Globais->Titulo;

$listaTime=null;
$novalistatimesretornados=null;
if (@is_array($jogador_experiences["EXPERIENCES"])){
    foreach (@$jogador_experiences["EXPERIENCES"] as $idexperiencia => $foreach_linha){
        $listaTimeUnicos[$foreach_linha["idtime"]] = $foreach_linha["idtime"];

        $trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"], ":idexperiencia" => $idexperiencia );
        $novalistatimesretornados["EXPERIENCES"][$idexperiencia] = $foreach_linha;
        $novalistatimesretornados["EXPERIENCES"][$idexperiencia]["deletarExperience"] =  strtr(  $Globais->excluir_experiencia, $trans);
        $novalistatimesretornados["EXPERIENCES"][$idexperiencia]["editarExperience"] =  strtr(  $Globais->editar_experienciaUI, $trans);
    }

    $array_times = null;
    $array_times['idtimes'] =  implode(",",$listaTimeUnicos);
    $query_API = $API->CallAPI("POST", $Globais->ProcurarTimes, json_encode($array_times));

    $traduz_template["experiences"] = $novalistatimesretornados["EXPERIENCES"];
    $traduz_template["Times"] = $query_API["TIMES"];
}

//var_dump($novo_array);
echo  $template->render( $traduz_template );

