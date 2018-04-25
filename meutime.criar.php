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
    <td>Local de Treino</td>
    <td><input type="text" name="localtreino"></td>
</tr>
<tr>
    <td>Nivel de Competicao</td>
    <td><input type="text" name="nivelcompeticao"></td>
</tr>
<tr>
    <td>Procurando por Integrantes ?</td>
    <td>
        Snake  <input type="checkbox" name="procurando[Snake]" value="Snake">
        Snake Corner <input type="checkbox" name="procurando[SnakeCorner]" value="SnakeCorner">
        Back Center <input type="checkbox" name="procurando[BackCenter]" value="BackCenter">
        Doritos Corner <input type="checkbox" name="procurando[DoritosCorner]" value="DoritosCorner">
        Doritos <input type="checkbox" name="procurando[Doritos]" value="Doritos">
        Coach <input type="checkbox" name="procurando[Coach]" value="Coach">

    </td>
</tr>
<tr>
    <td>Disponibilidade de Treinos</td>
    <td>
        Segunda Feira  <input type="checkbox" name="treino[Segunda]" value="Segunda">
        Terca Feira  <input type="checkbox" name="treino[Terca]" value="Terca">
        Quarta Feira  <input type="checkbox" name="treino[Quarta]" value="Quarta">
        Quinta Feira  <input type="checkbox" name="treino[Quinta]" value="Quinta">
        Sexta Feira  <input type="checkbox" name="treino[Sexta]" value="Sexta">
        Sabado   <input type="checkbox" name="treino[Sabado]" value="Sabado">
        Domingo   <input type="checkbox" name="treino[Domingo]" value="Domingo">
    </td>
</tr>

<tr>

    <td><input type="submit" value="Criar"></td>
</tr>
