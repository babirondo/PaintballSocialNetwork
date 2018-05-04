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



$trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
$query_API = $API->CallAPI("GET",  strtr(  $Globais->Players_GET_endpoint, $trans));
$mensagem_retorno = @$query_API["erro"];

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
$template = $twig->load('meuperfil.experience.remove.UI.php');

$traduz_template = null;
$traduz_template["HOME"]["LINK"] = "HOME";
$traduz_template["HOME"]["URL"] = $Globais->ROTA_RAIZ;

$traduz_template["MYPROFILE"]["LINK"] = "My Profile";
$traduz_template["MYPROFILE"]["URL"] = $Globais->MyProfileUI;

$traduz_template["PROCURARTIMES"]["LINK"] = "Search a Team";
$traduz_template["PROCURARTIMES"]["URL"] = $Globais->ProcurarTimesUI;

$traduz_template["PROCURARJOGADORES"]["LINK"] = "Search Players";
$traduz_template["PROCURARJOGADORES"]["URL"] = $Globais->ProcurarJogadoresUI;

$traduz_template["MYSQUAD"]["LINK"] = "My Squad";
$traduz_template["MYSQUAD"]["URL"] = $Globais->MeusTimes;

$traduz_template["USUARIO_LOGADO"]["nome"] = $Dados_Usuario_logado["JOGADORES"][$_SESSION["idjogadorlogado"]]["nome"];

$traduz_template["LOGOUT"]["LINK"] = "LOGOUT";
$traduz_template["LOGOUT"]["URL"] = $Globais->LogoutUI ;

$traduz_template["FormACtion"] =  $Globais->MyProfileUI;
$traduz_template["mensagem_retorno_experience"] =  $mensagem_retorno_experience;
$traduz_template["mensagem_retorno_dados"] =  $mensagem_retorno_dados;

$traduz_template["endpoint_autocomplete"] = $Globais->getTimes;
$traduz_template["experience"] = $jogador_experiences["EXPERIENCES"][$idexperiencia];
$traduz_template["idexperience"] = $idexperiencia;

$traduz_template["title_pagina"] =  $Globais->Titulo;

$array_times = null;
$array_times['idtimes'] = $jogador_experiences["EXPERIENCES"][$idexperiencia]['idtime'];
$query_API = $API->CallAPI("POST", $Globais->ProcurarTimes, json_encode($array_times));

$traduz_template["experiences"] = $novalistatimesretornados["EXPERIENCES"];
$traduz_template["Times"] = $query_API["TIMES"];

$traduz_template["foto"] = $foto;

//var_dump($novo_array);
echo  $template->render( $traduz_template );

