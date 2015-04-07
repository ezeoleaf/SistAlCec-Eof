<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type='text/javascript' src="scripts/jquery-1.11.2.min.js"></script>
<link rel="stylesheet" href="css/desktop.css">
<title>Inicio</title>
</head>
<?php
include_once "conexion.php";
include_once "libreria.php";

$hayIdea = 0;
if ($hayIdea == 0) { 
?>
<body>
<div id="formulario">
<h2>Seguimiento de la Idea</h2>
<nav id="menu">
	<ul> 
		<li><a href="enDesarrollo.php">Perfil</a></li>
		<li><a href="enDesarrollo.php">Menú2</a></li>
		<li><a href="enDesarrollo.php">Cerrar Sesi&oacute;n</a></li>
	</ul>
</nav>
<form class="nueva_idea" name="nueva_idea" id="nueva_idea" action="?enviado=1" method="post" enctype="multipart/form-data">
<table align="center" width="100%" >
	<tr width="100%">
		<td width="9%" align="center" rowspan="4">
			<label for="add_idea"><img id="imagen" src="img/add-idea.png" width="180" height="180"></label>
			<input id="add_idea" name="add_idea" type="file" onchange="validarArchivo();directorio();" required/>
		</td>
		<td width="40%" colspan="2">
			<h1>No tienes ninguna idea subida</h1>
		</td>
	</tr>
		<tr>
		<td width="7%" align="right">
			<label for="nombre">Archivo: </label>
		</td>
		<td width="10%" align="left">
			<input id="path" name="path" type="text" class="campoText" value="" disabled="true" />
		</td>
	</tr>
	<tr>
		<td width="7%" align="right">
			<label for="nombre">Nombre idea: </label>
		</td>
		<td width="10%" align="left">
			<input id="nombre" name="nombre" type="text" class="campoText" value="" required/>
		</td>
	</tr>
	<tr>
		<td width="7%" align="right">
			<label for="estado" class="lbl_estado">Estado: </label>
		</td>
		<td width="10%" align="left">
			<?php
				$consultaEstado=pg_query("SELECT id,nombre FROM estado_idea");
				while($rowEstado=pg_fetch_array($consultaEstado)){
					if ($rowEstado['id'] == 1){
                    	echo '<l1>'.$rowEstado['nombre'].'</l1>';
					}
					//echo '<input id="carrera_alumno" name="carrera_alumno" type="hidden" value="'.$carrera_alumno.'"/>';
				}
			?>
		</td>
	</tr>
</table>
<table id="tablaBtn" align="center">
	<tr width="100%">	
		<td width="100%" align="center">
			<input class="submit" type="submit" value="Guardar"/>
		</td>
	</tr>
</table>
</form>
</div>
</body>
<?php }else{ ?>
	<body>
	<div id="formulario">
	<h2>Seguimiento de la Idea</h2>
	<nav id="menu">
		<ul> 
			<li><a href="enDesarrollo.php">Perfil</a></li>
			<li><a href="enDesarrollo.php">Menú2</a></li>
			<li><a href="enDesarrollo.php">Cerrar Sesi&oacute;n</a></li>
		</ul>
	</nav>
	<form class="nueva_idea" name="con_idea" id="nueva_idea" action="?enviado=1" method="post" enctype="multipart/form-data">
	<table align="center" width="100%">
		<tr width="100%">
			<td width="10%" align="center" rowspan="4">
				<label for="add_idea"><img id="imagen" src="img/uploaded-idea.png" width="180" height="180"></label>
				<!-- <input id="add_idea" name="add_idea" type="file" onchange="validarArchivo();directorio();" required/> -->
			</td>
			<td width="39%"  colspan="2">
				<h1>Hay idea</h1>
			</td>
		</tr>
			<tr>
			<td width="7%" align="right">
				<label for="nombre">Archivo: </label>
			</td>
			<td width="10%" align="left">
				<l1><?php echo $archivo; ?></l1>
			</td>
		</tr>
		<tr>
			<td width="7%" align="right">
				<label for="nombre">Nombre idea: </label>
			</td>
			<td width="10%" align="left">
				<l1><?php echo $nombre_idea; ?></l1>
			</td>
		</tr>
		<tr>
			<td width="7%" align="right">
				<label for="estado" class="lbl_estado">Estado: </label>
			</td>
			<td width="10%" align="left">
				<?php
					$consultaEstado=pg_query("SELECT id,nombre FROM estado_idea");
					while($rowEstado=pg_fetch_array($consultaEstado)){
						if ($rowEstado['id'] == $estado){
	                    	echo '<l1>'.$rowEstado['nombre'].'</l1>';
						}
						//echo '<input id="carrera_alumno" name="carrera_alumno" type="hidden" value="'.$carrera_alumno.'"/>';
					}
				?>
			</td>
		</tr>
	</table>
	<table id="tablaBtn" align="center">
		<tr width="100%">
			<tr><td><br></td></tr>
			<td width="100%" align="center">
				<l1>Para hacer: Acá poner la calificación de cada profesor de la idea. </l1>
				<!-- <input class="submit" type="submit" value="Guardar"/>  ver si se va a poner un botón y cual?--> 
			</td>
		</tr>
	</table>
	</form>
	</div>
	</body>

<?php	} ?>
</html>