<?php
namespace raiz;


//session_start();


?>
<HTML>
<HEAD>
    <title> tsem cache tulo da pagina</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
</HEAD>
<body>
<table width=90% height=500 align=center border="1">
<?php
//var_dump($_SESSION);
?>
    <tr>
        <td>  <?php require("header.php");  ?> </td>
    </tr>
    <tr>
        <td>  <?php require("menu.php");  ?> </td>
    </tr>
    <tr>
        <td>  <?php require("corpo.php");  ?> </td>
    </tr>
    <tr>
        <td>  <?php require("rodape.php");  ?> </td>
    </tr>
</table>

</body>

</HTML>