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
$nome = $array_times['nome'] = $_POST["nome"];
$treino = $array_times['treino'] = $_POST["treino"];
$localtreino = $array_times['localtreino'] = $_POST["localtreino"];
$nivelcompeticao = $array_times['nivelcompeticao'] = $_POST["nivelcompeticao"];
$procurando = $array_times['procurando'] = $_POST["procurando"];
$array_times['filtro'] = 1;


if ($_POST["submitted"]==1) {

    $trans = null;
    $trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"]);
    $jogadores_pesquisados = $API->CallAPI("POST", strtr($Globais->ProcurarJogadores, $trans), json_encode($array_times));
        //ROTINA PARA INCLUIR AS FOTOS NO JSON DE JOGADORES
          $jogadores_encontrados= null;
          foreach ($jogadores_pesquisados['JOGADORES'] as $idJogador => $dados){

            if ( @$jogadores_pesquisados['JOGADORES'] [$idJogador]['foto'] == "processing")
              $jogadores_pesquisados['JOGADORES'] [$idJogador]['foto']  = "https://pbs.twimg.com/media/Cx9b6_0UsAABoFx.jpg";
            else if (! @$jogadores_pesquisados['JOGADORES'] [$idJogador]['foto']  )
              $jogadores_pesquisados['JOGADORES'] [$idJogador]['foto']  = $Globais->ROTA_RAIZ."/imagens/user_no_image.png";
            else
              $jogadores_pesquisados['JOGADORES'] [$idJogador]['foto']  = $Globais->CaminhoImagens.$jogadores_pesquisados['JOGADORES'] [$idJogador]['foto'];



          }
          /*

          $trans=null;$trans = array(":idusuario" => $_SESSION["idjogadorlogado"] );
          $conf_player_images = null;
          $conf_player_images["TipoImagem"] = "Profile";
          $conf_player_images["IDUSUARIOS"] = $jogadores_encontrados;
          $PlayerImages = $API->CallAPI("POST", strtr(  $Globais->Players_Images, $trans) , json_encode($conf_player_images)  ); // ,'SEMPRE'



          foreach ($PlayerImages['hits'] as $dados){
            $jogadores_pesquisados['JOGADORES'][$dados['IDUSUARIO']]['fotoPerfil'] = $dados['imagem'];
          }

*/
  //  VAR_DUMP($jogadores_encontrados);
}
//var_dump($jogadores_pesquisados );

// CONFIGURANDO VARIAVEIS PARA TEMPLATE
$loader = new \Twig_Loader_Filesystem(__DIR__."/templates");
$twig = new \Twig_Environment( $loader );
$template = $twig->load('ProcurarJogadoresUI.php');

$traduz_template = null;
$traduz_template["HOME"]["LINK"] = "HOME";
$traduz_template["HOME"]["URL"] = $Globais->ROTA_RAIZ;

$traduz_template["MYPROFILE"]["LINK"] = "My Profile";
$traduz_template["MYPROFILE"]["URL"] = $Globais->MyProfileUI;

$traduz_template["PROCURARTIMES"]["LINK"] = "Search a Team";
$traduz_template["PROCURARTIMES"]["URL"] = $Globais->ProcurarTimesUI;

$traduz_template["MYSQUAD"]["LINK"] = "My Squad";
$traduz_template["MYSQUAD"]["URL"] = $Globais->MeusTimes;

$traduz_template["PROCURARJOGADORES"]["LINK"] = "Search Players";
$traduz_template["PROCURARJOGADORES"]["URL"] = $Globais->ProcurarJogadoresUI;

$traduz_template["USUARIO_LOGADO"]["nome"] = $Dados_Usuario_logado["JOGADORES"][$_SESSION["idjogadorlogado"]]["nome"];

$traduz_template["LOGOUT"]["LINK"] = "LOGOUT";
$traduz_template["LOGOUT"]["URL"] = $Globais->LogoutUI ;

$traduz_template["FormACtion"] =  $Globais->ProcurarJogadoresUI;

$traduz_template["nome"] =  $nome;
$traduz_template["localtreino"] =  $localtreino;
$traduz_template["nivelcompeticao"] =  $nivelcompeticao;
$traduz_template["procurando"] =  $procurando;
$traduz_template["treino"] =  $treino;
$traduz_template["imagempadrao"] =  "https://www.freeiconspng.com/uploads/question-answer-icon-24.png";

$traduz_template["title_pagina"] =  $Globais->Titulo;


$traduz_template["JOGADORES"] = @$jogadores_pesquisados["JOGADORES"];
//echo "<PRE>"; var_dump($traduz_template["JOGADORES"]);



echo  $template->render( $traduz_template );
