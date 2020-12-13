<?php  
    require_once 'conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>Menu Principal</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4 side">
                <div>
                    <p>USUARIO 1</p>
                </div>
                <div>
                    <a href="" class="links-side">Mi Perfil</a>
                    <a href="menu.php" class="links-side">Empresas</a>
                    <a href="usuarios.php" class="links-side">Administrar Usuarios</a>
                    <a href="index.php" class="links-side">Salir</a>
                </div>
            </div>


            <div class="col-8 contenido">
                <h2>USUARIOS</h2>

                <form action="" method="POST">
                    <input type="text">
                    <input type="submit" value ="Buscar" class="btn btn-info">
                </form>

                <?php  
                    $sql = "SELECT * FROM USUARIO";

                    $usuarios = mysqli_query($con, $sql);

                    if(mysqli_num_rows($usuarios) >= 1){
                ?>
                    <?php 
                        while($usuario = mysqli_fetch_assoc($usuarios)):
                    ?>
                        <div class="row mt-3 p-2 justify-content-between empresas ">
                            <div class="col-4 ">
                                <p><?=$usuario['loginU']?></p>
                            </div>
                            <div class="col-4">
                                <a class="btn btn-primary" href="index.php">Ver</a>
                                <a class="btn btn-danger">Borrar</a>
                            </div>
                        </div>
                    <?php  
                        endwhile;
                    }else{
                        echo '<h2>NO hay usuarios</h2>';
                    }
                    ?>
                        <div class="row my-5">
                            <div class="col">
                                <a href="nuevo_usuario.php" class="btn btn-success">Nuevo Usuario</a>
                            </div>
                        </div>
            </div>


        </div>



    </div>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>