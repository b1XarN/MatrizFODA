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
    <title>Vista de Empresas</title>
</head>
<body>
    <?php 
        $sql1 = "SELECT * FROM EMPRESA where idEmpresa = $_GET[id]";
        $sqlF = "SELECT * FROM ELEMENTO where idEmpresa = $_GET[id] and tipoElemento='F'";
        $sqlO = "SELECT * FROM ELEMENTO where idEmpresa = $_GET[id] and tipoElemento='O'";
        $sqlD = "SELECT * FROM ELEMENTO where idEmpresa = $_GET[id] and tipoElemento='D'";
        $sqlA = "SELECT * FROM ELEMENTO where idEmpresa = $_GET[id] and tipoElemento='A'";
        $sqlFO = "SELECT * FROM ESTRATEGIA where idEmpresa = $_GET[id] and tipoEstrategia='FO'";
        $sqlFA = "SELECT * FROM ESTRATEGIA where idEmpresa = $_GET[id] and tipoEstrategia='FA'";
        $sqlDO = "SELECT * FROM ESTRATEGIA where idEmpresa = $_GET[id] and tipoEstrategia='DO'";
        $sqlDA = "SELECT * FROM ESTRATEGIA where idEmpresa = $_GET[id] and tipoEstrategia='DA'";
        


        $empresas = mysqli_query($con, $sql1);
        $fortalezas = mysqli_query($con, $sqlF);
        $oportunidades = mysqli_query($con, $sqlO);
        $debilidades = mysqli_query($con, $sqlD);
        $amenazas = mysqli_query($con, $sqlA);
        $estrategiasFO = mysqli_query($con, $sqlFO);
        $estrategiasFA = mysqli_query($con, $sqlFA);
        $estrategiasDO = mysqli_query($con, $sqlDO);
        $estrategiasDA = mysqli_query($con, $sqlDA);
        

        $empresa = mysqli_fetch_assoc($empresas);

    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 style="text-align:center"><?=$empresa['nombreEmpresa']?></h2>
            </div>
            <div class="col-12">
                <h3>Mision</h3>
                <p><?=$empresa['mision']?></p>
                <h3>Vision</h3>
                <p><?=$empresa['vision']?></p>
                <h3>Propuesta de Valor</h3>
                <p><?=$empresa['propuestaValor']?></p>
                <h3>Factor diferenciador</h3>
                <p><?=$empresa['factorDiferenciador']?></p>
                <h3>Objetivos Estrategicos</h3>
                <p><?=$empresa['objetivo']?></p>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-12">
                <a href="editar_datos.php?id=<?=$_GET['id']?>" class="btn btn-success">Editar Datos</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered" id="tablaFODA">
                    <tr>
                        <td>
                            <h2>MATRIZ FODA</h2>
                            <h2 style="text-align:center; color:red;"><?=$empresa['nombreEmpresa']?></h2>
                        </td>
                        <td>
                            <h4>Oportunidades</h4>
                            <?php
                            if(mysqli_num_rows($oportunidades) >=1){
                            ?>
                                <ul>
                                <?php 
                                while($oportunidad = mysqli_fetch_assoc($oportunidades)):
                            
                            ?>
                                <li><?=$oportunidad['descElemento']?> (O<?=$oportunidad['idElemento']?>)</li>
                            <?php 
                                endwhile;
                                ?>
                                </ul>
                                <?php 
                            }
                            else{
                                echo '<p>No hay Oportunidades</p';
                            }
                             ?>
                        </td>
                        <td>
                            <h4>Amenazas</h4>
                            <?php
                            if(mysqli_num_rows($amenazas) >=1){
                            ?>
                                <ul>
                                <?php 
                                while($amenaza = mysqli_fetch_assoc($amenazas)):
                            
                            ?>
                                <li><?=$amenaza['descElemento']?> (A<?=$amenaza['idElemento']?>)</li>
                            <?php 
                                endwhile;
                                ?>
                                </ul>
                                <?php 
                            }
                            else{
                                echo '<p>No hay Amenazas</p';
                            }
                             ?> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Fortalezas</h4>
                            <?php
                            if(mysqli_num_rows($fortalezas) >=1){
                            ?>
                                <ul>
                                <?php 
                                while($fortaleza = mysqli_fetch_assoc($fortalezas)):
                            
                            ?>
                                <li><?=$fortaleza['descElemento']?> (F<?=$fortaleza['idElemento']?>)</li>
                            <?php 
                                endwhile;
                                ?>
                                </ul>
                                <?php 
                            }
                            else{
                                echo '<p>No hay Fortalezas</p';
                            }
                             ?>
                        </td>
                        <td>
                            <h4>Estrategias FO</h4>
                            <?php
                                if(mysqli_num_rows($estrategiasFO) >= 1){
                                    ?>
                                    <ul>
                                    <?php  
                                        while($estrategiaFO = mysqli_fetch_assoc($estrategiasFO)):
                                            $est = $estrategiaFO['idEstrategia'];
                                            $sqlClave = "SELECT * FROM DETALLE_ESTRATEGIA WHERE idEmpresa = $_GET[id] and idEstrategia = $est";
                                            $Links = mysqli_query($con, $sqlClave);
                                    ?>
                                        <li><?=$estrategiaFO['descEstrat']?> 
                                            (<?php
                                                while($Link = mysqli_fetch_assoc($Links)):
                                                    echo $Link['idElemento'].',';
                                                endwhile;
                                            ?>)
                                        </li>
                                    <?php 
                                        endwhile;
                                        ?>
                                    </ul>
                                    <?php 
                                } 
                                else{
                                    echo '<p>No hay estrategias</p>';
                                }
                                ?>
                        </td>
                        <td>
                            <h4>Estrategias FA</h4> 
                            <?php
                                if(mysqli_num_rows($estrategiasFA) >= 1){
                                    ?>
                                    <ul>
                                    <?php  
                                        while($estrategiaFA = mysqli_fetch_assoc($estrategiasFA)):
                                            $est = $estrategiaFA['idEstrategia'];
                                            $sqlClave = "SELECT * FROM DETALLE_ESTRATEGIA WHERE idEmpresa = $_GET[id] and idEstrategia = $est";
                                            $Links = mysqli_query($con, $sqlClave);
                                    ?>
                                        <li><?=$estrategiaFA['descEstrat']?>
                                            (<?php
                                                while($Link = mysqli_fetch_assoc($Links)):
                                                    echo $Link['idElemento'].',';
                                                endwhile;
                                            ?>)
                                        </li>
                                    <?php 
                                        endwhile;
                                        ?>
                                    </ul>
                                    <?php 
                                } 
                                else{
                                    echo '<p>No hay estrategias</p>';
                                }
                                ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Debilidades</h4>
                            <?php
                            if(mysqli_num_rows($debilidades) >=1){
                            ?>
                                <ul>
                                <?php 
                                while($debilidad = mysqli_fetch_assoc($debilidades)):
                            
                            ?>
                                <li><?=$debilidad['descElemento']?> (D<?=$debilidad['idElemento']?>)</li>
                            <?php 
                                endwhile;
                                ?>
                                </ul>
                                <?php 
                            }
                            else{
                                echo '<p>No hay Debilidades</p';
                            }
                             ?>
                        </td>
                        <td>
                            <h4>Estrategias DO</h4>
                            <?php
                                if(mysqli_num_rows($estrategiasDO) >= 1){
                                    ?>
                                    <ul>
                                    <?php  
                                        while($estrategiaDO = mysqli_fetch_assoc($estrategiasDO)):
                                            $est = $estrategiaDO['idEstrategia'];
                                            $sqlClave = "SELECT * FROM DETALLE_ESTRATEGIA WHERE idEmpresa = $_GET[id] and idEstrategia = $est";
                                            $Links = mysqli_query($con, $sqlClave);
                                    ?>
                                        <li><?=$estrategiaDO['descEstrat']?>
                                            (<?php
                                                while($Link = mysqli_fetch_assoc($Links)):
                                                    echo $Link['idElemento'].',';
                                                endwhile;
                                            ?>)
                                        </li>
                                    <?php 
                                        endwhile;
                                        ?>
                                    </ul>
                                    <?php 
                                } 
                                else{
                                    echo '<p>No hay estrategias</p>';
                                }
                                ?>
                        </td>
                        <td>
                            <h4>Estrategias DA</h4> 
                            <?php
                                if(mysqli_num_rows($estrategiasDA) >= 1){
                                    ?>
                                    <ul>
                                    <?php  
                                        while($estrategiaDA = mysqli_fetch_assoc($estrategiasDA)):
                                            $est = $estrategiaDA['idEstrategia'];
                                            $sqlClave = "SELECT * FROM DETALLE_ESTRATEGIA WHERE idEmpresa = $_GET[id] and idEstrategia = $est";
                                            $Links = mysqli_query($con, $sqlClave);
                                    ?>
                                        <li><?=$estrategiaDA['descEstrat']?>
                                            (<?php
                                                while($Link = mysqli_fetch_assoc($Links)):
                                                    echo $Link['idElemento'].',';
                                                endwhile;
                                            ?>)
                                        </li>
                                    <?php 
                                        endwhile;
                                        ?>
                                    </ul>
                                    <?php 
                                } 
                                else{
                                    echo '<p>No hay estrategias</p>';
                                }
                                ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row justify-content-between">
            <div class="col-4">
                <button class="btn btn-danger" id="pdf">Exportar a PDF</button>
                <button class="btn btn-primary" id="word">Exportar a Word</button>
            </div>
            <div class="col-4">
                <a href="editar_matriz.php?id=<?=$_GET['id']?>" class="btn btn-success">Editar Matriz</a>
            </div>
        </div>

        <div class="row justify-content-end mt-2">
            <div class="col-4">
                <a href="menu.php" class="btn btn-warning">Regresar</a>
            </div>
        </div>
        
    </div>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript" src="js/tableExport.js"></script>
    <script type="text/javascript" src="js/jquery.base64.js"></script>
    <script type="text/javascript" src="js/exportarWord.js"></script>
    <script type="text/javascript" src="js/exportarPDF.js"></script>
</body>
</html>