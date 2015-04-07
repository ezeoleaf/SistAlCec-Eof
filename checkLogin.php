<?php
session_start();
$user = $_REQUEST['usuario'];
$pass = $_REQUEST['password'];
//echo 'usuario: '.$usuario.'<br>';
//echo 'password: '.$password.'<br>';

include_once "conexion.php";
include_once "libreria.php";

//verifico si el usuario y password están en la base de datos

$condition = "WHERE UPPER(username) LIKE UPPER('{$user}') AND UPPER(password) LIKE UPPER('{$pass}') LIMIT 1;";
$rowLogin=pg_fetch_array(traerSql('*','user',$condition));

$_SESSION['userSession'] = $rowLogin['username'];
$_SESSION['passSession'] = $rowLogin['password'];
$_SESSION['permitionSession'] = $rowLogin['permition'];

echo '<script language="JavaScript"> location ="desktopAlCec.php"	</script>';

?>