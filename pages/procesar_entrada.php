<?php
include('db.php');
// El post del formulario nos lleva aquí --> Insertamos el registro en la base de datos
if (isset($_POST['procesar_entrada'])) {
    
$id_usuario = $_SESSION['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$genero = $_POST['genero'];
$subgenero = $_POST['subgenero'];
$formato = $_POST['formato'];

$query = "SELECT * FROM libros WHERE titulo = '$titulo' AND formato = '$formato'";
    $resultado = mysqli_query($conn, $query);
    if (mysqli_num_rows($resultado) == 1) {
        echo'<script type="text/javascript">
        alert("Este libro ya está en tu base de datos.");
        window.location.href="tu-libreria.php";
        </script>';     
        
    } else {
        $query = "INSERT INTO libros(id_usuario, titulo, autor, genero, subgenero, formato) VALUES ('$id_usuario', '$titulo', '$autor', '$genero', '$subgenero', '$formato')";
        $result = mysqli_query($conn, $query);
        if(!$result) {
            die("Query Failed."); 
        }

        //$_SESSION['message'] = 'Task Saved Successfully';
        //$_SESSION['message_type'] = 'success';
        echo'<script type="text/javascript">
        alert("El libro se ha añadido correctamente.");
        window.location.href="tu-libreria.php";
        </script>';    
        
    }




}
?>

