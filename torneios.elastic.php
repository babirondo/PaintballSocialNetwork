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


if ($_POST["submitted"]== "CriarTimeChampionship") {

    $array_times = null;
    $sigla = $array_times['sigla'] = $_POST["sigla"];
    $championship = $array_times['championship'] = $_POST["championship"];

    $foto = $array_times['foto'] = $_FILES["foto"];

    if ($_POST["IDTORNEIO"]>0){
        $trans=null;$trans = array(":idtorneio" => $_POST["IDTORNEIO"] );
        $array_times['idtime'] = $_POST["IDTIME"];
        $query_API = $API->CallAPI("PUT", strtr(  $Globais->NovoCampeonatoAlterar, $trans) , json_encode($array_times) ) ;
    }
    else
        $query_API = $API->CallAPI("POST", strtr(  $Globais->NovoCampeonato, $trans) , json_encode($array_times) ) ;

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

$trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
//echo strtr(  $Globais->Campeonatos, $trans);exit;
$torneios = $API->CallAPI("GET", strtr(  $Globais->Campeonatos, $trans) , null) ;

// CONFIGURANDO VARIAVEIS PARA TEMPLATE
$loader = new \Twig_Loader_Filesystem(__DIR__."/templates");
$twig = new \Twig_Environment( $loader );
//$template = $twig->load('torneiosUI.php');
$template = $twig->load('torneiosUI.elastic.php');

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

$traduz_template["CAMPEONATO"]["LINK"] = "Tournaments";
$traduz_template["CAMPEONATO"]["URL"] = $Globais->CampeonatosUI;


$traduz_template["USUARIO_LOGADO"]["nome"] = $Dados_Usuario_logado["JOGADORES"][$_SESSION["idjogadorlogado"]]["nome"];

$traduz_template["LOGOUT"]["LINK"] = "LOGOUT";
$traduz_template["LOGOUT"]["URL"] = $Globais->LogoutUI ;

$traduz_template["FormACtion"] =  $Globais->ProcurarTimesUI;
        $trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
$traduz_template["LinkNovoTorneio"] =  strtr(  $Globais->NovoCampeonatoUI, $trans) ;


if (@is_array(  $torneios["hits"]["hits"] )){
    foreach (@ $torneios["hits"]["hits"]  as  $foreach_linha){
        $l++;
        $trans=null;$trans = array(":idtorneio" =>  $foreach_linha["_id"]);
        $novalistatorneios[$l]["_source"] = $foreach_linha["_source"];
        $novalistatorneios[$l]["_source"]["etapas"] = strtr( $Globais->CampeonatoEtapasUI, $trans);
        $novalistatorneios[$l]["_source"]["edit"] = strtr( $Globais->EditCampeonatoUI, $trans);
        $novalistatorneios[$l]["_source"]["delete"] = strtr( $Globais->DeleteCampeonatoUI, $trans);

    }

}
//var_dump(  $novalistatorneios );exit;
$traduz_template["Torneios"] = $novalistatorneios;


//$traduz_template["Torneios"] = $torneios["hits"]["hits"];

$traduz_template["title_pagina"] =  $Globais->Titulo;


echo  $template->render( $traduz_template );


