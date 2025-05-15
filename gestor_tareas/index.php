<?php
    include_once"includes/header.php";
?>
        <h1> Iniciar Sesion </h1>
        <form action="tareas.php" method="post">
            <label> Nombre </label>
            <input type="text" name="name" id='name'>
            <br>
            <label> Contraseña </label>
            <input type="password" name="password" id='password'>
            <input type="submit" value="Enviar" class ='btn'>
        </form>
<?php
    include_once"includes/footer.php";
?>