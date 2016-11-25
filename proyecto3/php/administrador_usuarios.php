
<?php
		session_start();
		if(!isset($_SESSION["usu_id"])) {
			header("location:../index.php?nolog=2");
		}
		//realizamos la conexión
		$conexion = mysqli_connect('localhost', 'root', '', 'bd_proyecto2');

		//le decimos a la conexión que los datos los devuelva diréctamente en utf8, así no hay que usar htmlentities
		$acentos = mysqli_query($conexion, "SET NAMES 'utf8'");

		if (!$conexion) {
		    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		    exit;
		}

		//session_start();
		//$mysqli = new mysqli("localhost", "root", "", "bd_proyecto2");
		//Cogemos el nombre de usuario y la imagen de forma dinámica en la BD
		$con =	"SELECT * FROM `tbl_usuario` WHERE `usu_id` = '". $_SESSION["usu_id"] ."'";
		//echo $con;
		//Lanzamos la consulta a la BD
		$result	=	mysqli_query($conexion,$con);
		while ($fila = mysqli_fetch_row($result)) 
			{
				$usu_nickname	=	$fila[1];
				$usu_img	=	$fila[6];
			}
			


		$sql = "SELECT * FROM tbl_usuario WHERE usu_estado='alta' ORDER BY usu_id";

	
		extract($_REQUEST);

		$usuario = mysqli_query($conexion, $sql);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/recursos.css">
	<title>Usuarios</title>
	<script type="text/javascript">
		function destroy(){
			var respuesta = confirm("¿Está seguro que desea dar de baja el usuario?");
			if(respuesta){
				return true;
			}
			else{
				return false;
			}
			
		}

		</script>
	<script type="text/javascript">
		function logout()
		{
			var login_respuesta = confirm("¿Está seguro que desea cerrar la sesión?");
			if(login_respuesta){
				return true;
			}
			else{
				return false;
			}
		}
	</script>
</head>
<body>
	<div class="header">
			<div class="logo">
				<a href="#"></a>
			</div>
			<h1 align="center">Gestión de recursos</h1>
			<div class="profile">
			<p class="welcome">Hola bienvenido, <br /><b>
			<?php echo $usu_nickname; ?></b>
			
			</p>
			</div>
			<div class="logout">
				<a href="logout.proc.php" onclick="return logout();">
					<img class="img_logout" src="../img/logout_small.png" alt="Cerrar sesión">
				</a>
			</div>
		</div>
	<nav>
		<ul class="topnav">	
			<li class="li"><a href="administrador_recursos.php">Administrar recursos</a></li>
			<li class="li"><a href="administrador_reserva.php">Administrar reservas</a></li>
			<li class="li"><a href="#">Administrar usuarios</a></li>
		</ul>
	</nav>
<div class="container">
	<?php

	echo "<a href='crearusuario.php'>CREAR NUEVO USUARIO</a></td>";
	?>
	<h1>Usuarios Activos</h1>
	<br/>

	<?php


		
		if(mysqli_num_rows($usuario)>0){
			
								while($usuarios	=	mysqli_fetch_array($usuario)){
									echo "<div class='content_rec'>";
										//echo $fila[0]
									echo "<table border>";
										echo "<tr>";
											echo "<td colspan='2'>" . $usuarios['usu_nickname'] . "</td>";
										echo "</tr>";
											echo "<td>Nombre:".$usuarios['usu_nombre']."</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<td>Apellido: " .$usuarios['usu_apellido']. "</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<td>Correo: " .$usuarios['usu_correo']. "</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<td> Contraseña:" .$usuarios['usu_contrasena']. "</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<td colspan='2'> <a href='modificarusuario.php?usu_id=".$usuarios['usu_id']."' '> MODIFICAR </a></td>";
										echo "</tr>"; 
											
										echo "<tr>";
											echo "<td colspan='2'> <a href='bajausuario.proc.php?usu_id=".$usuarios['usu_id']."' onclick='return destroy();'> DAR DE BAJA </a></td>";
										echo "</tr>"; 
											
														
									echo "</table>";
									echo "</div>";
									echo "</br>";
	 

								}

			} else {
				echo "No hay recursos disponibles";
			}

		?>

</div>
</body>
</html>