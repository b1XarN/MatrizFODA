<?php 
    require_once '../conexion.php';

    if(isset($_POST['submitO'])){

        $oportunidad = isset($_POST['oportunidad']) ? $_POST['oportunidad'] : false;
        $empresa = $_GET['id'];
    
        $sql = "INSERT INTO ELEMENTO VALUES(null,$empresa,'O','$oportunidad')";
        $guardar = mysqli_query($con, $sql);

        header('Location: ../editar_matriz.php?id='.$_GET['id']);
    }

?>
