<?php
namespace raiz;
session_start();
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);

require_once("include/globais.php");

require_once ("vendor/autoload.php");
$API = new \babirondo\REST\RESTCall();

$Globais = new Globais();

$trans=null;$trans = array(":identificador" => $IDENTIFICADOR );
$Dados_Usuario = $API->CallAPI("GET",  strtr(  $Globais->Players_GET_by_identificador, $trans), null ) ;//, 'SEMPRE'

$mensagem_retorno = @$Dados_Usuario["erro"];

foreach (@$Dados_Usuario["JOGADORES"] as $idjogador => $jog){
    $skill = @$jog['skill'];
    $nome = @$jog['nome'];
    $idade = @$jog['idade'];
    $cidade = @$jog['cidade'];

    if ( @$jog['foto'] == "processing")
      $foto  = "https://pbs.twimg.com/media/Cx9b6_0UsAABoFx.jpg";
    else if (! @$jog['foto']  )
      $foto  = $Globais->ROTA_RAIZ."/imagens/noteam.png";
    else
      $foto  = $Globais->CaminhoImagens.@$jog['foto'];


    $snake = @$jog['snake'] ;
    $snakecorner = @$jog['snakecorner'] ;
    $backcenter = @$jog['backcenter'] ;
    $doritos = @$jog['doritos'] ;
    $coach = @$jog['coach'] ;
    $doritoscorner = @$jog['doritoscorner'] ;

    $treino = @$jog['treino'] ;
    $playsince = @$jog['playsince'] ;
    $nivelcompeticao = @$jog['nivelcompeticao'] ;
    $procurando =@$jog['procurando'] ;


}

$IDJOGADOR =  $idjogador;

$trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
$Dados_Usuario_logado = $API->CallAPI("GET",  strtr(  $Globais->Players_GET_endpoint, $trans), null ) ;//, 'SEMPRE'


//buscando informacao de experienia
$endpoint_tratado = null;
$endpoint_tratado = str_replace(":idjogadorlogado", $IDJOGADOR,  $Globais->listar_times_de_um_jogador);
$jogador_experiences = $API->CallAPI("GET",  $endpoint_tratado ,null);//, 'sempre'

// CONFIGURANDO VARIAVEIS PARA TEMPLATE
$loader = new \Twig_Loader_Filesystem(__DIR__."/templates");
$twig = new \Twig_Environment( $loader );
$template = $twig->load('resumeUI.php');


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


$traduz_template["PaintballSkill"] = $skill;//$Dados_Usuario["JOGADORES"][$IDJOGADOR]["skill"];
$traduz_template["nome"] = $nome;
$traduz_template["cidade"] = $cidade;
$traduz_template["idade"] = $idade;
$traduz_template["playsince"] = $playsince;

$traduz_template["nivelcompeticao"] = $nivelcompeticao;
$traduz_template["treino"] = $treino;
$traduz_template["procurando"] = $procurando;

$traduz_template["Snakeno"] = (($snake=="-")?"selected":"");
$traduz_template["Snake1"] = (($snake=="<1")?"selected":"");
$traduz_template["Snake1-3"] = (($snake=="1-3")?"selected":"");
$traduz_template["Snake35"] = (($snake=="3-5")?"selected":"");
$traduz_template["Snake5"] = (($snake==">5")?"selected":"");

$traduz_template["SnakeCornerno"] = (($snakecorner=="-")?"selected":"");
$traduz_template["SnakeCorner1"] = (($snakecorner=="<1")?"selected":"");
$traduz_template["SnakeCorner13"] = (($snakecorner=="1-3")?"selected":"");
$traduz_template["SnakeCorner35"] = (($snakecorner=="3-5")?"selected":"");
$traduz_template["SnakeCorner5"] = (($snakecorner==">5")?"selected":"");

$traduz_template["BackCenterno"] = (($backcenter=="-")?"selected":"");
$traduz_template["BackCenter1"] = (($backcenter=="<1")?"selected":"");
$traduz_template["BackCenter13"] = (($backcenter=="1-3")?"selected":"");
$traduz_template["BackCenter35"] = (($backcenter=="3-5")?"selected":"");
$traduz_template["BackCenter5"] = (($backcenter==">5")?"selected":"");

$traduz_template["DoritosCornerno"] = (($doritoscorner=="-")?"selected":"");
$traduz_template["DoritosCorner1"] = (($doritoscorner=="<1")?"selected":"");
$traduz_template["DoritosCorner13"] = (($doritoscorner=="1-3")?"selected":"");
$traduz_template["DoritosCorner35"] = (($doritoscorner=="3-5")?"selected":"");
$traduz_template["DoritosCorner5"] = (($doritoscorner==">5")?"selected":"");

$traduz_template["Doritosno"] = (($doritos=="-")?"selected":"");
$traduz_template["Doritos1"] = (($doritos=="<1")?"selected":"");
$traduz_template["Doritos13"] = (($doritos=="1-3")?"selected":"");
$traduz_template["Doritos35"] = (($doritos=="3-5")?"selected":"");
$traduz_template["Doritos5"] = (($doritos==">5")?"selected":"");
$traduz_template["Doritos"] = $traduz_template["Doritos-3-5"];


$traduz_template["Coachno"] = (($coach=="-")?"selected":"");
$traduz_template["Coach1"] = (($coach=="<1")?"selected":"");
$traduz_template["Coach13"] = (($coach=="1-3")?"selected":"");
$traduz_template["Coach35"] = (($coach=="3-5")?"selected":"");
$traduz_template["Coach5"] = (($coach==">5")?"selected":"");

$traduz_template["endpoint_autocomplete"] = $Globais->getTimes_externo;

//ini_set("xdebug.overload_var_dump", "off");
$trans=null;$trans = array(":idjogadorlogado" => $IDUSUARIO );
$CampeonatosEventos = $API->CallAPI("GET", strtr(  $Globais->getCampeonatosEventos, $trans) ,null); //, 'SEMPRE'

$traduz_template["CampeonatosEventos"] = $CampeonatosEventos;

$traduz_template["caminhofoto"] = $Globais->CaminhoImagens;
$traduz_template["foto"] = $foto;
$traduz_template["time"] = $time;
$traduz_template["inicio"] = $inicio;
$traduz_template["fim"] = $fim;
$traduz_template["idtime"] = $idtime;

$traduz_template["title_pagina"] =  $Globais->Titulo;

$listaTime=null;
$novalistatimesretornados=null;
//var_dump($jogador_experiences);

if (@is_array($jogador_experiences["EXPERIENCES"])){
    foreach (@$jogador_experiences["EXPERIENCES"] as $idexperiencia => $foreach_linha){
        $listaTimeUnicos[$foreach_linha["idtime"]] = $foreach_linha["idtime"];
        if (is_array($foreach_linha["RESULTADOS"])){
            foreach (@$foreach_linha["RESULTADOS"] as $idR => $Results){
                $eventos_jogados[$Results["idevento"]] = $Results["idevento"];
            }

        }
//var_dump($foreach_linha);
        $traduzir_endpoint=null;$traduzir_endpoint = array(":time"  => $foreach_linha["idtime"] );
        $trans=null;$trans = array(":idjogadorlogado" => $IDUSUARIO, ":idexperiencia" => $idexperiencia );
        $novalistatimesretornados["EXPERIENCES"][$idexperiencia] = $foreach_linha;
        $novalistatimesretornados["EXPERIENCES"][$idexperiencia]["link"] =  strtr(  $Globais->Team_Page, $traduzir_endpoint);
        $novalistatimesretornados["EXPERIENCES"][$idexperiencia]["deletarExperience"] =  strtr(  $Globais->excluir_experiencia, $trans);
        $novalistatimesretornados["EXPERIENCES"][$idexperiencia]["editarExperience"] =  strtr(  $Globais->editar_experienciaUI, $trans);
    }

//var_dump($novalistatimesretornados);
    $array_times = null;
    $array_times['eventos'] =  $eventos_jogados;
    $Dados_Eventos = $API->CallAPI("POST", $Globais->getEventos, json_encode($array_times));//,'SEMPRE'
    $traduz_template["DADOS_EVENTOS"] = $Dados_Eventos;//$Dados_Eventos{"EVENTs"};
    //var_dump( $Dados_Eventos);

    $array_times = null;
    $array_times['idtimes'] =  implode(",",$listaTimeUnicos);
    $query_API = $API->CallAPI("POST", $Globais->ProcurarTimes, json_encode($array_times));//, 'SEMPRE'
     //var_dump($query_API);
     //var_dump($novalistatimesretornados["EXPERIENCES"]);
     if (is_array($query_API["TIMES"])){

          foreach ( $query_API["TIMES"] as $idTime => $TimeDados){

            if ( $TimeDados['logo'] == "processing")
              $query_API["TIMES"][$idTime]['logo']  = "https://pbs.twimg.com/media/Cx9b6_0UsAABoFx.jpg";
            else if (! $TimeDados['logo']  )
              $query_API["TIMES"][$idTime]['logo']  = $Globais->ROTA_RAIZ."/imagens/noteam.png";
            else
              $query_API["TIMES"][$idTime]['logo']  = $Globais->CaminhoImagens.@$TimeDados['logo'];
          }
          $traduz_template["Times"] = $query_API["TIMES"];
    }

    $traduz_template["experiences"] = $novalistatimesretornados["EXPERIENCES"];


}

//var_dump($novo_array);
echo  $template->render( $traduz_template );
