<?php
    require_once 'conexion.php';

    if(isset($_POST['debilidades']) && isset($_POST['amenazas']) && isset($_POST['submitGuardar'])){
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


        $numDebilidades = count($_POST['debilidades']);
        $numAmenazas = count($_POST['amenazas']);
        $estrategia = $_POST['estrategiaDA'];

        $empresa = $_GET['id'];

        $sql = "INSERT INTO ESTRATEGIA VALUES(null, $empresa, 'DA', '$estrategia')";
        $guardarEstrategia = mysqli_query($con, $sql);



        $sql1 = "SELECT * FROM ESTRATEGIA WHERE idEmpresa = $_GET[id] AND tipoEstrategia = 'DA' AND descEstrat = '$estrategia'";
        $idEstrategias = mysqli_query($con, $sql1);
        $idEstrategia = mysqli_fetch_assoc($idEstrategias);
        $idE = $idEstrategia['idEstrategia'];



        for($i = 0; $i < $numDebilidades; $i++ ){
            $debilidad = $_POST['debilidades'][$i];
            $sqlD = "INSERT INTO DETALLE_ESTRATEGIA VALUES($idE, $empresa, $debilidad)";
            $guardarD = mysqli_query($con,$sqlD);
        }


        for($i = 0; $i < $numAmenazas; $i++ ){

            $amenaza = $_POST['amenazas'][$i];
            $sqlA = "INSERT INTO DETALLE_ESTRATEGIA VALUES($idE, $empresa, $amenaza)";
            $guardarA = mysqli_query($con,$sqlA);
        }

        header('Location: nuevo_DA.php?id='.$_GET['id']);





    }
    else{
        echo 'Seleccione MINIMO una debilidad o una amenaza';
    }




?>