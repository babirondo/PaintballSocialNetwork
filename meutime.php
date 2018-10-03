<?php
namespace raiz;
session_start();
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

require_once("include/globais.php");

require_once ("vendor/autoload.php");
use REST\RESTCall;
$API = new RESTCall();

$Globais = new Globais();
$verbose = 1;

$trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
$Dados_Usuario_logado = $API->CallAPI("GET",  strtr(  $Globais->Players_GET_endpoint, $trans)  ) ;


if ($_POST["submitted"]== "criartimeG") {

    $array_times = null;
    $time = $array_times['time'] = $_POST["time"];
    $treino = $array_times['treino'] = $_POST["treino"];
    $nivelcompeticao = $array_times['nivelcompeticao'] = $_POST["nivelcompeticao"];
    $procurando = $array_times['procurando'] = $_POST["procurando"];
    $localtreino = $array_times['localtreino'] = $_POST["localtreino"];
    $foto = $array_times['foto'] = $_FILES["foto"];


    $trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
    if ($_POST["IDTIME"]>0){
        $array_times['idtime'] = $_POST["IDTIME"];
        $query_API = $API->CallAPI("PUT", strtr(  $Globais->CriarMeuTimeSalvar, $trans) , json_encode($array_times) ) ;
    }
    else
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

$endpoint_tratado = null;
$endpoint_tratado = str_replace(":idjogadorlogado", $_SESSION["idjogadorlogado"],  $Globais->MeusTimesRemoto);
$time_cadastrados = $API->CallAPI("GET",  $endpoint_tratado );



if (@is_array($time_cadastrados[TIMES])) {
    $idtimes = null;
    foreach (@$time_cadastrados[TIMES] as $id => $linha) {
        $idtimes[$id] = $id;

        $trans=null;$trans = array(":idtime" => $id );

        @$time_cadastrados[TIMES][$id]['linkEditar'] = strtr(  $Globais->Editar_Squad, $trans);
    }
    if (is_array($idtimes)) {
        $relacaotimes=null;
        $relacaotimes['idtimes'] =   $idtimes;
        $jogadores_dos_times = $API->CallAPI("POST", $Globais->jogadores_por_times, json_encode($relacaotimes));

    }
}
//echo "<PRE>"; var_dump($time_cadastrados);


// CONFIGURANDO VARIAVEIS PARA TEMPLATE
$loader = new \Twig_Loader_Filesystem(__DIR__."/templates");
$twig = new \Twig_Environment( $loader );
$template = $twig->load('meutimeUI.php');

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

$traduz_template["FormACtion"] =  $Globais->ProcurarTimesUI;
        $trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
$traduz_template["LinkNovoTime"] =  strtr(  $Globais->CriarMeuTime, $trans) ;

$traduz_template["Times"] = $time_cadastrados["TIMES"];
$traduz_template["Jogadores"] = $jogadores_dos_times["TIMES"];

$traduz_template["title_pagina"] =  $Globais->Titulo;


echo  $template->render( $traduz_template );
