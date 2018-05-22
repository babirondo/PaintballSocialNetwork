<?php
namespace raiz;
session_start();
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

require_once("include/class_api.php");
require_once("include/globais.php");

$API = new class_API();
$Globais = new Globais();
$verbose = 1;

$trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
$Dados_Usuario_logado = $API->CallAPI("GET",  strtr(  $Globais->Players_GET_endpoint, $trans)  ) ;


// CONFIGURANDO VARIAVEIS PARA TEMPLATE
$loader = new \Twig_Loader_Filesystem(__DIR__."/templates");
$twig = new \Twig_Environment( $loader );
$template = $twig->load('etapas.novo.UI.php');

$traduz_template = null;

if ($IDEVENTO != null ){
    $traduz_template["headerPagina"] =  "Editing Event";


    $trans=null;$trans = array(":idtorneio" => $IDTORNEIO , ":idetapa" => $IDEVENTO);
    $etapas = $API->CallAPI("GET", strtr(  $Globais->getEtapa, $trans) ) ;

    //$traduz_template["Torneios"] = $torneios["CHAMPIONSHIP"];

    $autofill["evento"] = @$etapas["eventos"]["0"]["evento"];
    $autofill["sigla"] = @$etapas["eventos"]["0"]["sigla"];
    $traduz_template["IDTORNEIO"] = $IDTORNEIO;
    $traduz_template["IDEVENTO"] = $IDEVENTO;

}
else{
    $traduz_template["headerPagina"] =  "Creating Event";

}
$traduz_template["botao_salvar"] = " Save ";

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

$traduz_template["CAMPEONATO"]["LINK"] = "Tournaments";
$traduz_template["CAMPEONATO"]["URL"] = $Globais->CampeonatosUI;

$traduz_template["USUARIO_LOGADO"]["nome"] = $Dados_Usuario_logado["JOGADORES"][$_SESSION["idjogadorlogado"]]["nome"];

$traduz_template["autofill"] = $autofill;

$traduz_template["LOGOUT"]["LINK"] = "LOGOUT";
$traduz_template["LOGOUT"]["URL"] = $Globais->LogoutUI ;


    $trans=null;$trans = array(":idtorneio" => $IDTORNEIO );
$traduz_template["FormACtion"] = strtr(  $Globais->CampeonatoEtapasUI, $trans);

$traduz_template["title_pagina"] =  $Globais->Titulo;


echo  $template->render( $traduz_template );


