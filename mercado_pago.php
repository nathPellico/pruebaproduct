<?php


 // Recuperar el JSON del carrito de compras enviado por AJAX
 $shoppingCartJSON = $_POST['shoppingCart'];

 // Decodificar el JSON en un objeto PHP
 $shoppingCart = json_decode($shoppingCartJSON);

 // Hacer algo con los datos del carrito de compras
 // ...

 // Responder con una respuesta
 echo 'Datos recibidos';

// SDK do Mercado Pago
require __DIR__ .  '/vendor/autoload.php';
// Agregar credenciales
MercadoPago\SDK::setAccessToken('TEST-5580397747659499-021513-458b7456a7c3cd5b9052b6ab6037d42c-816155931');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->id = '0001';
$item->title = 'Mi producto';
$item->quantity = 1;
$item->unit_price = 75.56;
$item->currency_id = "MXN";

$preference->items = array($item);

// url al terminar el pago
$preference->back_urls = array(
    "success" => "http://localhost/philidor_productos/captura.php",
    "failure" => "http://localhost/philidor_productos/fallo.php"
);


$preference->auto_return = "approved"; //retorna cuando sea aprovado 
// nos ayuda para que solo puedan obtener transacciones aprovadas o canceladas por 
// que hay un 3 estado que es pendiente 
$preference->binary_mode = true; 

$preference->save();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- // SDK MercadoPago.js -->
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<body>
    <h3>Mercado Pago</h3>

    <div class="checkout-btn">

    </div>

    <script>
        const mp = new MercadoPago('TEST-7417afbb-007f-4609-89eb-9a0f1201b37f', {
            locale: 'es-MX'
        });

        mp.checkout({
            preference: {
            id: '<?php echo $preference->id ?>'
            },
            render: {
            container: '.checkout-btn',
            label: 'Pagar con MP',
            }
        });
    </script>
</body>
</html>