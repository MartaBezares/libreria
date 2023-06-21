<?php
// Configuración de la carpeta de carga
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
// Guardar la URL en la base de datos
$avatar = "http://localhost/uploads/" . basename($_FILES["file"]["name"]);
$name = $_FILES["file"]["name"];
$type = $_FILES["file"]["type"];
$size = $_FILES["file"]["size"];
echo $avatar;

$conn = new mysqli("localhost", "root", "", "archivos");
$sql = "INSERT INTO usuarios (avatar) VALUES ('$avatar')";
$conn->query($sql);
$conn->close();
// Mover el archivo a la carpeta de carga
move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
echo "El archivo se ha cargado correctamente.";
?>