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
			alert("Se ha creado correctamente el usuario");
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

        <h2>Nuevo Usuario</h2>
      <div>

  <form  method='get' action="crearusuario.proc.php" onsubmit='validar();'>

        	<br/>
        	Nickname: 
            <br/>
        	<textarea cols="30" rows="2" name="nickname" maxlength="15"></textarea>
        	<br/>
            Nombre: 
            <br/>
            <textarea cols="30" rows="2" name="nombre" maxlength="15"></textarea>
            <br/>
            Apellido: 
            <br/>
            <textarea cols="30" rows="2" name="apellido" maxlength="15"></textarea>
            <br/>
            Correo: 
            <br/>
            <textarea cols="30" rows="2" name="correo" maxlength="30"></textarea>
            <br/>
            Cargo(usuario/administrador): 
            <br/>
            <textarea cols="30" rows="2" name="cargo" maxlength="15"></textarea>
            <br/>
            Contraseña: 
            <br/>
            <textarea cols="30" rows="2" name="contrasena" maxlength="15"></textarea>
            <br/><br/>
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