<?php
include("conexion.php");
$id_usr=$_GET['id_usr'];
$sql="DELETE FROM usuarios WHERE id_usr='$id_usr'";
$base->query($sql);
header("Location:index.php");
?>
