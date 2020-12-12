<?php
    require_once 'conexion.php';

    if(isset($_POST['fortalezas']) && isset($_POST['oportunidades']) && isset($_POST['submitGuardar'])){
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
        $numOportunidades = count($_POST['oportunidades']);
        $estrategia = $_POST['estrategiaFO'];

        $empresa = $_GET['id'];

        $sql = "INSERT INTO ESTRATEGIA VALUES(null, $empresa, 'FO', '$estrategia')";
        $guardarEstrategia = mysqli_query($con, $sql);



        $sql1 = "SELECT * FROM ESTRATEGIA WHERE idEmpresa = $_GET[id] AND tipoEstrategia = 'FO' AND descEstrat = '$estrategia'";
        $idEstrategias = mysqli_query($con, $sql1);
        $idEstrategia = mysqli_fetch_assoc($idEstrategias);
        $idE = $idEstrategia['idEstrategia'];



        for($i = 0; $i < $numFortalezas; $i++ ){
            $fortaleza = $_POST['fortalezas'][$i];
            $sqlF = "INSERT INTO DETALLE_ESTRATEGIA VALUES($idE, $empresa, $fortaleza)";
            $guardarF = mysqli_query($con,$sqlF);
        }


        for($i = 0; $i < $numOportunidades; $i++ ){

            $oportunidad = $_POST['oportunidades'][$i];
            $sqlO = "INSERT INTO DETALLE_ESTRATEGIA VALUES($idE, $empresa, $oportunidad)";
            $guardarO = mysqli_query($con,$sqlO);
        }

        header('Location: nuevo_FO.php?id='.$_GET['id']);





    }
    else{
        echo 'Seleccione MINIMO una fortaleza o una oportunidad';
    }




?>