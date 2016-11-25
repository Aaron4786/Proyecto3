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
			alert("Se ha modificado correctamente el usuario");
		}

		</script>
	</head>
	<body>
	<?php
	extract($_REQUEST);

	//session_start();
	$mysqli = new mysqli("localhost", "root", "", "bd_proyecto2");
	$acentos = mysqli_query($mysqli, "SET NAMES 'utf8'");
    $sql = "SELECT * FROM tbl_usuario  WHERE `usu_id` ='$usu_id'";
     $usuario = mysqli_query($mysqli, $sql);

	?>

        <h2>Modificar usuario </h2
      <div>
         <form  method='get' action="modificarusuario.proc.php" onsubmit='validar();'>
         <?php


        
        if(mysqli_num_rows($usuario)>0){
            
                                while($usuarios =   mysqli_fetch_array($usuario)){
                                    echo "<div class='content_rec'>";
                                        //echo $fila[0]
                                    echo "<table border>";
                                        echo "<tr>";
                                            echo "<td> Nickname: <textarea cols='30' rows='2' name='nickname' maxlength='15'> " .$usuarios['usu_nickname']. " </textarea></td>";
                                        echo "</tr>";
                                            echo "<td> Nombre: <textarea cols='30' rows='2' name='nombre' maxlength='15'> " .$usuarios['usu_nombre']. " </textarea></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td> Apellido: <textarea cols='30' rows='2' name='apellido' maxlength='15'> " .$usuarios['usu_apellido']. " </textarea></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td> Correo: <textarea cols='30' rows='2' name='correo' maxlength='30'> " .$usuarios['usu_correo']. " </textarea></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td> Contraseña: <textarea cols='30' rows='2' name='contrasena' maxlength='15'> " .$usuarios['usu_contrasena']. " </textarea></td>";
                                        echo "</tr>";
                                            
                                                        
                                    echo "</table>";
                                    echo "</div>";
                                    echo "</br>";
     

                                }

            } else {
                echo "No hay usuarios  disponibles";
            }

        ?>
        <br/><br/>
            <input type="submit" name="enviar" value="Enviar">
            <div class="invisible">
            <?php
            echo "<input type='radio' name='usu_id' value='$usu_id' checked>";
            ?>
            </div>

        </form>
      </div>
	</body>
</html>