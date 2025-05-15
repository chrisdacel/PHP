<?php
include_once"includes/header.php";
?>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){

$user_name=$_POST["user_name"];
$archivo="usuarios/". $user_name.".json";

if(file_exists($archivo)){
echo("Nombre Invalido, Usa otro nombre por favor!");
}
else{

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
}

echo("se ha registrado correctamente");

}

?>
    <h1>Registrate</h1>

    
    <form action="index.php" method="post">
        <label>Nombre:</label>
        <input type="text" placeholder="Nombre" required name="user_name">
        <label>Contraseña:</label>
        <input type="password" placeholder="Contraseña" required>
        <input type="submit" value="enviar">

<?php
    include_once"includes/footer.php";
?>