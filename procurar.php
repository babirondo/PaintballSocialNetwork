<?php
namespace raiz;
session_start();
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);

require_once("include/class_api.php");
require_once("include/globais.php");

$API = new class_API();
$Globais = new Globais();
$verbose = 1;

?>


<HTML>
<HEAD>
    <title> sem cache da pagina</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">



</HEAD>
<body>
<table width=90% height=500 align=center border="1">
    <tr>
        <td>  <?php require("header.php");  ?> </td>
    </tr>
    <tr>
        <td>  <?php require("menu.php");  ?> </td>
    </tr>
    <tr>
        <td>
            <table>
                <form action="<?=$Globais->ProcurarTimesUI;?>" method="POST">


                    <input type="hidden"  name="submitted" value="1">


                <?php
                echo "<tr>
                            <td><font color='red'>$mensagem_retorno</font></td>
                        </tr>";
                switch ($operacao){

                    default:
                        include ("procurar.times.php");
                }

                ?>




            </table>
        </form>
    </body>
</HTML>

