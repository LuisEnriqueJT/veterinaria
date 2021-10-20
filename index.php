<?php include('conexion.php');?>

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

    <?php if(isset($_SESSION['mensaje'])){?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['mensaje'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php session_unset();} ?>


    <form class="container p-3 m-3" action="insertar.php" method="post">
        <input type="text" class="form-control" name="nombreMascota" placeholder="¿Cómo se llama tu mascota?"><br>
        <input type="text" class="form-control" name="especie" placeholder="Mi mascota es un"><br>
        <input type="text" class="form-control" name="nombreDueno" placeholder="Propietario"><br>
        <input type="text" class="form-control" name="telefonoDueno" placeholder="Mi telefono es"><br>
        <input type="submit" class="btn btn-primary" name="insertar" value="Agregar">
    </form>


    <table class="container table table-stripped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Especie</th>
                <th>Propietario</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
            <tbody>
                <?php 
                
                    $query = "SELECT *FROM mascota";
                    $consulta = mysqli_query($conn,$query);

                    while($row= mysqli_fetch_array($consulta)){ ?>

                    <tr>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['especie'] ?></td>
                        <td><?php echo $row['nombreDueno'] ?></td>
                        <td><?php echo $row['telefonoDueno']?></td>
                        <td>
                            <a class="btn btn-secondary" href="actualizar.php?idMascota=<?php echo $row['idMascota']?>">Actualizar</a>
                            <a class="btn btn-danger" href="eliminar.php?idMascota=<?php echo $row['idMascota']?>">Eliminar</a>
                        </td>                    
                    </tr>


                <?php } ?>
            </tbody>
        </thead>
    </table>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
</body>
</html>