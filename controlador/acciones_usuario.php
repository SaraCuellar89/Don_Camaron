<?php
require_once "../controlador/usuario_controlador.php";

$controlador = new Usuario_controlador();
$accion = $_GET['accion'] ?? '';

switch ($accion) {
    case 'login':
        $controlador->validar_usuario();
        break;
    case 'cerrar':
        $controlador->cerrar_sesion();
        break;
    case 'registrar':
        $controlador->registrar_usuario();
        break;
    case 'listar':
        $controlador->obtener_usuarios();
        break;
    case 'eliminar':
        $controlador->eliminar_usuario();
        break;
    default:
        echo "Acción no válida.";
        break;
}
?>