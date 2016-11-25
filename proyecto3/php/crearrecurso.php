<?php 
    session_start();
        if(!isset($_SESSION["usu_id"])) {
            header("location:../index.php?nolog=2");
        }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/recursos.css">
		<title>Recursos</title>
		<script type="text/javascript">
		function validar() {
			alert("Se ha creado correctamente el recurso");
		}

		</script>
	</head>
	<body>
	<?php
	extract($_REQUEST);

	//session_start();
	$mysqli = new mysqli("localhost", "root", "", "bd_proyecto2");
	$acentos = mysqli_query($mysqli, "SET NAMES 'utf8'");
	?>

        <h2>Nuevo Recurso</h2>
      <div>

  <form  method='get' action="crearrecurso.proc.php" onsubmit='validar();'>

        	<br/>
        	Nombre: 
            <br/>
        	<textarea cols="30" rows="2" name="nickname" maxlength="30"></textarea>
        	<br/>
            Foto: 
            <br/>
            <textarea cols="30" rows="2" name="nombre" maxlength="15"></textarea>
            <br/>
            Descripción: 
            <br/>
            <textarea cols="40" rows="3" name="apellido" maxlength="200"></textarea>
            <br/>
        	<input type="submit" name="enviar" value="Enviar">
        	<div class="invisible">
        	<?php
        	echo "<input type='radio' name='rec_id' value='$rec_id' checked>";
        	?>
        	</div>
        </form>
      </div>
	</body>
</html>