<?php
include_once"includes/header.php";
?>
<?php

    if (!file_exists('usuarios')) {
        mkdir('usuarios', 0777, true);
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $user_name=$_POST["user_name"];
        $archivo="usuarios/". $user_name.".json";

    if(file_exists($archivo)){
        echo("Nombre Invalido, Usa otro nombre por favor!");

    } else {

        $tareas=array("tareas"=>array());
        // se genera esta estructura
        /*[
            tareas=[];
            ]*/

        // ESTRUCTURA TEMPORAL(Internet)
        // conversion a cadena de json
        $json=json_encode($tareas,JSON_PRETTY_PRINT);
        // creacion de archivo y envio de informacion
        file_put_contents($archivo,$json);
        echo("se ha registrado correctamente");
        header("Refresh:5; url=index.php");
    }
}

?>
    <h1>Registrate</h1>
    <form method="post">
        <label>Nombre:</label>
        <input type="text" placeholder="Nombre" required name="user_name">
        <label>Contraseña:</label>
        <input type="password" placeholder="Contraseña" required>
        <a href="index.php" class= 'registro' > <p> Iniciar Sesion </p> </a>
        <input type="submit" value="Registrarse" class ='btn'>
        
<?php
    include_once"includes/footer.php";
?>