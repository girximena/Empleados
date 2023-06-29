<?php
include_once '../controllers/Empleados.control.php';

// Verificar si se ha proporcionado un ID de producto válido
if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];

    // Crear una instancia de la clase ProductoControl
    $empleado_obj = new EmpleadoControl();
    // Obtener el objeto del producto seleccionado
    $empleado = $empleado_obj->select_empleado($ID);
} else {
    // Redireccionar a la página principal si no se proporciona un ID válido
    header('Location: list_empleados.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los valores del formulario
    $ID = $_POST['ID'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Cargo= $_POST['Cargo'];

    // Crea una instancia del controlador
    $controlador = new EmpleadoControl();

    // Llama a la función editar_producto para actualizar los datos del producto
    $controlador->editar_empleado($ID, $Nombre, $Apellido, $Cargo);

    // Redirecciona a la página de lista de productos o a donde desees
    header('Location: list_empleados.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="bg-primary">
    <div class="container">
        <h1 class="text-light">Editar Empleados</h1>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label text-light">ID:</label>
                <input type="text" name="ID" class="form-control" value="<?php echo $empleado->getID(); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">Nombre:</label>
                <input type="text" name="Nombre" class="form-control" value="<?php echo $empleado->getNombre(); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">Apellido:</label>
                <input type="text" name="Apellido" class="form-control" value="<?php echo $empleado->getApellido(); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">Cargo:</label>
                <input type="text" name="Cargo" class="form-control" value="<?php echo $empleado->getCargo(); ?>" required>
            </div>
            <button type="submit" class="btn btn-secondary">Actualizar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
