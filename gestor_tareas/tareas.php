<?php
    include_once"includes/header.php";
    session_start();
?>

    <h1>Bienenido, <?php 
    echo($_SESSION["usuario"])
    ?></h1>
    <hr>
    <button><a href="logout.php">
        <p>cerrar sesion</p>
    </a></button>
<?php
    include_once"includes/footer.php";
?>