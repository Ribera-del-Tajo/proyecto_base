<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>
<?php
include("conexion.php");
if(isset($_POST['boton_actualizar'])){

    $sql="UPDATE usuarios SET nombre=:n, apellido1=:a1, apellido2=:a2 WHERE id_usr=:id";
    $resultado=$base->prepare($sql);
    $id_usr=addslashes($_POST['id_usr']);
    $nombre=addslashes($_POST['nombre']);
    $apellido1=addslashes($_POST['apellido1']);
    $apellido2=addslashes($_POST['apellido2']);
    $resultado->bindValue(":id",$id_usr);
    $resultado->bindValue(":n",$nombre);
    $resultado->bindValue(":a1",$apellido1);
    $resultado->bindValue(":a2",$apellido2);
    $resultado->execute();
    //$resultado->execute(array(":id"=>$id_usr,":a1"=>$apellido1,":a2"=>$apellido2,":n"=>$nombre));
    header("Location:index.php");
    //echo "actualizando";

}else{
    $id_usr=$_GET['id_usr'];
    $nombre=$_GET['nombre'];
    $apellido1=$_GET['apellido1'];
    $apellido2=$_GET['apellido2'];
?>
<h1>ACTUALIZAR</h1>

<p>

</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td> Código</td>
      <td><label for="id"></label>
      <input type="text" name="id_usr" id="id" value="<?php echo $id_usr?>" readonly></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nombre"></label>
      <input type="text" name="nombre" id="nombre"  value="<?php echo $nombre?>"></td>
    </tr>
    <tr>
      <td>Apellido 1</td>
      <td><label for="apellido1"></label>
      <input type="text" name="apellido1" id="apellido1"  value="<?php echo $apellido1?>"> </td>
    </tr>
    <tr>
      <td>Apellido 2</td>
      <td><label for="apellido2"></label>
      <input type="text" name="apellido2" id="apellido2" value="<?php echo $apellido2?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="boton_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<?php
}
?>
</body>
</html>
