<?php 
    require_once '../conexion.php';

    if(isset($_POST['submitD'])){

        $debilidad = isset($_POST['debilidad']) ? $_POST['debilidad'] : false;
        $empresa = $_GET['id'];
    
        $sql = "INSERT INTO ELEMENTO VALUES(null,$empresa,'D','$debilidad')";
        $guardar = mysqli_query($con, $sql);

        header('Location: ../editar_matriz.php?id='.$_GET['id']);
    }

?>
