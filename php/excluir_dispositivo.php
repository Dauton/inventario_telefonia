<?php

    require "conexao_bd.php";
    require "src/Dispositivo.php";


// EXCLUI DISPOSITIVO...
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dispositivo = new Dispositivo($mysql);
        $dispositivo->excluiDispositivo($_POST['id']);

        header("Refresh: 1 ../consulta.php");
    }
//_________________________________________________

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluindo o dispositivo</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            width: 100%;
            height: 100%;
            position: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .loading {
            width: 50px;
            height: 50px;
            border: 9px solid #0088ff;
            border-top-color: transparent;
            border-radius: 100%;
            animation: loading linear 1s infinite;
        }
        @keyframes loading {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>
    <div class="loading"></div>
</body>
</html>