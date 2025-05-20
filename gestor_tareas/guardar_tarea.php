<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tarea']) && isset($_SESSION['usuario'])) {
        $nuevaTarea = trim($_POST['tarea']);
        $usuario = $_SESSION['usuario'];
        $archivoUsuario = __DIR__ . "/usuarios/{$usuario}.json";

        if ($nuevaTarea !== '' && file_exists($archivoUsuario)) {
            $datos = json_decode(file_get_contents($archivoUsuario), true);

            // Crear array de tareas si no existe
            if (!isset($datos['tareas'])) {
                $datos['tareas'] = [];
            }

            $datos['tareas'][] = ['texto' => $nuevaTarea];

            file_put_contents($archivoUsuario, json_encode($datos, JSON_PRETTY_PRINT));
        }
    }

    header('Location: tareas.php');
    exit;
?>