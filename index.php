<?php
namespace raiz;
ini_set('opcache.enable', 0);


header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header("Pragma: public");
header("Expires: 0");
header("Cache-Control:nocache, post-check=0, pre-check=0");
header("Cache-Control: public");

header_remove("Content-Location");
//header("Content-Description: File Transfer");

session_cache_limiter("nocache");
//header("Content-Type: application/vnd.ms-excel");
//header('Content-Disposition: attachment; filename="fileToExport.xls"');

// and after you start the session
session_start();


header_remove("Content-Location");

error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);


use Slim\Views\PhpRenderer;

include "vendor/autoload.php";

$config = [
    'settings' => [
        'addContentLengthHeader' => false,
        'displayErrorDetails' => true
    ],
];



$app = new \Slim\App($config );

$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("./templates");



//todo: incluir healthcheck nos test ALL UNIT TEST
if ( !$_SESSION["idusuariologado"] ) $USUARIO_NAO_LOGADO = 1;

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





$app->get('/Logout/', function ($request, $response, $args)  use ($app, $USUARIO_NAO_LOGADO )   {

    session_destroy();

    include("login.php");


}  );

$app->get('/', function ($request, $response, $args)  use ($app , $USUARIO_NAO_LOGADO)   {

    if ($USUARIO_NAO_LOGADO){
        include("login.php"); return false;
    }
    include("homepage.php");
}  );

$app->get('/MySquads/New/', function ($request, $response, $args)  use ($app , $USUARIO_NAO_LOGADO)   {
    $operacao='criartime';
    if ($USUARIO_NAO_LOGADO){
        include("login.php"); return false;
    }
    include("meutime.php");
}  );


$app->any('/NewUser/', function ($request, $response, $args)  use ($app , $USUARIO_NAO_LOGADO)   {

    include("novousuario.php");
}  );

$app->any('/MySquads/', function ($request, $response, $args)  use ($app , $USUARIO_NAO_LOGADO)   {

    if ($USUARIO_NAO_LOGADO){
        include("login.php"); return false;
    }
    include("meutime.php");
}  );

$app->any('/SearchTeams/', function ($request, $response, $args)  use ($app , $USUARIO_NAO_LOGADO)   {

    include("procurar.php");
}  );




$app->group('/MyProfile',  function ()   {

    $this->any('/', function ($request, $response, $args)  use ($app )   {
        // listando dados do form
        $retorno = require_once("meuperfil.php");
        return $response->withJson($retorno, 200)->withHeader('Content-Type', 'text/html; charset=utf-8 ');
    }  );

    $this->get('/Experiences/{idexperience}', function ($request, $response, $args)  use ($app )   {
        $deletarExperience = 1;
        $idexperiencia = $args["idexperience"];
        //echo " idexperiencia $idexperiencia ";
        include("meuperfil.php");
    }  );

});


$app->run();

