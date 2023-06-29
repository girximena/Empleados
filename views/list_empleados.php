<?php
    include_once "../controllers/Empleados.control.php";
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
<body style="background-color:purple;">
    <form action="" method="GET">
    <?php
        // Se crea una instancia de la clase ProductoControl
        $empleado_obj = new EmpleadoControl();
        // Se llama al método que lista a todos los pacientes
        $empleado = $empleado_obj->list_empleado();
    ?>
    <div class="container">
       <center> <h1 class="text-light">Registro de Empleados</h1></center>
        <div class="row">
            <div class="col">
                <a class="btn btn-success btn-lg" href="agg_empleados.php" role="button">Insertar</a>
            </div>
        </div>
        <br>
        <div class="row text-light mb-2 text-center">
            <div class="col-1">ID</div>
            <div class="col-1">NOMBRE</div>
            <div class="col-1">APELLIDO</div>
            <div class="col-2">CARGO</div>
            <div class="col-2">ELECCIONES</div>
        </div>
        <?php foreach ($empleado as $item) {?>
        <div class="row text-light mb-2 text-center">
            <div class="col-1"><?php echo $item->ID; ?></div>
            <div class="col-1"><?php echo $item->Nombre; ?></div>
            <div class="col-1"><?php echo $item->Apellido; ?></div>
            <div class="col-2"><?php echo $item->Cargo; ?></div>
            <div class="col-1   ">
                <a class="btn btn-primary btn-lg text-light" href="ver_empleados.php?ID=<?php echo $item->ID; ?>" role="button">Ver</a>

            </div>
            <div class="col-1">
                <a class="btn btn-light btn-lg"
                href="edit_empleados.php?ID=<?php echo $item->ID; ?>" role="button">Editar</a>
            </div>
            <div class="col-1">
                <a class="btn btn-dark btn-lg" href="eliminar_empleado.php?ID=<?php echo $item->ID; ?>" role="button">Eliminar</a>
            </div>
        </div><br>
        <?php }?>
    </div>
    <br>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>
