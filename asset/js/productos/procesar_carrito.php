<?php

// SDK do Mercado Pago
require __DIR__ .  '../../../../vendor/autoload.php';
// Agregar credenciales
MercadoPago\SDK::setAccessToken('TEST-5580397747659499-021513-458b7456a7c3cd5b9052b6ab6037d42c-816155931');

// Recibe los datos del carrito de compras enviados por la solicitud AJAX
$data = json_decode(file_get_contents('php://input'), true);

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

$items = [];

// Crea los objetos Item de Mercado Pago a partir de los datos del carrito de compras
foreach ($data['shoppingCart'] as $item) {
    $mpItem = new MercadoPago\Item();
    $mpItem->id = 'producto_' . $item['id'];
    $mpItem->title = $item['titulo'];
    $mpItem->quantity = $item['quantity'];
    $mpItem->unit_price = $item['precio_descuento'];
    $mpItem->currency_id = "MXN";
    $items[] = $mpItem;
}

$preference->items = $items;

// url al terminar el pago
$preference->back_urls = array(
    "success" => "http://productos.philidor.mx/captura.php",
    "failure" => "http://productos.philidor.mx/fallo.php"
);

$preference->auto_return = "approved"; //retorna cuando sea aprovado 
// nos ayuda para que solo puedan obtener transacciones aprovadas o canceladas por 
// que hay un 3 estado que es pendiente 
$preference->binary_mode = true; 

$preference->save();

// Retorna la respuesta al cliente (por ejemplo, el ID de la preferencia)
echo $preference->id;

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