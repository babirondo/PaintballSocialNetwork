<?php
namespace raiz;

error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
session_start();

require_once("include/globais.php");
$Globais = new Globais();

?>


<HTML>
<HEAD>
    <title></title>
</HEAD>
<body>
<form action="<?=$Globais->NewUser_endpoint_UI;?>" method="post">
    <input type="hidden" name="cadastrar" value="1">
    <table border="0">
        <tr>
            <td>Nome</td>
            <td><input type="text" name="nome"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Senha</td>
            <td><input type="password" name="senha1"></td>
        </tr>
        <tr>
            <td>Senha</td>
            <td><input type="password" name="senha2"></td>
        </tr>

        <tr>
            <td colspan="2"><font color="red"> <?=$mensagem_retorno;?> </font></td>
        </tr>

        <tr>

            <td><input type="submit" value="Registrar"></td>
        </tr>





        <tr>
            <td colspan="2"><a href="<?=$Globais->ROTA_RAIZ;?>">Voltar para Login</a></td>
        </tr>



    </table>
</form>
</body>
</HTML>
