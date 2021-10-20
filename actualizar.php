<?php 
    include('conexion.php');
    
    if (isset($_GET['idMascota'])) {
        $id = $_GET['idMascota'];
        $query = "SELECT * FROM mascota WHERE idMascota = $id";
        $resultado = mysqli_query($conn,$query);
        if(mysqli_num_rows($resultado)==1){
            $row = mysqli_fetch_array($resultado);
            $nombre = $row['nombre'];
            $especie = $row['especie'];
            $nombreDueno = $row['nombreDueno'];
            $telefonoDueno = $row['telefonoDueno'];
        }
    }

    if(isset($_POST['actualizar'])){
        $id = $_GET['idMascota'];
        $nombre = $_POST['nombreMascota'];
        $especie = $_POST['especie'];
        $nombreDueno = $_POST['nombreDueno'];
        $telefonoDueno = $_POST['telefonoDueno'];


        $query = "UPDATE mascota set nombre='$nombre', especie ='$especie', nombreDueno='$nombreDueno', telefonoDueno='$telefonoDueno' WHERE idMascota = $id";
        mysqli_query($conn,$query);
        $_SESSION['mensaje']="Datos actualizados correctamente";
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Document</title>

</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <id class="container">
            <a href="index.php" class="navbar-brand">Inicio</a>
        </id>
    </nav>

    <form class="container p-3 m-3" action="actualizar.php?idMascota=<?php echo $_GET['idMascota'];?>" method="post">
        <input type="text" class="form-control" name="nombreMascota" placeholder="¿Cómo se llama tu mascota?"><br>
        <input type="text" class="form-control" name="especie" placeholder="Mi mascota es un"><br>
        <input type="text" class="form-control" name="nombreDueno" placeholder="Propietario"><br>
        <input type="text" class="form-control" name="telefonoDueno" placeholder="Mi telefono es"><br>
        <input type="submit" class="btn btn-primary" name="actualizar" value="Actualizar">
    </form>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
</body>
</html>