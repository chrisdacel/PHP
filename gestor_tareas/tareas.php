<?php
    include_once"includes/header.php";
    session_start();
?>

<?php
    $usuario = $_SESSION['usuario'];
    $archivoUsuario = __DIR__ . "/usuarios/{$usuario}.json";

    $tareas = [];

    if (file_exists($archivoUsuario)) {
        $datos = json_decode(file_get_contents($archivoUsuario), true);
        if (isset($datos['tareas'])) {
            $tareas = $datos['tareas'];
        }
    }
?>
    <h1> Bienvenido, <?php echo($_SESSION["usuario"]) ?> </h1>
    <h2 id="tarea"> Tus tareas </h2>
    <br>

    <!-- Lista de tareas -->
    <ul>
        <?php foreach ($tareas as $index => $tarea): ?>
            <li>
                <?php echo htmlspecialchars($tarea['texto']); ?>
                <a class="eliminar" href="borrar_tarea.php?id=<?php echo $index; ?>" onclick="return confirm('¿Eliminar esta tarea?');"> Eliminar </a>
            </li>
        <?php endforeach; ?>
        <br>
    </ul>

    <!-- Formulario para añadir tarea -->
    <form action="guardar_tarea.php" method="POST">
        <input type="text" name="tarea" placeholder="Escribe una nueva tarea" required>
        <button type="submit" class ='btn'> Añadir </button>
    </form>
    <br>
    <button class="cerrarSesion"> <a href="logout.php" > <p> Cerrar sesion </p> </a> </button>

   <style>
        .cerrarSesion {
            padding: 12px 24px;
            background: #667eea;
            font-size: 16px;
            font-weight: 500;
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .cerrarSesion a {
            text-decoration: none;
            color: white;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 20px 0;
            max-width: 500px;
        }

       li {
            background-color: #ffffff8b;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            padding: 12px 16px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background-color 0.3s ease;
        }

        .eliminar {
            background-color:rgb(195, 43, 26);
            color: white;
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 6px;
            font-size: 14px;
            transition: background-color 0.3s ease;
            margin-left: 20px; /* Espacio opcional extra */
        }
   </style>

<?php
    include_once"includes/footer.php";
?>