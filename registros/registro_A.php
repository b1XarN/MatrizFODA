<?php 
    require_once '../conexion.php';

    if(isset($_POST['submitA'])){

        $amenaza = isset($_POST['amenaza']) ? $_POST['amenaza'] : false;
        $empresa = $_GET['id'];
    
        $sql = "INSERT INTO ELEMENTO VALUES(null,$empresa,'A','$amenaza')";
        $guardar = mysqli_query($con, $sql);

        header('Location: ../editar_matriz.php?id='.$_GET['id']);
    }

?>
