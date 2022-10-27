<?php include 'template/header.php' ?>
<?php echo '<link href="css/styles.css" type="text/css" rel="stylesheet">';?>
<?php
include_once "model/conexion.php";
$sentencia = $bd->query("select * from clientes");
$clientes = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-7">
            <?php include 'mensajes/mensajes.php' ?>
            <div class="card">
                <div class="card-header">
                    Lista de clientes
                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Dni</th>
                                <th scope="col">Celular</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($clientes as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->id; ?></td>
                                    <td><?php echo $dato->nombres; ?></td>
                                    <td><?php echo $dato->dni; ?></td>
                                    <td><?php echo $dato->celular; ?></td>
                                    <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a class="text-primary" href="agregarAlquiler.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-cursor"></i></a></td>
                                    <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Nombres: </label>
                        <input type="text" class="form-control" name="txtNombres" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dni: </label>
                        <input type="number" class="form-control" name="txtDni" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular: </label>
                        <input type="number" class="form-control" name="txtCelular" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>