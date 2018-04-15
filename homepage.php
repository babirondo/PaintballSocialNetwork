<?php
namespace raiz;
session_start();



?>
<HTML>
<HEAD>
    <title> titulo da pagina</title>
</HEAD>
<body>
<table width=90% height=500 align=center border="1">
<?php
var_dump($_SESSION);
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