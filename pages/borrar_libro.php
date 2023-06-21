<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM libros WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  //$_SESSION['message'] = 'Task Removed Successfully';
  //$_SESSION['message_type'] = 'danger';
  //header('Location: index.php');

  echo'<script type="text/javascript">
        alert("Has eliminado este libro de tu base de datos.");
        window.location.href="tu-libreria.php";
        </script>';    
}

?>


