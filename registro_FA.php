<?php
    require_once 'conexion.php';

    if(isset($_POST['fortalezas']) && isset($_POST['amenazas']) && isset($_POST['submitGuardar'])){
        // echo 'Todo chill<br>';
        // var_dump($_POST);
        // $variable = $_POST['fortalezas'][1];
        // $variable2 = (int)($variable);
        // var_dump($variable2);
        // var_dump($_GET['id']);

        // $numFortalezas = count($_POST['oportunidades']);
        // echo  'asdsadasdasdasdad'.$numFortalezas.'<br>';
        // echo  'uiqwdh9uiqwjhd9iwqj';



        // for($i = 0; $i < $numFortalezas; $i++ ){

        //     $fortaleza = $_POST['oportunidades'][$i];
        //     echo $fortaleza.'<br>';
        // }
        //--------------------------


        $numFortalezas = count($_POST['fortalezas']);
        $numAmenazas = count($_POST['amenazas']);
        $estrategia = $_POST['estrategiaFA'];

        $empresa = $_GET['id'];

        $sql = "INSERT INTO ESTRATEGIA VALUES(null, $empresa, 'FA', '$estrategia')";
        $guardarEstrategia = mysqli_query($con, $sql);



        $sql1 = "SELECT * FROM ESTRATEGIA WHERE idEmpresa = $_GET[id] AND tipoEstrategia = 'FA' AND descEstrat = '$estrategia'";
        $idEstrategias = mysqli_query($con, $sql1);
        $idEstrategia = mysqli_fetch_assoc($idEstrategias);
        $idE = $idEstrategia['idEstrategia'];



        for($i = 0; $i < $numFortalezas; $i++ ){
            $fortaleza = $_POST['fortalezas'][$i];
            $sqlF = "INSERT INTO DETALLE_ESTRATEGIA VALUES($idE, $empresa, $fortaleza)";
            $guardarF = mysqli_query($con,$sqlF);
        }


        for($i = 0; $i < $numAmenazas; $i++ ){

            $amenaza = $_POST['amenazas'][$i];
            $sqlA = "INSERT INTO DETALLE_ESTRATEGIA VALUES($idE, $empresa, $amenaza)";
            $guardarA = mysqli_query($con,$sqlA);
        }

        header('Location: nuevo_FA.php?id='.$_GET['id']);





    }
    else{
        echo 'Seleccione MINIMO una fortaleza o una amenaza';
    }




?>