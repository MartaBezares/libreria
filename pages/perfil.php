<?php include('header.php'); ?>

<main>
    <h2>Tu perfil:</h2>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="submit" value="Subir">
    </form>
</main>






<?php include('footer.php'); ?>
