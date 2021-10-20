<?php

    include("conexion.php");

    if(isset($_GET['idMascota'])){
        $id = $_GET['idMascota'];
        $query = "DELETE FROM mascota WHERE idMascota = $id";
        $result = mysqli_query($conn,$query);

        if(!$result){
            die("Query failed");
        }

        $_SESSION['mensaje'] ='Registro eliminado correctamente';
        header("Location: index.php");
    }

?>