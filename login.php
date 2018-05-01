<?php
namespace raiz;
session_start();
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

require_once("include/class_api.php");
require_once("include/globais.php");

$API = new class_API();
$Globais = new Globais();
$verbose = 1;


if ( $_POST["cadastrar"] == 1) {
    require_once("include/class_api.php");
    $API = new class_API();


    $verbose = 1;
    $array = null;
    $array['nome'] = $_POST["nome"];
    $array['email'] = $_POST["email"];
    $array['senha1'] = $_POST["senha1"];
    $array['senha2'] = $_POST["senha2"];

    $auth = $API->CallAPI("POST", $Globais->NewUser_endpoint, json_encode($array));

    if ($auth){
        if ($auth["resultado"] == "SUCESSO") {


            $mensagem_retorno =  "Usuario criado com sucesso";

        }
        else
            $mensagem_retorno = "usuario nao criado. ".$auth["erro"];
    }
    else
        $mensagem_retorno =  $auth["erro"]."404 - API Indisponivel";

}



if ( $_POST["logar"] == 1) {
    require_once("include/class_api.php");
    $API = new class_API();


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

            $mensagem_retorno_login =  "Logado com sucesso";
            header("Location: http://localhost:81/PaintballSocialNetwork/");
        }
        else
            $mensagem_retorno_login = "Auth failed ".$auth["erro"];
    }
    else
        $mensagem_retorno_login =  $auth["erro"]."404 - API Indisponivel";

}

if ( $_SESSION["idusuariologado"] > 0){
    header("Location: http://localhost:81/PaintballSocialNetwork/");
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

$traduz_template["PROCURARTIMES"]["LINK"] = "Procurar Times";
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


echo  $template->render( $traduz_template );

