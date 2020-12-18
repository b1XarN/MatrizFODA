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
    <title>Nueva Estrategia FO</title>
</head>
<body>
    <?php 
        $sqlF = "SELECT * FROM ELEMENTO where idEmpresa = $_GET[id] and tipoElemento='F'";
        $sqlO = "SELECT * FROM ELEMENTO where idEmpresa = $_GET[id] and tipoElemento='O'";

        $fortalezas = mysqli_query($con, $sqlF);
        $oportunidades = mysqli_query($con, $sqlO);
    ?>
    <div class="container">
        <div class="row">
            <div class="col" style="text-align:center">
                <h2>Nueva Estrategia FO</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form action="registro_FO.php?id=<?=$_GET['id']?>" method="POST">
                    <div class="row my-3 align-items-center" style="text-align: center">
                        <?php 
                            if(mysqli_num_rows($fortalezas) >= 1 && mysqli_num_rows($oportunidades) >= 1){
                                echo '<div class="col-6" >';
                                while($fortaleza = mysqli_fetch_assoc($fortalezas)):
                                ?>
                                    
                                        <input type="checkbox" name="fortalezas[]" value="<?=$fortaleza['idElemento']?>"> F<?=$fortaleza['idElemento']?>: <?=$fortaleza['descElemento']?><br>
                                    
                                <?php  
                                    endwhile;
                                echo '</div>';

                                echo '<div class="col-6" >';
                                while($oportunidad = mysqli_fetch_assoc($oportunidades)):  
                                    ?>
                                        <input type="checkbox" name="oportunidades[]" value="<?=$oportunidad['idElemento']?>"> O<?=$oportunidad['idElemento']?>: <?=$oportunidad['descElemento']?><br> 
                                <?php 
                                    endwhile;
                                echo '</div>';

                            }
                            else{
                                echo '<p> Deben de haber minimo una fortaleza o una oportunidad</p>';
                            }
                        ?>
                        <div class="col-12">
                            <label for="" class="mt-3">Estrategia</label><br>
                            <input type="text" name="estrategiaFO" required="required" class="campos-edit-matriz"><br>
                        </div>
                        <div class="col-12">
                            <input type="submit" name="submitGuardar" value="Guardar Estrategia" class="btn btn-primary mt-3">
                            <a href="editar_matriz.php?id=<?=$_GET['id']?>" class="btn btn-danger mt-3">Salir</a>
                        </div>
                    </div>
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