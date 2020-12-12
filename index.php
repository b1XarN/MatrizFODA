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
    <title>FODA</title>
</head>
<body>
    <div class="container">
        <div class="row contenedor-inic">
            <div class="col-12 ">
                <form action="login.php" method="POST" enctype="multipart/form-data" class="formulario">
                    <label for="" class="titulo-form">Iniciar Sesion</label><br>
                    <input type="text" name="usuario" required="required" placeholder="Usuario" class="campos-inic"><br>
                    <input type="password" name="contra" required="required" placeholder="Contraseña" class="campos-inic"><br>
                    <input type="submit" name="submitIngresar" value="Ingresar" class="submit-inic">
                </form>
            </div>
            <?php if(isset($_SESSION['error_login'])){?>
            <div class="col-12">
                <p style="color: red; text-align: center"><?=$_SESSION['error_login']?></p>    
            </div>
            <?php
            } 
            ?>
            <!-- <a href="menu.php">nbqwuidnjkqwndijowq</a> -->
        </div>    
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>