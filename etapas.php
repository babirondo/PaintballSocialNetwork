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


if ($DELETE == 1 && $IDTORNEIO != null && $IDETAPA != null){

    $trans=null;$trans = array(":idtorneio" => $IDTORNEIO , ":idetapa" => $IDETAPA );
    $array_times  = array();
    $deletando = $API->CallAPI("DELETE", strtr(  $Globais->deleteEtapa, $trans) , json_encode($array_times) ) ;
    var_dump( $deletando    );
}


if ($_POST["submitted"]== "CriarTimeEvento") {

    $array_times = null;
    $evento = $array_times['evento'] = $_POST["evento"];

    $foto = $array_times['foto'] = $_FILES["foto"];


    if ($_POST["IDEVENTO"] != null){
        $trans=null;$trans = array(":idtorneio" => $_POST["IDTORNEIO"] ,":idetapa" => $_POST["IDEVENTO"] );

        $query_API = $API->CallAPI("PUT", strtr(  $Globais->AlterarEtapa, $trans) , json_encode($array_times) ) ;
    }
    else{

        $trans=null;$trans = array(":idtorneio" => $IDTORNEIO );
        $query_API = $API->CallAPI("POST", strtr(  $Globais->NovaEtapa, $trans) , json_encode($array_times) ) ;
    }


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

$trans=null;$trans = array(":idtorneio" => $IDTORNEIO );
$etapas = $API->CallAPI("GET", strtr(  $Globais->CampeonatoEtapas, $trans) , null) ;


//echo "<PRE>"; var_dump($etapas);


// CONFIGURANDO VARIAVEIS PARA TEMPLATE
$loader = new \Twig_Loader_Filesystem(__DIR__."/templates");
$twig = new \Twig_Environment( $loader );
$template = $twig->load('etapasUI.php');

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
$trans=null;$trans = array(":idtorneio" => $IDTORNEIO );
$traduz_template["LinkNovaEtapa"] =  strtr(  $Globais->NovaEtapaUI, $trans) ;

if (@is_array($etapas["eventos"])){
    foreach (@$etapas["eventos"] as $id => $foreach_linha){
        $trans=null;$trans = array(":idtorneio" =>  $IDTORNEIO, ":idevento" =>  $foreach_linha["_id"]['$oid'] );

        $novalistaEtapas["EVENTs"][$id] = $foreach_linha;
        $novalistaEtapas["EVENTs"][$id]["edit"] = strtr( $Globais->EtapaEditUI, $trans);
        $novalistaEtapas["EVENTs"][$id]["delete"] = strtr( $Globais->EtapaDeleteUI, $trans);
    }

}

$traduz_template["Etapas"] = $novalistaEtapas["EVENTs"];

$traduz_template["title_pagina"] =  $Globais->Titulo;


echo  $template->render( $traduz_template );
