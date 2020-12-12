<?php 
    require_once 'conexion.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>Editar Empresa</title>
</head>
<body>
    <?php 
        $sql = "SELECT * FROM EMPRESA WHERE idEmpresa= $_GET[id]";

        $empresas = mysqli_query($con,$sql);

        $empresa = mysqli_fetch_assoc($empresas);

    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 style="text-align:center"><?=$empresa['nombreEmpresa']?></h2>
            </div>
            <div class="col-8">
                <div class="">
                    <form action="edicion.php" method="POST">
                        <label for="">Nombre</label><br>
                        <input type="text"><br>
                        <label for="">RUC</label><br>
                        <input type="text"><br>
                        <label for="">Mision</label><br>
                        <textarea name="mision" id="" cols="30" rows="5"></textarea><br>
                        <label for="">Vision</label><br>
                        <textarea name="vision" id="" cols="30" rows="5"></textarea><br>
                        <label for="">Propuesta de valor</label><br>
                        <textarea name="valor" id="" cols="30" rows="5"></textarea><br>
                        <label for="">Factor diferenciador</label><br>
                        <textarea name="factor" id="" cols="30" rows="5"></textarea><br>
                        <label for="">Objetivos Estrategicos</label><br>
                        <textarea name="objetivos" id="" cols="30" rows="5"></textarea><br>
                        <input type="submit" value="Guardar" class="btn btn-primary">
                        <a href="empresa.php?id=<?=$_GET['id']?>" class="btn btn-danger">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>       
    </div>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>