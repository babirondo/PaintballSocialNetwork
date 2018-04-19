<?php
namespace raiz;
session_start();

require_once("include/class_api.php");
require_once("include/globais.php");

$API = new class_API();
$Globais = new Globais();

?>

<input type="hidden" name="submitted" value="criartimeG">
<tr>
    <td>Time</td>
    <td><input type="text" name="time"></td>
</tr>


<tr>

    <td><input type="submit" value="Criar"></td>
</tr>
