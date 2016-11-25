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

    $tipo= "SELECT * FROM tbl_tiporecurso";
    $tipos=mysqli_query($mysqli, $tipo);
	?>
 <h2>Nuevo recurso</h2>
      <div>

  <form  method='get' action="crearrecurso.proc.php" onsubmit='validar();'>
<?php
        if (mysqli_num_rows($tipos)>0){
            ?>
            Tipo recurso:<br/>
            <?php
            while ($tipo  =   mysqli_fetch_array($tipos)) {
                if ($tipo['tr_id']==1){
                    echo "<input type='radio' name='tipo' value='" .$tipo['tr_id']. "' checked> " .$tipo['tr_nombre']. "<br/>";
                } else {
                echo "<input type='radio' name='tipo' value='" .$tipo['tr_id']. "'> " .$tipo['tr_nombre']. "<br/>";
            }
            }
        } 
            ?>
        	<br/>
        	Nombre: 
            <br/>
        	<textarea cols="30" rows="2" name="nombre" maxlength="30"></textarea>
        	<br/>
            Descripción: 
            <br/>
            <textarea cols="40" rows="3" name="descripcion" maxlength="200"></textarea>
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