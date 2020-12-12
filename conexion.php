<?php 
    $servidor = 'localhost';
    $usuario = 'root';
    $password = '';
    $base_datos = 'bdfoda';

    $con = mysqli_connect($servidor, $usuario, $password, $base_datos);
 
    session_start();


?>