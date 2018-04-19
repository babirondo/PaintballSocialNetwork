<?php
namespace raiz;
session_start();


require_once("include/globais.php");
$Globais = new Globais();

?>
<table width=90%   align=center border="1">
    <tr>
        <td>
        <table>
            <tr>

                <td>   <a href="<?=$Globais->ROTA_RAIZ  ;?>/">Home</a>
                <td>   <a href="<?=$Globais->ROTA_RAIZ  ;?>/MyProfile/">My Profile</a>
                <td>   <a href="<?=$Globais->MeusTimes  ;?>">My Squad</a>

                <td>USUARIO: <?=$_SESSION['idusuariologado'];?> </td>
                <td> <a href="<?=$Globais->ROTA_RAIZ  ;?>/Logout/">Logout</a> </td>
            </tr>
        </table>

        </td>
    </tr>

</table>
