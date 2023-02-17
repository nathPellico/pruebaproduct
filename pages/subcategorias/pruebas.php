<?php


// $jsonString = file_get_contents('php://input');
$jsonString = file_get_contents('php://input');

if (isset($jsonString)) {
    $myArray = json_decode($jsonString, true);

    foreach ($myArray as $obj) {
        echo "ID: ".$obj['id']."<br>";
        echo "Nombre: ".$obj['nombre']."<br>";
        echo "Apellido: ".$obj['apellido']."<br>";
    }
} else {
    echo "No se recibieron datos.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="../../asset/js/productos/datos.js"></script>
</head>
<body>
<div id="resultados"></div>
</body>
</html>



