<?php
namespace raiz;
session_start();

include "vendor/autoload.php";

require_once("include/globais.php");

$Globais = new Globais();
$verbose = 1;


$API = new \babirondo\REST\RESTCall();

if ( $_POST["logar"] == 1) {
    $verbose = 1;
    $array = null;
    $array['email'] = $_POST["email"];
    $array['senha'] = $_POST["senha"];

    $auth = $API->CallAPI("POST", $Globais->Authentication_endpoint, json_encode($array));

    if ($auth){
        if ($auth["resultado"] == "SUCESSO") {
            $_SESSION['idjogadorlogado'] = $auth["id_jogador"];
            $_SESSION['idusuariologado'] = $auth["id_usuario"];
            $_SESSION['usuariologado'] = $auth["nome"];

            $mensagem_retorno_login =  "Sign in OK";
            try {
                ini_set('display_errors', '1');
                error_reporting(E_ALL   ^ E_NOTICE);

                header("Location: ".$Globais->MyProfileUI  ) ;exit;
            } catch (Exception $e) {
                echo 'ERROR CURL: ',  $e->getMessage(), "\n";
                return false;
            }
        }
        else
            $mensagem_retorno_login = "Auth failed ".$auth["erro"];
    }
    else
        $mensagem_retorno_login =  $auth["erro"]."404 - API unavailable";

}
if ( $_SESSION["idusuariologado"] > 0){
    header("Location: ".$Globais->ROTA_RAIZ);                exit;
}

if ( $_POST["cadastrar"] == 1) {

    $verbose = 1;
    $array = null;
    $array['nome'] = $_POST["nome"];
    $array['email'] = $_POST["email"];
    $array['senha1'] = $_POST["senha1"];
    $array['senha2'] = $_POST["senha2"];

    $auth = $API->CallAPI("POST", $Globais->NewUser_endpoint, json_encode($array));

    if ($auth){
        if ($auth["resultado"] == "SUCESSO") {
            $mensagem_retorno =  "User successfully  created";
        }
        else
            $mensagem_retorno = "User not created. ".$auth["erro"];
    }
    else
        $mensagem_retorno =  $auth["erro"]."404 - API Unavailable";

}


// CONFIGURANDO VARIAVEIS PARA TEMPLATE
$loader = new \Twig_Loader_Filesystem(__DIR__."/templates");
$twig = new \Twig_Environment( $loader );
$template = $twig->load('loginUI.php');

$traduz_template = null;
$traduz_template["HOME"]["LINK"] = "HOME";
$traduz_template["HOME"]["URL"] = $Globais->ROTA_RAIZ;

$traduz_template["MYPROFILE"]["LINK"] = "My Profile";
$traduz_template["MYPROFILE"]["URL"] = $Globais->MyProfileUI;

$traduz_template["PROCURARTIMES"]["LINK"] = "Search a Team";
$traduz_template["PROCURARTIMES"]["URL"] = $Globais->ProcurarTimesUI;

$traduz_template["MYSQUAD"]["LINK"] = "My Squad";
$traduz_template["MYSQUAD"]["URL"] = $Globais->MeusTimes;

$traduz_template["USUARIO_LOGADO"]["ID"] = $_SESSION["idusuariologado"];

$traduz_template["LOGOUT"]["LINK"] = "LOGOUT";
$traduz_template["LOGOUT"]["URL"] = $Globais->LogoutUI ;

$traduz_template["FormACtion"] =  $Globais->NewUser_endpoint_UI;
$traduz_template["FormACtionLogin"] =  $Globais->LoginUI;
$trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
$traduz_template["LinkNovoTime"] =  strtr(  $Globais->CriarMeuTime, $trans) ;

$traduz_template["Times"] = $time_cadastrados["TIMES"];
$traduz_template["Jogadores"] = $jogadores_dos_times["TIMES"];
$traduz_template["foto_login"] = $Globais->ROTA_RAIZ."/imagens/team.jpg";

$traduz_template["erro_login"] = $mensagem_retorno_login;
$traduz_template["erro_criacao_usuario"] = $mensagem_retorno;
$traduz_template["title_pagina"] =  $Globais->Titulo;


echo  $template->render( $traduz_template );
