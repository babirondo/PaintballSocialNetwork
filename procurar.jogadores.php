<?php
namespace raiz;
session_start();
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

require_once("include/class_api.php");
require_once("include/globais.php");

$API = new class_API();
$Globais = new Globais();
$verbose = 1;


$array_times = null;
$time = $array_times['time'] = $_POST["time"];
$treino = $array_times['treino'] = $_POST["treino"];
$localtreino = $array_times['localtreino'] = $_POST["localtreino"];
$nivelcompeticao = $array_times['nivelcompeticao'] = $_POST["nivelcompeticao"];
$procurando = $array_times['procurando'] = $_POST["procurando"];
$array_times['filtro'] = 1;


if ($_POST["submitted"]==1) {

    $trans = null;
    $trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"]);
    $jogadores_pesquisados = $API->CallAPI("POST", strtr($Globais->ProcurarJogadores, $trans), json_encode($array_times));

}


// CONFIGURANDO VARIAVEIS PARA TEMPLATE
$loader = new \Twig_Loader_Filesystem(__DIR__."/templates");
$twig = new \Twig_Environment( $loader );
$template = $twig->load('ProcurarJogadoresUI.php');

$traduz_template = null;
$traduz_template["HOME"]["LINK"] = "HOME";
$traduz_template["HOME"]["URL"] = $Globais->ROTA_RAIZ;

$traduz_template["MYPROFILE"]["LINK"] = "My Profile";
$traduz_template["MYPROFILE"]["URL"] = $Globais->MyProfileUI;

$traduz_template["PROCURARTIMES"]["LINK"] = "Procurar Times";
$traduz_template["PROCURARTIMES"]["URL"] = $Globais->ProcurarTimesUI;

$traduz_template["MYSQUAD"]["LINK"] = "My Squad";
$traduz_template["MYSQUAD"]["URL"] = $Globais->MeusTimes;

$traduz_template["PROCURARJOGADORES"]["LINK"] = "Procurar Jogadores";
$traduz_template["PROCURARJOGADORES"]["URL"] = $Globais->ProcurarJogadoresUI;

$traduz_template["USUARIO_LOGADO"]["ID"] = $_SESSION["idusuariologado"];

$traduz_template["LOGOUT"]["LINK"] = "LOGOUT";
$traduz_template["LOGOUT"]["URL"] = $Globais->LogoutUI ;

$traduz_template["FormACtion"] =  $Globais->ProcurarJogadoresUI;

$traduz_template["time"] =  $time;
$traduz_template["localtreino"] =  $localtreino;
$traduz_template["nivelcompeticao"] =  $nivelcompeticao;
$traduz_template["procurando"] =  $procurando;
$traduz_template["treino"] =  $treino;
$traduz_template["imagempadrao"] =  "https://www.freeiconspng.com/uploads/question-answer-icon-24.png";



$traduz_template["JOGADORES"] = @$jogadores_pesquisados["JOGADORES"];
//echo "<PRE>"; var_dump($traduz_template["JOGADORES"]);



echo  $template->render( $traduz_template );

