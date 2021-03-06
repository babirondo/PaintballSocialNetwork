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

$Dados_Usuario_logado = array();
$trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
$Dados_Usuario_logado = $API->CallAPI("GET",  strtr(  $Globais->Players_GET_endpoint, $trans) ,null ) ; // , 'SEMPRE'
//exit;
//var_dump($Dados_Usuario_logado);



//$endpoint_tratado = null;
$endpoint_tratado = str_replace(":idjogadorlogado", $_SESSION["idjogadorlogado"],  $Globais->ProcurarTimes) ;
$payload["idtime"] = $IDTIME;
$time_cadastrados = $API->CallAPI("POST",  $endpoint_tratado , json_encode($payload) );

if (@is_array($time_cadastrados["TIMES"])) {
    $idtimes = null;
    foreach (@$time_cadastrados["TIMES"] as $id => $linha) {


          if ( $time_cadastrados["TIMES"][$id]["logo"] == "processing")
            $time_cadastrados["TIMES"][$id]["logo"]  = "https://pbs.twimg.com/media/Cx9b6_0UsAABoFx.jpg";
          else if (! $time_cadastrados["TIMES"][$id]["logo"]  )
              $time_cadastrados["TIMES"][$id]["logo"]  = $Globais->ROTA_RAIZ."/imagens/noteam.png";
          else
            $time_cadastrados["TIMES"][$id]["logo"]  = $Globais->CaminhoImagens.$time_cadastrados["TIMES"][$id]["logo"];


        if ($id)
          $idtimes[$id] = $id;


        if ( $time_cadastrados["TIMES"][$id]["owner"] ==  $_SESSION["idjogadorlogado"] ){
          $trans=null;$trans = array(":idtime" => $id );
          @$time_cadastrados["TIMES"][$id]['linkEditar'] = strtr(  $Globais->Editar_Squad, $trans);
        }
    }
    //var_dump($time_cadastrados);

ini_set('xdebug.var_display_max_depth', '10');
ini_set('xdebug.var_display_max_children', '256');
ini_set('xdebug.var_display_max_data', '1024');

    if (is_array($idtimes)) {
        $relacaotimes=null;
        $relacaotimes['idtimes_array'] =   $idtimes;
        $jogadores_dos_times = $API->CallAPI("POST", $Globais->jogadores_por_times, json_encode($relacaotimes));//, 'ERRO'


        //var_dump($jogadores_dos_times);
            if (is_array($jogadores_dos_times['TIMES']))
            {
                  $jogadores_encontrados= null;
                  foreach ($jogadores_dos_times['TIMES'] as $IDTIME => $TIMES){
                    foreach ($TIMES['JOGADORES'] as $idJogador => $dados){

                      if ( $jogadores_dos_times['TIMES'][$IDTIME]['JOGADORES'][$idJogador]['foto'] == "processing")
                        $jogadores_dos_times['TIMES'][$IDTIME]['JOGADORES'][$idJogador]['foto']  = "https://pbs.twimg.com/media/Cx9b6_0UsAABoFx.jpg";
                      else if (! $jogadores_dos_times['TIMES'][$IDTIME]['JOGADORES'][$idJogador]['foto']  )
                          $jogadores_dos_times['TIMES'][$IDTIME]['JOGADORES'][$idJogador]['foto']  = $Globais->ROTA_RAIZ."/imagens/noteam.png";
                      else
                        $jogadores_dos_times['TIMES'][$IDTIME]['JOGADORES'][$idJogador]['foto']  = $Globais->CaminhoImagens.$jogadores_dos_times['TIMES'][$IDTIME]['JOGADORES'][$idJogador]['foto'];

                        $trans=null; $trans = array(":jogador" => $jogadores_dos_times['TIMES'][$IDTIME]['JOGADORES'][$idJogador]['identificador'] );
                        $jogadores_dos_times['TIMES'][$IDTIME]['JOGADORES'][$idJogador]['link']  = strtr($Globais->Player_Page, $trans);

                    }
                  }


            }
//var_dump($jogadores_dos_times);

    }
}
//echo "<PRE>"; var_dump($time_cadastrados);



// CONFIGURANDO VARIAVEIS PARA TEMPLATE
$loader = new \Twig_Loader_Filesystem(__DIR__."/templates");
//var_dump($loader);
$twig = new \Twig_Environment( $loader );
//var_dump($twig);
$template = $twig->load('timeUI.php');
//var_dump($template);

$traduz_template = array();

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

$traduz_template["USUARIO_LOGADO"]["nome"] = $Dados_Usuario_logado["JOGADORES"][$_SESSION["idjogadorlogado"]]["nome"];

$traduz_template["LOGOUT"]["LINK"] = "LOGOUT";
$traduz_template["LOGOUT"]["URL"] = $Globais->LogoutUI ;

$traduz_template["FormACtion"] =  $Globais->ProcurarTimesUI;
$trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
$traduz_template["LinkNovoTime"] =  strtr(  $Globais->CriarMeuTime, $trans) ;

$traduz_template["Times"] = @$time_cadastrados["TIMES"];
//print_r($jogadores_dos_times["TIMES"]);
$traduz_template["Jogadores"] = $jogadores_dos_times["TIMES"];

$traduz_template["title_pagina"] =  $Globais->Titulo;



echo  $template->render( $traduz_template );
