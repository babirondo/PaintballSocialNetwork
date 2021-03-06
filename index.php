<?php
namespace raiz;
session_start();

function isMobileDevice() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

if(isMobileDevice()){
  echo "This website doesn't support mobile version. <BR>Please check it on a Desktop<BR>";
  echo "This is still under beta version, in the future mobile will be supported.";
  exit;
}


include "vendor/autoload.php";

error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

use Slim\Views\PhpRenderer;

$config = [
    'settings' => [
        'addContentLengthHeader' => false,
        'displayErrorDetails' => true,
        'debug' => true,
        'mode'                 => 'development',
    ],
];



$app = new \Slim\App($config );

$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("./templates");

$app->any('/P/{identificador}/', function ($request, $response, $args)  use ($app )   {
    $IDENTIFICADOR = $args["identificador"];
    if ( !$_SESSION["idjogadorlogado"] ){ include("login.php"); exit; }

    include("resume.php");
}  );

$app->any('/Team/{idtime}/', function ($request, $response, $args)  use ($app )   {
    $IDTIME = $args["idtime"];
    if ( !$_SESSION["idjogadorlogado"] ){ include("login.php"); exit; }

    include("time.php");
}  );

// ROTAS PARA USUARIOS NAO LOGADOS
$app->get('/healthcheck/', function ($request, $response, $args)  use ($app )   {
    include_once("health-check/healthcheck.php");

    $HealthCheck = new HealthCheck();

    $retorno = $HealthCheck->check($response, $request->getParsedBody() );
    return $retorno;
}  );

$app->any('/Login', function ($request, $response, $args)  use ($app )   {
    include("login.php");
}  );

$app->any('/NewUser/', function ($request, $response, $args)  use ($app , $USUARIO_NAO_LOGADO)   {

    include("login.php");
}  );





$app->get('/Logout/', function ($request, $response, $args)  use ($app )   {

    session_destroy();

    include("login.php");


}  );

$app->get('/', function ($request, $response, $args)  use ($app )   {
    if ( !$_SESSION["idjogadorlogado"] ){ include("login.php"); exit; }
    include("homepage.php");
}  );

$app->any('/MySquads/New/', function ($request, $response, $args)  use ($app )   {
    if ( !$_SESSION["idjogadorlogado"] ){ include("login.php"); exit; }

    include("meutime.criar.php");
}  );
$app->any('/MySquads/{idtime}/', function ($request, $response, $args)  use ($app )   {
    $IDTIME = $args["idtime"];
    if ( !$_SESSION["idjogadorlogado"] ){ include("login.php"); exit; }

    include("meutime.criar.php");
}  );





$app->any('/MySquads/', function ($request, $response, $args)  use ($app)   {
    if ( !$_SESSION["idjogadorlogado"] ){ include("login.php"); exit; }

    include("meutime.php");
}  );

$app->any('/SearchTeams/', function ($request, $response, $args)  use ($app )   {
    if ( !$_SESSION["idjogadorlogado"] ){ include("login.php"); exit; }

    include("procurar.php");
}  );
$app->any('/SearchPlayers/', function ($request, $response, $args)  use ($app , $USUARIO_NAO_LOGADO)   {
    if ( !$_SESSION["idjogadorlogado"] ){ include("login.php"); exit; }

    include("procurar.jogadores.php");
}  );

$app->any('/MyProfile/', function ($request, $response, $args)  use ($app )   {
    if ( !$_SESSION["idjogadorlogado"] ){ include("login.php"); exit; }
    include("meuperfil.php");

  //  return $response->withJson($retorno, 200)->withHeader('Content-Type', 'text/html; charset=utf-8 ');
}  );

$app->get('/MyProfile/Experiences/{idexperience}/Remove', function ($request, $response, $args)  use ($app )   {
    if ( !$_SESSION["idjogadorlogado"] ){ include("login.php"); exit; }
    $deletarExperience = 1;
    $idexperiencia = $args["idexperience"];

    include("meuperfil.php");
}  );
$app->get('/MyProfile/Experiences/{idexperience}/Edit', function ($request, $response, $args)  use ($app )   {
    if ( !$_SESSION["idjogadorlogado"] ){ include("login.php"); exit; }

    $idexperiencia = $args["idexperience"];

    include("meuperfil.experience.remove.php");
}  );

$app->any('/Tournaments/{idtorneio}/Etapas/', function ($request, $response, $args)  use ($app)   {
    if ( !$_SESSION["idjogadorlogado"] ){ include("login.php"); exit; }
    $IDTORNEIO = $args["idtorneio"];
    include("etapas.php");
}  );

$app->get('/Tournaments/{idtorneio}/Etapas/New/', function ($request, $response, $args)  use ($app)   {
    if ( !$_SESSION["idjogadorlogado"] ){ include("login.php"); exit; }
    $IDTORNEIO = $args["idtorneio"];
    include("etapas.nova.php");
}  );

$app->get('/Tournaments/{idtorneio }/Etapas/{idevento}/Edit/', function ($request, $response, $args)  use ($app)   {
    if ( !$_SESSION["idjogadorlogado"] ){ include("login.php"); exit; }
    $IDTORNEIO = $args["idtorneio"];
    $IDEVENTO = $args["idevento"];
    include("etapas.nova.php");
}  );
$app->get('/Tournaments/New/', function ($request, $response, $args)  use ($app)   {
    if ( !$_SESSION["idjogadorlogado"] ){ include("login.php"); exit; }

    include("torneio.novo.elastic.php");
}  );
$app->get('/Tournaments/{idtorneio}/', function ($request, $response, $args)  use ($app)   {

    if($args["idtorneio"] != "New"){
        if ( !$_SESSION["idjogadorlogado"] ){ include("login.php"); exit; }
        $IDTORNEIO = $args["idtorneio"];
        include("torneio.novo.elastic.php");
    }
    else{
        include_once("include/globais.php");
        $Globais = new Globais();
        return $response->withStatus(302)->withHeader('Location',  $Globais->LogoutUI );
    }
}  );
$app->get('/Tournaments/{idtorneio}/Delete', function ($request, $response, $args)  use ($app)   {

    if($args["idtorneio"] != "New"){
        if ( !$_SESSION["idjogadorlogado"] ){ include("login.php"); exit; }
        $DELETE=1;
        $IDTORNEIO = $args["idtorneio"];
        //include("torneios.php");
        include("torneios.elastic.php");
    }
    else{
        include_once("include/globais.php");
        $Globais = new Globais();
        return $response->withStatus(302)->withHeader('Location',  $Globais->LogoutUI );
    }
}  );
$app->get('/Tournaments/{idtorneio}/Etapas/{idevento}/Delete', function ($request, $response, $args)  use ($app)   {

    if ( !$_SESSION["idjogadorlogado"] ){ include("login.php"); exit; }
    $DELETE=1;
    $IDTORNEIO = $args["idtorneio"];
    $IDETAPA = $args["idevento"];
    //include("torneios.php");
    include("etapas.php");
    /*
    if($args["idtorneio"] != "New"){
    }
    else{
        include_once("include/globais.php");
        $Globais = new Globais();
        return $response->withStatus(302)->withHeader('Location',  $Globais->LogoutUI );
    }
        */
}  );
$app->any('/Tournaments/', function ($request, $response, $args)  use ($app)   {
    if ( !$_SESSION["idjogadorlogado"] ){ include("login.php"); exit; }

    //include("torneios.php");
    include("torneios.elastic.php");
}  );

$app->run();
