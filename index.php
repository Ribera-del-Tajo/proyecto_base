<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="hoja.css">

</head>

<body>

<?php
  include("conexion.php");
// SE PUEDE SIMPLIFICAR ESTA DOS LÍNEAS COMENTADAS EN LA TERCERA
//$resultado=$base->query("SELECT * FROM usuarios");
//$registros=$resultado->fetchAll(PDO::FETCH_OBJ);
$registros=$base->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_OBJ);
if (isset($_POST['cr'])) {
  $sql="INSERT INTO usuarios (nombre,apellido1,apellido2) VALUES (:n,:a1,:a2)";
  $resultado=$base->prepare($sql);
  $nombre=addslashes($_POST['nombre']);
  $apellido1=addslashes($_POST['apellido1']);
  $apellido2=$_POST['apellido2'];
  echo "$apellido2";
  $resultado->bindValue(":n",$nombre);
  $resultado->bindValue(":a1",$apellido1);
  $resultado->bindValue(":a2",$apellido2);
  $resultado->execute();
  header("Location:index.php");
}

?>
<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>

  <table width="50%" border="0" align="center">
    <tr >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Apellido 1º</td>
      <td class="primera_fila">Apellio 2º</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr>

<?php
  foreach ($registros as $persona):?>
   	<tr>
      <td><?php echo $persona->id_usr; ?></td>
      <td><?php echo $persona->nombre; ?></td>
      <td><?php echo $persona->apellido1; ?></td>
      <td><?php echo $persona->apellido2; ?></td>
      <td class="bot"><a href="borrar.php?id_usr=<?php echo $persona->id_usr?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
      <td class='bot'><a href="editar.php?id_usr=<?php echo $persona->id_usr?>&nombre=<?php echo $persona->nombre;?>&apellido1=<?php echo $persona->apellido1?>&apellido2=<?php echo $persona->apellido2;?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr>
  <?php
endforeach;

  ?>
  <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <tr>
      <td></td>
      <td><input type='text' name='nombre' size='20' class='centrado'></td>
      <td><input type='text' name='apellido1' size='20' class='centrado'></td>
      <td><input type='text' name='apellido2' size='20' class='centrado'></td>
      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
    </tr>
    </form>
  </table>

<p>&nbsp;</p>
</body>
</html>
