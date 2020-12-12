<?php
    require_once 'conexion.php';

    if(isset($_POST['debilidades']) && isset($_POST['oportunidades']) && isset($_POST['submitGuardar'])){
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
        $numOportunidades = count($_POST['oportunidades']);
        $estrategia = $_POST['estrategiaDO'];

        $empresa = $_GET['id'];

        $sql = "INSERT INTO ESTRATEGIA VALUES(null, $empresa, 'DO', '$estrategia')";
        $guardarEstrategia = mysqli_query($con, $sql);



        $sql1 = "SELECT * FROM ESTRATEGIA WHERE idEmpresa = $_GET[id] AND tipoEstrategia = 'DO' AND descEstrat = '$estrategia'";
        $idEstrategias = mysqli_query($con, $sql1);
        $idEstrategia = mysqli_fetch_assoc($idEstrategias);
        $idE = $idEstrategia['idEstrategia'];



        for($i = 0; $i < $numDebilidades; $i++ ){
            $debilidad = $_POST['debilidades'][$i];
            $sqlD = "INSERT INTO DETALLE_ESTRATEGIA VALUES($idE, $empresa, $debilidad)";
            $guardarD = mysqli_query($con,$sqlD);
        }


        for($i = 0; $i < $numOportunidades; $i++ ){

            $oportunidad = $_POST['oportunidades'][$i];
            $sqlO = "INSERT INTO DETALLE_ESTRATEGIA VALUES($idE, $empresa, $oportunidad)";
            $guardarO = mysqli_query($con,$sqlO);
        }

        header('Location: nuevo_DO.php?id='.$_GET['id']);





    }
    else{
        echo 'Seleccione MINIMO una debilidad o una oportunidad';
    }




?>