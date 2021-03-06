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
    <script src="https://kit.fontawesome.com/496cc02742.js" crossorigin="anonymous"></script>
    <title>Administrar Usuarios</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4 side">
                <div class="mt-2" style="text-align:center;padding: 15px 20px 0px 20px; color: #fff; font-size:25px;">
                    <i class="far fa-user" style="font-size:50px; margin-bottom:10px;"></i>
                    <p><?=$_SESSION['usuario']['loginU']?></p>
                </div>
                <div>
                    <a href="perfil.php" class="links-side">Mi Perfil</a>
                    <a href="menu.php" class="links-side">Empresas</a>
                    <?php 
                        if($_SESSION['usuario']['tipo'] == 'Administrador'){
                        ?>
                            <a href="usuarios.php" class="links-side">Administrar Usuarios</a>
                        <?php 
                        }
                    ?>
                    <a href="salir.php" class="links-side">Salir</a>
                </div>
            </div>


            <div class="col-8 contenido">
                <h2>Administrar Usuarios</h2>
                <hr>
                
                <form action="buscarU.php" method="POST" style="display: flex; flex-direction: row; justify-content: flex-end;">
                    <input type="text" name="usuarioBuscar">
                    <input type="submit" name="submitBuscar" value ="Buscar" class="btn btn-info">
                </form>

                <?php  
                    $sql = "SELECT * FROM USUARIO where loginU like '%$_POST[usuarioBuscar]%'";

                    $usuarios = mysqli_query($con, $sql);

                    if(mysqli_num_rows($usuarios) >= 1){
                ?>
                    <?php 
                        while($usuario = mysqli_fetch_assoc($usuarios)):
                    ?>
                        <div class="row mt-3 p-2 justify-content-between mx-4 empresas" style="width: 90%;">
                            <div class="col-6">
                                <p style="font-size:20px; margin: 5px 0px;"><?=$usuario['loginU']?></p>
                            </div>
                            <div class="col-6" style="text-align:right">
                                <a class="btn btn btn-primary mx-3 px-3" href="index.php">Editar</a>
                                <?php 
                                    if($usuario['loginU'] != $_SESSION['usuario']['loginU']){
                                    ?>
                                        <a href="eliminacion/eliminar_usuario.php?id=<?=$usuario['loginU']?>" class="btn btn-danger">Borrar</a>
                                        <?php  
                                    }
                                    else{
                                        
                                    }
                                ?>
                            </div>
                        </div>
                    <?php  
                        endwhile;
                    }else{
                        echo '<h3>NO hay usuarios con la busqueda: '.$_POST['usuarioBuscar'].'</h3>';
                    }
                    ?>
                        <div class="row my-5">
                            <div class="col" style="text-align: right">
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