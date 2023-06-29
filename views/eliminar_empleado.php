<?php
include_once '../controllers/Empleados.control.php';
if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    $empleado_obj = new EmpleadoControl();
    // Obtener los datos del artículo para su edición
    $empleado = $empleado_obj->eliminar_empleado($ID); 

    header('Location: list_empleados.php');

    
} else {
    // Manejar el caso en que no se ha proporcionado un ID de artículo válido
    echo "ID de Empleado no especificado";
    
    exit;

    
}
?>