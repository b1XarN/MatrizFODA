<?php 
    require_once '../conexion.php';
    
    if(is_numeric($_GET['id'])){
        $sqlE = "DELETE FROM EMPRESA WHERE idEmpresa = $_GET[id]";

        $eliminarE = mysqli_query($con, $sqlE);

        // $empresa = mysqli_fetch_assoc($empresas);
    }else{
        $sqlU = "DELETE FROM USUARIO WHERE loginU = '$_GET[id]'";

        $eliminarU = mysqli_query($con,$sqlU);
    }

?>