<?php
$conn = pg_connect("host=localhost port=5432 user=postgres password=postgres dbname=alcec") or die("Error de conexion.".pg_last_error());//conexion local
?>