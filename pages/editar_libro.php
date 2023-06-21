<?php
include("db.php");
$titulo = '';
$autor= '';
$genero= '';
$subgenero= '';
$formato= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM libros WHERE id=$id";
  $result = mysqli_query($conn, $query); 
  // mysqli_num_rows() -> Devuelve en número de rows que tiene la consulta realizada
  if (mysqli_num_rows($result) == 1) {
    // Si existe el id -> Me creas un array con el registro
    $row = mysqli_fetch_array($result);
    $titulo = $row['titulo'];
    $autor = $row['autor'];
    $genero = $row['genero'];
    $subgenero = $row['subgenero'];
    $formato = $row['formato'];
  }
} 

// Hacemos el update en la misma página. Es decir, en el formulario se hace el POST y en este script, lo tratamos
if (isset($_POST['modificar'])) {
  $id = $_GET['id'];
  $titulo= $_POST['titulo'];
  $autor = $_POST['autor'];
  $genero = $_POST['genero'];
  $subgenero = $_POST['subgenero'];
  $formato = $_POST['formato'];

  $query = "UPDATE libros set titulo = '$titulo', autor = '$autor', genero = '$genero', subgenero = '$subgenero', formato = '$formato' WHERE id=$id";
  mysqli_query($conn, $query);
  //$_SESSION['message'] = 'Task Updated Successfully';
  //$_SESSION['message_type'] = 'warning';
  header('Location: tu-libreria.php');

  echo'<script type="text/javascript">
        alert("Has modificado este libro en tu base de datos.");
        window.location.href="tu-libreria.php";
        </script>';    
}
?>

<form action="editar_libro.php?id=<?php echo $GET['id'];?>" method="POST">
    <input titulo="titulo" type="text" placeholder="Título">
    <input autor="autor" type="text" placeholder="Autor:">
    <input genero="genero" type="text" placeholder="Género:">
    <input subgenero="subgenero" type="text" placeholder="Subgénero:">
    <input formato="formato" type="text" placeholder="Formato:">                
    <button class="btn btn-success" name="modificar">Modificar</button>
</form>
