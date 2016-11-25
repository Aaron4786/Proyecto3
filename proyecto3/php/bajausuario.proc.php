<?php
		//realizamos la conexión
		$conexion = mysqli_connect('localhost', 'root', '', 'bd_proyecto2');
		//le decimos a la conexión que los datos los devuelva diréctamente en utf8, así no hay que usar htmlentities
		$acentos = mysqli_query($conexion, "SET NAMES 'utf8'");
		if (!$conexion) {
		    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		    exit;
		}
		extract($_REQUEST);
		session_start();
		$usuario = $_SESSION['usu_id'];
		$sql = "UPDATE tbl_usuario SET usu_estado='baja' WHERE usu_id='$usu_id'";
		$baja_producto = mysqli_query($conexion, $sql); 

		if ($_SESSION['usu_id']!=5) {
			header("location:misrecursos.php");	
			}else{
			header('location:administrador_usuarios.php');
			}
	
		