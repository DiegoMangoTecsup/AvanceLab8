<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $id = $_POST['codigo'];
    $nombres = $_POST['txtNombres'];
    $dni = $_POST['txtDni'];
    $celular = $_POST['txtCelular'];

    $sentencia = $bd->prepare("UPDATE clientes SET nombres = ?,dni = ?,celular = ? where id = ?;");
    $resultado = $sentencia->execute([$nombres, $dni, $celular,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
