<?php
    include_once"includes/header.php";
?>

<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $user_name=$_POST["name"];
        $archivo="usuarios/". $user_name.".json";
        if(file_exists($archivo)){
            $_SESSION["usuario"]=$user_name;
            header("Location:tareas.php");
        }
        else{
            echo("credenciales de acceso invalidas por favor registrese");
        }
    }
?>
        <h1> Iniciar Sesion </h1>
        <form method="POST">
            <label> Nombre </label>
            <input type="text" name="name" id='name'>
            <br>
            <label> Contraseña </label>
            <input type="password" name="password" id='password' required>
            <a href="registro.php" class= 'registro' > <p> Registrarse </p> </a>
            <input type="submit" value="Iniciar Sesion" class ='btn' required>


        </form>
<?php
    include_once"includes/footer.php";
?>