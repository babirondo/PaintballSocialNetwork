<?php
namespace raiz;
session_start();
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);


use Slim\Views\PhpRenderer;

include "vendor/autoload.php";


$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);

$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("./templates");



if ( !$_SESSION["idusuariologado"] ) $USUARIO_NAO_LOGADO = 1;




// ROTAS PARA USUARIOS NAO LOGADOS
$app->get('/healthcheck/', function ($request, $response, $args)  use ($app )   {
    require_once("health-check/healthcheck.php");

    $HealthCheck = new HealthCheck();

    $retorno = $HealthCheck->check($response, $request->getParsedBody() );
    return $retorno;
}  );

$app->get('/Login', function ($request, $response, $args)  use ($app )   {
    require("login.php");
}  );




// ROTAS PARA USUARIOS  LOGADOS


    $app->get('/MyProfile', function ($request, $response, $args)  use ($app )   {




        require("myprofile.php");
    }  );

    $app->get('/Logout/', function ($request, $response, $args)  use ($app, $USUARIO_NAO_LOGADO )   {

        session_destroy();

        require("login.php");


    }  );


    $app->get('/', function ($request, $response, $args)  use ($app , $USUARIO_NAO_LOGADO)   {


        if ($USUARIO_NAO_LOGADO){
            require("login.php"); return false;
        }
        require("homepage.php");
    }  );

    $app->run();

