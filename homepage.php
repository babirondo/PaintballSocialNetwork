<?php
namespace raiz;
session_start();
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

require_once ("vendor/autoload.php");
require_once("include/globais.php");

$Globais = new Globais();

use \babirondo\REST\RESTCall;
$API = new RESTCall();

$trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
$Dados_Usuario_logado = $API->CallAPI("GET",  strtr(  $Globais->Players_GET_endpoint, $trans)  ) ;

// Specify our Twig templates location
$loader = new \Twig_Loader_Filesystem("templates");
$twig = new \Twig_Environment( $loader );
$template = $twig->load('homepageUI.php');

$traduz_template = null;

$traduz_template["SYSTEM"]["VERSION"] = $Globais->config["VERSION"];
$traduz_template["SYSTEM"]["BUILD_TIME"] = $Globais->config["BUILD_TIME"];
$traduz_template["SYSTEM"]["RELEASE_NOTES"] = $Globais->config["RELEASE_NOTES"];


$traduz_template["HOME"]["LINK"] = "HOME";
$traduz_template["HOME"]["URL"] = $Globais->ROTA_RAIZ;

$traduz_template["MYPROFILE"]["LINK"] = "My Profile";
$traduz_template["MYPROFILE"]["URL"] = $Globais->MyProfileUI;

$traduz_template["PROCURARTIMES"]["LINK"] = "Search a Team";
$traduz_template["PROCURARTIMES"]["URL"] = $Globais->ProcurarTimesUI;

$traduz_template["PROCURARJOGADORES"]["LINK"] = "Search Players";
$traduz_template["PROCURARJOGADORES"]["URL"] = $Globais->ProcurarJogadoresUI;

$traduz_template["CAMPEONATO"]["LINK"] = "Tournaments";
$traduz_template["CAMPEONATO"]["URL"] = $Globais->CampeonatosUI;

$traduz_template["MYSQUAD"]["LINK"] = "My Squad";
$traduz_template["MYSQUAD"]["URL"] = $Globais->MeusTimes;

$traduz_template["USUARIO_LOGADO"]["nome"] = $Dados_Usuario_logado["JOGADORES"][$_SESSION["idjogadorlogado"]]["nome"];

$traduz_template["LOGOUT"]["LINK"] = "LOGOUT";
$traduz_template["LOGOUT"]["URL"] = $Globais->LogoutUI ;
$traduz_template["title_pagina"] =  $Globais->Titulo;


echo $template->render( $traduz_template );
?>
