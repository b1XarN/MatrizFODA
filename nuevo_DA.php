<?php 
    require_once 'conexion.php';
    if(isset($_SESSION['usuario']) && isset($_GET['id'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>Nueva Estrategia DA</title>
</head>
<body>
    <?php 
        $sqlD = "SELECT * FROM ELEMENTO where idEmpresa = $_GET[id] and tipoElemento='D'";
        $sqlA = "SELECT * FROM ELEMENTO where idEmpresa = $_GET[id] and tipoElemento='A'";

        $debilidades = mysqli_query($con, $sqlD);
        $amenazas = mysqli_query($con, $sqlA);
    ?>
    <div class="container">
        <div class="row">
            <div class="col" style="text-align:center">
                <h2>Nueva Estrategia DA</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form action="registro_DA.php?id=<?=$_GET['id']?>" method="POST">
                    <?php 
                        if(mysqli_num_rows($debilidades) >= 1 && mysqli_num_rows($amenazas) >= 1){
                            while($debilidad = mysqli_fetch_assoc($debilidades)):
                            ?>
                                D<?=$debilidad['idElemento']?>: <?=$debilidad['descElemento']?>  <input type="checkbox" name="debilidades[]" value="<?=$debilidad['idElemento']?>"><br>
                            <?php  
                                endwhile;

                            while($amenaza = mysqli_fetch_assoc($amenazas)):  
                                ?>
                                O<?=$amenaza['idElemento']?>: <?=$amenaza['descElemento']?>  <input type="checkbox" name="amenazas[]" value="<?=$amenaza['idElemento']?>"><br> 
                            <?php 
                                endwhile;
                        }
                        else{
                            echo '<p> Deben de haber minimo una debilidad o una amenaza</p>';
                        }
                    ?>
                    <label for="" class="mt-3">Estrategia</label><br>
                    <input type="text" name="estrategiaDA" required="required" class="campos-edit-matriz"><br>
                    <input type="submit" name="submitGuardar" value="Guardar Estrategia" class="btn btn-primary mt-3">
                    <a href="editar_matriz.php?id=<?=$_GET['id']?>" class="btn btn-danger mt-3">Salir</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
<?php
}else{
    header('Location: error_page.php');
} 
?>