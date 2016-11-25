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
			alert("Se ha modificado correctamente el recurso");
		}

		</script>
	</head>
	<body>
	<?php
	extract($_REQUEST);

	//session_start();
	$mysqli = new mysqli("localhost", "root", "", "bd_proyecto2");
	$acentos = mysqli_query($mysqli, "SET NAMES 'utf8'");
    $sql = "SELECT * FROM tbl_recurso  WHERE `rec_id` ='$rec_id'";
     $recurso = mysqli_query($mysqli, $sql);

	?>

        <h2>Modificar usuario </h2
      <div>
         <form  method='get' action="modificarrecurso.proc.php" onsubmit='validar();'>
         <?php


        
        if(mysqli_num_rows($recurso)>0){
            
                                while($recursos =   mysqli_fetch_array($recurso)){
                                    echo "<div class='content_rec'>";
                                        //echo $fila[0]
                                    echo "<table border>";
                                        echo "<tr>";
                                            echo "<td> Nombre: <textarea cols='30' rows='2' name='nombre' maxlength='30'> " .$recursos['rec_nombre']. " </textarea></td>";
                                        echo "</tr>";
                                            echo "<td> Descripción: <textarea cols='30' rows='2' name='descripcion' maxlength='200'> " .$recursos['rec_descripcion']. " </textarea></td>";
                                            
                                                        
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
            echo "<input type='radio' name='rec_id' value='$rec_id' checked>";
            ?>
            </div>

        </form>
      </div>
	</body>
</html>