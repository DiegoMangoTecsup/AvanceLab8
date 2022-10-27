<?php
//print_r($_POST);
if (empty($_POST["txtAlquiler"]) || empty($_POST["txtDuracion"])) {
    header('Location: index.php');
    exit();
}

include_once 'model/conexion.php';
$alquiler = $_POST["txtAlquiler"];
$duracion = $_POST["txtDuracion"];
$codigo = $_POST["codigo"];


$sentencia = $bd->prepare("INSERT INTO alquiler(alquiler,duracion,id_clientes) VALUES (?,?,?);");
$resultado = $sentencia->execute([$alquiler,$duracion, $codigo ]);

if ($resultado === TRUE) {
    header('Location: agregarAlquiler.php?codigo='.$codigo);
} 
