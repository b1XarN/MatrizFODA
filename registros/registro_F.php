<?php 
    require_once '../conexion.php';

    if(isset($_POST['submitF'])){

        $fortaleza = isset($_POST['fortaleza']) ? $_POST['fortaleza'] : false;
        $empresa = $_GET['id'];
    
        $sql = "INSERT INTO ELEMENTO VALUES(null,$empresa,'F','$fortaleza')";
        $guardar = mysqli_query($con, $sql);

        header('Location: ../editar_matriz.php?id='.$_GET['id']);
    }

?>
