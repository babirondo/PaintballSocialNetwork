<?php
namespace raiz;
session_start();
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);

require_once("include/globais.php");

require_once ("vendor/autoload.php");
$API = new \babirondo\REST\RESTCall();


$Globais = new Globais();
// Load our autoloader



//zecho "<PRE>";var_dump($_POST); echo "</PRE>";

if ( $_POST["editarExperience"] == 1) {

    $array_times = null;
    $time = $array_times['time'] = $_POST["time"];
    $inicio = $array_times['inicio'] = $_POST["inicio"];

    $fim = $array_times['fim'] = $_POST["fim"];
    $idtime = $array_times['idtime'] = $_POST["idtime"];
    $resultados = $array_times['resultados'] = $_POST["resultados"];
    $array_times['idjogadorlogado'] =  $_SESSION["idjogadorlogado"];
    $array_times['rank'] =  $_POST["rank"];
    $array_times['posicao'] =  $_POST["posicao"];
    $array_times['idevento'] =  $_POST["idevento"];
    $array_times['division'] =  $_POST["division"];

    $trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"], ":idexperiencia" => $_POST["idexperience"] );
    $query_API = $API->CallAPI("PUT", strtr(  $Globais->editar_experiencia, $trans) , json_encode($array_times)); //


    if (is_array($query_API)){
        if ($query_API["resultado"] == "SUCESSO") {
            $mensagem_retorno_delete =  "Dados Salvos com sucesso";
        }
        else
            $mensagem_retorno_delete = "ERRO".$query_API["erro"];
    }
    else
        $mensagem_retorno_delete =   "404 - API Indisponivel" . (($verbose)?$query_API:"");

}

if ( $deletarExperience == 1) {
    //echo "<PRE>";var_dump($_POST); echo "</PRE>";
    $verbose = 1;

    /*
    $array_times = null;
    $time = $array_times['time'] = $_POST["time"];
    $inicio = $array_times['inicio'] = $_POST["inicio"];
    $fim = $array_times['fim'] = $_POST["fim"];
    */
    $array_times=nul;;


    $trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"], ":idexperiencia" => $idexperiencia );
    $query_API = $API->CallAPI("DELETE", strtr(  $Globais->delete_experiencia, $trans) , false); //json_encode($array_times)


    if (is_array($query_API)){
        if ($query_API["resultado"] == "SUCESSO") {
            $mensagem_retorno_delete =  "Dados Salvos com sucesso";
        }
        else
            $mensagem_retorno_delete = "ERRO".$query_API["erro"];
    }
    else
        $mensagem_retorno_delete =   "404 - API Indisponivel" . (($verbose)?$query_API:"");

}

  //ATUALIZANDO DADOS DO PERFIL
if ( $_POST["submitted"] == 1) {

  //  var_dump($_POST);
    $array = null;
    $nome = $array['nome'] = $_POST["nome"];
    //$foto = $array['foto'] = $_FILES["foto"];
      $array['fotoSalvar'] = base64_encode(file_get_contents( $_FILES["foto"]["tmp_name"]  ));
      //$array['fotoSalvar'] = "DEBUG DE IMAGEM";
      $array['fotoSalvarTipoImagem'] = "Profile";

    $idade = $array['idade'] = $_POST["idade"];
    $cidade = $array['cidade'] = $_POST["cidade"];
    $snake = $array['Snake'] = $_POST["Snake"];
    $playsince = $array['playsince'] = $_POST["playsince"];

    $snakecorner = $array['SnakeCorner'] = $_POST["SnakeCorner"];
    $backcenter = $array['BackCenter'] = $_POST["BackCenter"];
    $doritos = $array['Doritos'] = $_POST["Doritos"];
    $doritoscorner = $array['DoritosCorner'] = $_POST["DoritosCorner"];
    $coach = $array['Coach'] = $_POST["Coach"];

    $treino = $array['treino'] = $_POST["treino"];
    $nivelcompeticao = $array['nivelcompeticao'] = $_POST["nivelcompeticao"];
    $procurando = $array['procurando'] = $_POST["procurando"];


    $trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );

    $query_API = $API->CallAPI("PUT", strtr(  $Globais->Players_UPDATE_endpoint, $trans)  , json_encode($array)); //, 'ERRO'

    //var_dump($query_API);
    if ($query_API){
        if (@$query_API["resultado"] == "SUCESSO") {
            $mensagem_retorno_dados =  "Dados Salvos com sucesso";
        }
        else
            $mensagem_retorno_dados = "ERRO".@$query_API["erro"];
    }
    else
        $mensagem_retorno_dados =  $query_API["erro"]."404 - API Indisponivel";




        //ADDING NEW EXPERIENCE
    if ($_POST["time"] && $_POST["inicio"])
    {
        // posting new experience
        $array_times = null;
        $time = $array_times['time'] = $_POST["time"];
        $inicio = $array_times['inicio'] = $_POST["inicio"];
        $fim = $array_times['fim'] = $_POST["fim"];
        $idtime = $array_times['idtime'] = $_POST["idtime"];


        $posicao = $array_times['posicao'] = $_POST["posicao"];
        $rank = $array_times['rank'] = $_POST["rank"];
        $idevento = $array_times['idevento'] = $_POST["idevento"];
        $division = $array_times['division'] = $_POST["division"];
        $resultados = $array_times['resultados'] = $_POST["resultados"];

        $array_times['idjogadorlogado'] =  $_SESSION["idjogadorlogado"];

        $trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
        $query_API = $API->CallAPI("POST", strtr(  $Globais->Players_ADD_TEAM_Experience, $trans), json_encode($array_times));//','SEMPRE'

        if (is_array($query_API)){
            if ($query_API["resultado"] == "SUCESSO") {
                $mensagem_retorno_experience =  "Dados Salvos com sucesso";
            }
            else
                $mensagem_retorno_experience = " ERROR ".$query_API["erro"]."  ";
        }
        else
            $mensagem_retorno_experience =   "404 - API Indisponivel" . (($verbose)?$query_API:"");

    }

}


$trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
$Dados_Usuario_logado = $API->CallAPI("GET",  strtr(  $Globais->Players_GET_endpoint, $trans), null ) ;//, 'SEMPRE'


//$trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
//$query_API = $API->CallAPI("GET",  strtr(  $Globais->Players_GET_endpoint, $trans));

$mensagem_retorno = @$Dados_Usuario_logado["erro"];


// LOADING FIELDS DATA
foreach (@$Dados_Usuario_logado["JOGADORES"] as $jog){
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

//BUSCANDO EXPERIENCES DO RESUME
$endpoint_tratado = null;
$endpoint_tratado = str_replace(":idjogadorlogado", $_SESSION["idjogadorlogado"],  $Globais->listar_times_de_um_jogador);
$jogador_experiences = $API->CallAPI("GET",  $endpoint_tratado ,null);//, 'sempre'

//var_dump($jogador_experiences);


// CONFIGURANDO VARIAVEIS PARA TEMPLATE
$loader = new \Twig_Loader_Filesystem(__DIR__."/templates");
$twig = new \Twig_Environment( $loader );
$template = $twig->load('meuperfilUI.php');


$traduz_template = null;

$traduz_template["PaintballSkill"] = $Dados_Usuario_logado["JOGADORES"][$_SESSION["idjogadorlogado"]]["skill"];
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
$trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"] );
$CampeonatosEventos = $API->CallAPI("GET", strtr(  $Globais->getCampeonatosEventos, $trans) ,null); //, 'SEMPRE'
/*
foreach ($CampeonatosEventos as $Champs){
  foreach ($Champs["eventos"] as $events){
    $comboboxChampeonatoseEventos[ $events["_id"]['$oid'] ]["combo"] = $Champs["championship"]." : ".$events["evento"];
  }
}
*/

$traduz_template["CampeonatosEventos"] = $CampeonatosEventos;

//var_dump($foto);

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
        $trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"], ":idexperiencia" => $idexperiencia );
        $novalistatimesretornados["EXPERIENCES"][$idexperiencia] = $foreach_linha;
        $novalistatimesretornados["EXPERIENCES"][$idexperiencia]["link"] =  strtr(  $Globais->Team_Page, $traduzir_endpoint);

        $traduzir_endpoint=null;$traduzir_endpoint = array(":idexperiencia"  => $foreach_linha["idexperience"] );
        $novalistatimesretornados["EXPERIENCES"][$idexperiencia]["addResult"] =  strtr(  $Globais->NewResult, $traduzir_endpoint);
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
//$traduzir_endpoint=null;$traduzir_endpoint = array(":idexperiencia"  => $foreach_linha["idtime"] );
//$trans=null;$trans = array(":idjogadorlogado" => $_SESSION["idjogadorlogado"], ":idexperiencia" => $idexperiencia );
//$traduz_template["newResult"]  = $Globais->NewResult;


}

//var_dump($novo_array);
echo  $template->render( $traduz_template );
