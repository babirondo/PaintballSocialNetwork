<?php
namespace raiz;

error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
session_start();

require_once("include/globais.php");
$Globais = new Globais();

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

            $mensagem_retorno =  "Logado com sucesso";
            header("Location: http://localhost:81/PaintballSocialNetwork/");
        }
        else
            $mensagem_retorno = $auth["erro"];
    }
    else
        $mensagem_retorno =  $auth["erro"]."404 - API Indisponivel";

}

if ( $_SESSION["idusuariologado"] > 0){
    header("Location: http://localhost:81/PaintballSocialNetwork/");
}

?>


<HTML>
<HEAD>
    <title></title>
</HEAD>
<body>
<form action="http://localhost:81/PaintballSocialNetwork/Login" method="post">
    <input type="hidden" name="logar" value="1">
    <table border="0">
        <tr>
            <td>  Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Senha</td>
            <td><input type="password" name="senha"></td>
        </tr>

        <tr>
            <td colspan="2"><font color="red"> <?=$mensagem_retorno;?> </font></td>
        </tr>



        <tr>

            <td><input type="submit" value="logar"></td>
        </tr>




        <tr>
            <td colspan="2"><a href="<?=$Globais->NewUser_endpoint_UI;?>">Cadastrar-se</a></td>
        </tr>


    </table>
</form>
</body>
</HTML>
