<?php
    session_start();

    if (isset($_GET['id']) && isset($_SESSION['usuario'])) {
        $id = (int) $_GET['id'];
        $usuario = $_SESSION['usuario'];
        $archivoUsuario = __DIR__ . "/usuarios/{$usuario}.json";

        if (file_exists($archivoUsuario)) {
            $datos = json_decode(file_get_contents($archivoUsuario), true);

            if (isset($datos['tareas']) && isset($datos['tareas'][$id])) {
                // Eliminar tarea
                array_splice($datos['tareas'], $id, 1);

                // Guardar archivo
                file_put_contents($archivoUsuario, json_encode($datos, JSON_PRETTY_PRINT));
            }
        }
    }

    header('Location: tareas.php');
    exit;
?>