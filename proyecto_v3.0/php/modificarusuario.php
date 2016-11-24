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
			alert("El usuario se ha modificado correctamente");
		}

		</script>
	</head>
	<body>
	<?php
	extract($_REQUEST);

	//session_start();
	$mysqli = new mysqli("localhost", "root", "", "bd_proyecto2");
	$acentos = mysqli_query($mysqli, "SET NAMES 'utf8'");

	$modificar= "SELECT * FROM tbl_usuario WHERE usu_id='usu_id'";

		$usuarios=mysqli_query($mysqli, $modificar);
			
	?>

        <h2>Modificar usuario</h2>
      <div>

  <form  method='get' action="incidencia.proc.php" onsubmit='validar();'>
<?php
        if (mysqli_num_rows($usuarios)>0){
        	?>
        	Nombre:
        	<?php
        	while ($usuario	=	mysqli_fetch_array($usuarios)) {
        			echo  "". $usuario['usu_nickname']. "";
        	}
        } 
        	?>
        	
        	</div>
        </form>
      </div>
	</body>
</html>