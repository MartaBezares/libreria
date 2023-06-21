<?php include('header.php'); ?>
<?php
if(isset($_SESSION["id"])){
    header("Location: tu-libreria.php");
}
if (isset($_POST['procesar_registro'])) {
    $nombre = $_POST['nombre'];
    $mail = $_POST['mail'];
    $contrasenna = $_POST['contrasenna'];
    $rol = $_POST['rol'];
    
    // Comprueba que el correo no esté registrado
    $query = "SELECT * FROM usuarios WHERE mail = '$mail'";
    $resultado_existe_user = mysqli_query($conn, $query);
    if (mysqli_num_rows($resultado_existe_user) >= 1) {
        // El correo ya existe y no se puede crear otra cuenta con ese nombre
        header("Location: index.php");
    } else {
        // Crear usuario en la base de datos
        $query_insert_new_user = "INSERT INTO usuarios (nombre, mail, contrasenna, rol) VALUES ('$nombre', '$mail','$contrasenna', '$rol')";
        mysqli_query($conn, $query_insert_new_user);
        // Guardar en $_SESSION el email y el id del usuario
        $find_new_user = 'SELECT id FROM usuarios ORDER BY id DESC LIMIT 1';
        $resultado_query_newuser = mysqli_query($conn, $find_new_user);
        $usuario = mysqli_fetch_array($resultado_query_newuser);
        // Utilizar las variables globales SESSION
        $_SESSION['id'] = $usuario;
        $_SESSION['mail'] = $mail; 
        header("Location: tu-libreria.php");
    }
}
?>

<main>
    <h2>Nuevo usuario:</h2>
    <form action="registro.php" method="POST">
        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" id="mail" name="mail" required><br><br>
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="contrasenna" name="contrasenna" required><br><br>
        </div>
        <div>
            <label for="rol">Rol:</label>
            <select name="rol" id="rol">
                <option value="usuario">Usuario</option>
                <option value="administrador">Administrador</option>
            </select>
        </div>
        
        <button type="submit" name="procesar_registro">Registrarse</button>
    </form>
    <p>Estoy de acuerdo con las <a id="enlace_texto" href="condiciones_privacidad.php">condiciones de privacidad</a>.</p>



</main>





<?php include('footer.php'); ?>