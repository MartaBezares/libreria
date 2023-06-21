<?php include('header.php'); ?>

<?php
if (isset($_POST['procesar_login'])) {
    // Obtener los datos del formulario
    // print_r($_POST);
    $mail = $_POST['mail'];
    $contrasenna = $_POST['contrasenna'];
    // Consultar la base de datos para ver si hay un usuario con ese correo electrónico y contraseña
    $query = "SELECT * FROM usuarios WHERE mail = '$mail' AND contrasenna = '$contrasenna'";
    $resultado = mysqli_query($conn, $query);
    if (mysqli_num_rows($resultado) == 1) {
        // Iniciar sesión y redirigir al usuario a la página de bienvenida
        $usuario = mysqli_fetch_array($resultado);
        $_SESSION['mail'] = $usuario['mail'];
        $_SESSION['id'] = $usuario['id'];
        header("Location: tu-libreria.php");
    } else {
        // Mostrar un mensaje de error si no se encuentra un usuario con esas credenciales
        header("Location: registro.php");
    }
}
?>



<main>
    <h2>Los libros más vendidos en abril según nuestros usuarios:</h2>

    <h2>Entra para ver tu librería:</h2>
    <form action="index.php" method="POST">
        <label for="mail">Mail:</label>
        <input type="email" id="mail" name="mail" required><br><br>
        <label for="contrasenna">Contraseña:</label>
        <input type="password" id="contrasenna" name="contrasenna" required><br><br>
        <button type="submit" name="procesar_login">Iniciar sesión</button>
    </form>



    <h2>¿Aún no te has registrado? Hazlo <a id="enlace_texto" href="registro.php">aquí</a>.</h2>



</main>




<?php include('footer.php'); ?>