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
    <title>Editar Matriz</title>
</head>
<body>
    <?php 
        $sql = "SELECT * FROM EMPRESA where idEmpresa = $_GET[id]";

        $empresas = mysqli_query($con, $sql);

        $empresa = mysqli_fetch_assoc($empresas);
    ?>
    <div class="container">
        <div class="row">
            <div class="col" style="text-align:center">
                <h2>Editar Matriz: <?=$empresa['nombreEmpresa']?></h2>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <form action="registros/registro_F.php?id=<?=$empresa['idEmpresa']?>" method="POST">
                    <label for="">Fortaleza</label><br>
                    <input type="text" name="fortaleza" class="campos-edit-matriz" required="required">
                    <input type="submit" name="submitF" value="Guardar" class="btn btn-primary">
                </form>
            </div>
            <div class="col-12">
                <form action="registros/registro_O.php?id=<?=$empresa['idEmpresa']?>" method="POST">
                    <label for="">Oportunidad</label><br>
                    <input type="text" name="oportunidad" class="campos-edit-matriz" required="required">
                    <input type="submit" name="submitO" value="Guardar" class="btn btn-primary">
                </form>
            </div>
            <div class="col-12">
                <form action="registros/registro_D.php?id=<?=$empresa['idEmpresa']?>" method="POST">
                    <label for="">Debilidad</label><br>
                    <input type="text" name="debilidad" class="campos-edit-matriz" required="required">
                    <input type="submit" name="submitD" value="Guardar" class="btn btn-primary">
                </form>
            </div>
            <div class="col-12">
                <form action="registros/registro_A.php?id=<?=$empresa['idEmpresa']?>" method="POST">
                    <label for="">Amenaza</label><br>
                    <input type="text" name="amenaza" class="campos-edit-matriz" required="required">
                    <input type="submit" name="submitA" value="Guardar" class="btn btn-primary">
                </form>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <a href="nuevo_FO.php?id=<?=$_GET['id']?>" class="btn btn-info">Agregar Estrategia FO</a>
            </div>
            <div class="col">
                <a href="nuevo_FA.php?id=<?=$_GET['id']?>" class="btn btn-secondary">Agregar Estrategia FA</a>
            </div>
            <div class="col">
                <a href="nuevo_DO.php?id=<?=$_GET['id']?>" class="btn btn-warning">Agregar Estrategia DO</a>
            </div>
            <div class="col">
                <a href="nuevo_DA.php?id=<?=$_GET['id']?>" class="btn btn-success">Agregar Estrategia DA</a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <a href="empresa.php?id=<?=$_GET['id']?>" class="btn btn-danger">Salir</a>
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