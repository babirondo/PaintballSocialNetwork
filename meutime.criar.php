<?php
namespace raiz;

session_start();
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

require_once ("vendor/autoload.php");


require_once("include/globais.php");

use \babirondo\REST\RESTCall;
$API = new RESTCall();

$Globais = new Globais();
$verbose = 1;


$trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
$Dados_Usuario_logado = $API->CallAPI("GET",  strtr(  $Globais->Players_GET_endpoint, $trans)  ) ;


if ( $IDTIME > 0) {

    $array_times = null;
    $array_times['idtime'] = $IDTIME;

    $dados_do_time = $API->CallAPI("POST",   $Globais->ProcurarTimes  , json_encode($array_times) ) ;
}

/*
$endpoint_tratado = null;
$endpoint_tratado = str_replace(":idjogadorlogado", $_SESSION["idjogadorlogado"],  $Globais->MeusTimesRemoto);
$time_cadastrados = $API->CallAPI("GET",  $endpoint_tratado );
if (@is_array($time_cadastrados[TIMES])) {
    $idtimes = null;
    foreach (@$time_cadastrados[TIMES] as $id => $linha) {
        $idtimes[$id] = $id;
    }
    if (is_array($idtimes)) {
        $relacaotimes['idtime'] = implode(",", $idtimes);
        $jogadores_dos_times = $API->CallAPI("POST", $Globais->jogadores_por_times, json_encode($relacaotimes));

    }
}
*/

//var_dump($dados_do_time);

// CONFIGURANDO VARIAVEIS PARA TEMPLATE
$loader = new \Twig_Loader_Filesystem(__DIR__."/templates");
$twig = new \Twig_Environment( $loader );
$template = $twig->load('meutime.criar.UI.php');

$traduz_template = null;
$traduz_template["HOME"]["LINK"] = "HOME";
$traduz_template["HOME"]["URL"] = $Globais->ROTA_RAIZ;

$traduz_template["MYPROFILE"]["LINK"] = "My Profile";
$traduz_template["MYPROFILE"]["URL"] = $Globais->MyProfileUI;

$traduz_template["PROCURARTIMES"]["LINK"] = "Procurar Times";
$traduz_template["PROCURARTIMES"]["URL"] = $Globais->ProcurarTimesUI;

$traduz_template["MYSQUAD"]["LINK"] = "My Squad";
$traduz_template["MYSQUAD"]["URL"] = $Globais->MeusTimes;

$traduz_template["USUARIO_LOGADO"]["nome"] = $Dados_Usuario_logado["JOGADORES"][$_SESSION["idjogadorlogado"]]["nome"];

$traduz_template["LOGOUT"]["LINK"] = "LOGOUT";
$traduz_template["LOGOUT"]["URL"] = $Globais->LogoutUI ;

$trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
$traduz_template["FormACtion"] =   strtr(  $Globais->MeusTimes, $trans);

if ($IDTIME>0){
    $traduz_template["titulo_pagina"] = "ALTERAR DADOS DE UM TIME";
    $traduz_template["DadosTime"] =  @$dados_do_time[TIMES][$IDTIME];
    $traduz_template["IDTIME"] =  $IDTIME;
    $traduz_template["botao_salvar"] = "Alterar";
}
ELSE{
    $traduz_template["titulo_pagina"] = "CRIAR UM TIME NOVO";
    $traduz_template["botao_salvar"] = "Criar";
}
$traduz_template["title_pagina"] =  $Globais->Titulo;




echo  $template->render( $traduz_template );
