<?php
namespace raiz;
session_start();
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

require_once("include/globais.php");

require_once ("vendor/autoload.php");
use \babirondo\REST\RESTCall;
$API = new RESTCall();

$Globais = new Globais();
$verbose = 1;


$trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
$Dados_Usuario_logado = $API->CallAPI("GET",  strtr(  $Globais->Players_GET_endpoint, $trans)  ) ;



$array_times = null;
$time = $array_times['time'] = $_POST["time"];
$treino = $array_times['treino'] = $_POST["treino"];
$localtreino = $array_times['localtreino'] = $_POST["localtreino"];
$nivelcompeticao = $array_times['nivelcompeticao'] = $_POST["nivelcompeticao"];
$procurando = $array_times['procurando'] = $_POST["procurando"];
$array_times['filtro'] = 1;


if ($_POST["submitted"]==1) {

    $trans = null;
    $trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"], ":idexperiencia" => $id);
    $time_pesquisados = $API->CallAPI("POST", strtr($Globais->ProcurarTimes, $trans), json_encode($array_times));

    $jogadores_encontrados= null;
    foreach ($time_pesquisados['TIMES'] as $idTime => $dados){

      if ( @$time_pesquisados['TIMES'] [$idTime]['logo'] == "processing")
        $time_pesquisados['TIMES'] [$idTime]['logo']  = "https://pbs.twimg.com/media/Cx9b6_0UsAABoFx.jpg";
      else if (! @$time_pesquisados['TIMES'] [$idTime]['logo']  )
        $time_pesquisados['TIMES'] [$idTime]['logo']  = $Globais->ROTA_RAIZ."/imagens/noteam.png";
      else
        $time_pesquisados['TIMES'] [$idTime]['logo']  = $Globais->CaminhoImagens.$time_pesquisados['TIMES'] [$idTime]['logo'];



    }

}


// CONFIGURANDO VARIAVEIS PARA TEMPLATE
$loader = new \Twig_Loader_Filesystem(__DIR__."/templates");
$twig = new \Twig_Environment( $loader );
$template = $twig->load('ProcurarTimesUI.php');

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

$traduz_template["FormACtion"] =  $Globais->ProcurarTimesUI;

$traduz_template["time"] =  $time;
$traduz_template["localtreino"] =  $localtreino;
$traduz_template["nivelcompeticao"] =  $nivelcompeticao;
$traduz_template["procurando"] =  $procurando;
$traduz_template["treino"] =  $treino;
$traduz_template["imagempadrao"] =  "https://www.freeiconspng.com/uploads/question-answer-icon-24.png";

$traduz_template["title_pagina"] =  $Globais->Titulo;

$traduz_template["Times"] = $time_pesquisados["TIMES"];



echo  $template->render( $traduz_template );
