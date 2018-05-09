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
$template = $twig->load('torneio.novo.UI.php');

$traduz_template = null;

if ($IDTORNEIO>0){
    $traduz_template["headerPagina"] =  "Editing Championship";

    $trans=null;$trans = array(":idtorneio" => $IDTORNEIO );
    $torneios = $API->CallAPI("GET", strtr(  $Globais->getCampeonato, $trans) ) ;

    //$traduz_template["Torneios"] = $torneios["CHAMPIONSHIP"];

    $autofill["championship"] = @$torneios["CHAMPIONSHIP"][$IDTORNEIO]["championship"];
    $autofill["sigla"] = @$torneios["CHAMPIONSHIP"][$IDTORNEIO]["sigla"];
    $traduz_template["IDTORNEIO"] = $IDTORNEIO;


}
else{
    $traduz_template["headerPagina"] =  "Creating new Championship" ;

}
$traduz_template["botao_salvar"] = "Save";

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

$traduz_template["FormACtion"] =  $Globais->CampeonatosUI;
        $trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
$traduz_template["LinkNovoTorneio"] =  strtr(  $Globais->NovoCampeonato, $trans) ;



$traduz_template["title_pagina"] =  $Globais->Titulo;


echo  $template->render( $traduz_template );


