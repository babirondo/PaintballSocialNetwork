<?php
namespace raiz;
session_start();


require_once("include/globais.php");
$Globais = new Globais();

?>

<ul class="nav navbar-nav navbar-right">
    <li class=""><a href="<?=$Globais->ROTA_RAIZ  ;?>/">Home</a></li>
    <li class=""><a href="<?=$Globais->ROTA_RAIZ  ;?>/MyProfile/">My Profile</a></li>
    <li class=""><a href="<?=$Globais->ProcurarTimesUI  ;?>">Procurar Times</a></li>
    <li class=""><a href="<?=$Globais->MeusTimes  ;?>">My Squad</a></li>
    <li class=""><a>USUARIO: <?=$_SESSION['idusuariologado'];?></a></li>
    <li class=""> <a href="<?=$Globais->ROTA_RAIZ  ;?>/Logout/">Logout</a> </li>

</ul>
