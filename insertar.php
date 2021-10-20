<?php

include('conexion.php');

if (isset($_POST['insertar'])) {
    //Se tienen que guardar en variables las respuestas

    $nombreMascota = $_POST['nombreMascota'];
    $especie = $_POST['especie'];
    $nombreDueno = $_POST['nombreDueno'];
    $telefonoDueno = $_POST['telefonoDueno'];

    $query = "INSERT INTO mascota(nombre,especie,nombreDueno,telefonoDueno) VALUES ('$nombreMascota','$especie','$nombreDueno','$telefonoDueno')";
    $resultado = mysqli_query($conn, $query);

    if(!$resultado){
        die("No se guardó");
    }

    $_SESSION['mensaje'] = 'Registro correcto.';
    header("Location: index.php");
}

?>