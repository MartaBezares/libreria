<?php
include('header.php');
// session_start() Se explica en el siguiente punto
if (!isset($_SESSION['mail'])) {
    header("Location: index.php");
}

?>
<main>
    <a id="enlace_texto" href="logout.php">Salir de la sesión</a>
    <h2>Añade tus libros:</h2>
    <form action="procesar_entrada.php" method="POST">
        <div>
            <label for="title">Título:</label>
            <input type="text" id="titulo" name="titulo" required><br><br>
        </div>
        <div>
            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" required><br><br>
        </div>
        <div>
            <label for="genero">Género:</label>
            <select onchange="abrirSubgenero()" name="genero" id="genero">
                <option value="ficcion">Ficción</option>
                <option value="no_ficcion">No ficción</option>
                <option value="novela_grafica">Novela gráfica</option>
                <option value="teatro">Teatro</option>
                <option value="poesia">Poesía</option>
            </select><br><br>
        </div>
        <div>
            <label for="subgenero">Subgénero:</label>
            <div class="subgenero">
                <select name="subgenero" id="subgenero">
                    <option value="romantica">Romántica</option>
                    <option value="ciencia-ficcion">Ciencia-ficción</option>
                    <option value="fantasia">Fantasía</option>
                    <option value="aventura">Aventura</option>
                    <option value="terror">Terror</option>
                    <option value="policial">Policial</option>
                    </select><br><br>
            </div>
        </div>
        <div>
            <label for="formato">Formato:</label>
            <select name="formato" id="formato">
                <option value="fisico">Físico</option>
                <option value="digital">Digital</option>
            </select><br><br>

        </div>
        
        <button type="submit" name="procesar_entrada">Añadir libro</button>
    </form>

    <h2>Tus libros:</h2>

    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Formato</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          <?php
          // Prepara el segundo parámetro para realizar una consulta SQL a través de PHP 
          // Todos los registros de la tabla task del usuario que esté logueado
          $query = "SELECT * FROM libros";
         // Realizar una consulta SQL
          $result_tasks = mysqli_query($conn, $query);  
          // Recorre uno a uno cada registro y lo metes en la variable $row
           //mysql_fetch_assoc() -> es la función que va a darme los registros de la consulta SQL uno a uno. (Es un array asociativo, en el cual la clave es el nombre del campo)
          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['titulo']; ?></td>
            <td><?php echo $row['autor']; ?></td>
            <td><?php echo $row['formato']; ?></td>
            <td>
              <button><a href="editar_libro.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker">Modificar</i>
              </a></button>
              <button><a href="borrar_libro.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt">Borrar</i>
              </a></button>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

</main>

<?php include('footer.php'); ?>