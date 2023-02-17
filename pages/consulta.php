<?php
$host = "localhost";
$username = "u442331208_rfilidor";
$password = "Philidor$2023*";
$dbname = "u442331208_philidor_produ";

// Crear conexión
$conn = mysqli_connect($host, $username, $password, $dbname);

// Verificar conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

date_default_timezone_set('America/Santiago');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($conn, $_POST['first-name']);
    $apellido = mysqli_real_escape_string($conn, $_POST['last-name']);
    $telefono = mysqli_real_escape_string($conn, $_POST['tel']);
    $correo = mysqli_real_escape_string($conn, $_POST['email']);
    $mensaje = mysqli_real_escape_string($conn, $_POST['message']);
    date_default_timezone_set('America/Mexico_City');
    $fecha_creacion = date("Y-m-d H:i:s");

    $sql = "INSERT INTO registro_contacto (nombre, apellido, telefono, correo, mensaje, fecha_creacion)
    VALUES ('$nombre', '$apellido', '$telefono', '$correo', '$mensaje', '$fecha_creacion')";

    if (mysqli_query($conn, $sql)) {
         echo "<script>";
        echo "window.open('../pages/conexion/mensaje_enviado.php','_blank');";
        echo "</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
