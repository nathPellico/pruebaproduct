<?php

if(isset($_POST['shoppingCart'])) {
    $shoppingCartJSON = $_POST['shoppingCart'];
    $shoppingCartArray = json_decode($shoppingCartJSON, true);
    // Hacer lo que necesites con $shoppingCartArray

    // Devolver el arreglo $shoppingCartArray como JSON en la respuesta
    echo json_encode($shoppingCartArray);
  } else {
    echo "No se recibieron datos";
  }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $total = $_POST["total"];
//     $respuesta = "El total enviado desde AJAX es: " . $total;

//     echo json_encode($respuesta);
//     exit; // detener la ejecución del script
// }


// SDK do Mercado Pago
require __DIR__ .  '../../../vendor/autoload.php';
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
    "success" => "http://productos.philidor.mx/captura.php",
    "failure" => "http://productos.philidor.mx/fallo.php"
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
    <title>Videovigilancia</title>

    <!-- // SDK MercadoPago.js -->
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <!-- icons -->
    <link href="../../asset/img/icons/philsolar-icon.png" rel="shortcut icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../asset/css/bootstrap-icons.css">

    <!-- Style -->
    <link rel="stylesheet" href="../../asset/css/templatemo-kind-heart-charity.css">
    <link rel="stylesheet" href="../../asset/css/style.css">


</head>

<body id="section_1">

    <header class="site-header">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 d-flex flex-wrap">
                    <p class="d-flex me-4 mb-0">
                        <i class="bi-geo-alt me-2"></i>
                        C. 24 Pte. 3301, 72070 Puebla, Puebla
                    </p>

                    <p class="d-flex mb-0">
                        <i class="bi-envelope me-2"></i>

                        <a href="mailto:ventas@philidormexico.com">
                            ventas@philidormexico.com
                        </a>
                    </p>

                    <p class="d-flex  mb-0">
                        <i class="bi-telephone me-2 "></i>

                        <a href="tel:222-438-7232">
                            222-438-7232
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-12 ms-auto d-lg-block d-none">
                    <ul class="social-icon">
                        <li class="social-icon-item">
                            <a href="https://www.facebook.com/PhilidorMX" class="social-icon-link bi-facebook"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="https://www.instagram.com/philidormx/" class="social-icon-link bi-instagram"></a>
                        </li>

                        <!-- <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-youtube"></a>
                        </li> -->

                        <li class="social-icon-item">
                            <a href="https://api.whatsapp.com/send?phone=5212224387232&text=%C2%A1Hola!%0A%20Bienvenido%20a%20Phil-Solar%20%C2%BFEn%20qu%C3%A9%20podemos%20ayudarte%3F%0A" target="_blank" class="social-icon-link bi-whatsapp"></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg bg-light shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="../../index">
                <img src="../../asset/img/logo/phil-solar-logo.png" class="logo img-fluid" alt="Kind Heart Charity">
                <!-- <span>
                   Philidor México
                    <small>HACEMOS TU CONFORT SMART</small>
                </span> -->
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="https://philidor.mx/">Philidor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../../index">Inicio</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button">Productos</a>

                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li><a class="dropdown-item" href="../../pages/subcategorias/videovigilancia">Videovigilancia</a></li>

                            <li><a class="dropdown-item" href="../../pages/subcategorias/radiocomunicación">Radiocomunicación</a></li>

                            <li><a class="dropdown-item" href="../../pages/subcategorias/redes-audio">redes y Audio-Video</a></li>

                            <li><a class="dropdown-item" href="../../pages/subcategorias/iot-gps-telematica">IoT / GPS / Telemática y Señalización Audiovisual</a></li>

                            <li><a class="dropdown-item" href="../../pages/subcategorias/energia">Energía</a></li>

                            <li><a class="dropdown-item" href="../../pages/subcategorias/automatizacion">Automatización e Intrusión</a></li>

                            <li><a class="dropdown-item" href="../../pages/subcategorias/control-acceso">Control de Acceso</a></li>

                            <li><a class="dropdown-item" href="../../pages/subcategorias/detencion-fuego">Deteccion de Fuego</a></li>

                            <li><a class="dropdown-item" href="../../pages/subcategorias/cableado-estructurado">Cableado Estructurado </a></li>
                        </ul>
                    </li>

                    <li class="nav-item ms-3">
                        <a class="nav-link custom-btn custom-border-btn btn " href="../contacto">Contacto</a>
                    </li>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn bi bi-cart-plus-fill" style="font-size: 25px;" data-bs-toggle="modal" data-bs-target="#exampleModal">

                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">CART</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <section class="container content-section">
                                        <div class="cart-row">
                                            <span class="cart-item cart-header cart-column">ITEM</span>
                                            <span class="cart-price cart-header cart-column">PRICE</span>
                                            <span class="cart-quantity cart-header cart-column">QUANTITY</span>
                                        </div>
                                        <div class="cart-items">
                                            <!-- comentar desde aquí -->
                                            <!-- <div class="cart-row">
                                                <div class="cart-item cart-column">
                                                    <img class="cart-item-image" src="" width="100" height="100">
                                                    <span class="cart-item-title">Shirt</span>
                                                </div>
                                                <span class="cart-price cart-column">$19.99</span>
                                                <div class="cart-quantity cart-column">
                                                    <input class="cart-quantity-input" min="1" type="number" value="1">
                                                    <button class="btn btn-danger" type="button">REMOVE</button>
                                                </div>
                                            </div> -->
                                            <!-- hasta aquí -->
                                        </div>
                                        <div class="cart-total">
                                            <strong class="cart-total-title">Total</strong>
                                            <span class="cart-total-price"></span>
                                        </div>
                                        <button class="btn  btn-purchase" type="button"></button>
                                        <script>
                                            const mp = new MercadoPago('TEST-7417afbb-007f-4609-89eb-9a0f1201b37f', {
                                                locale: 'es-MX'
                                            });

                                            mp.checkout({
                                                preference: {
                                                    id: '<?php echo $preference->id; ?>'
                                                },
                                                render: {
                                                    container: '.btn-purchase',
                                                    label: 'Pagar',
                                                }
                                            });
                                        </script>
                                    </section>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Productos -->
    <section class="section-padding" id="section_3">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center mb-4">
                    <h2>Videovigilancia - Productos</h2>
                </div>

                <div class="row infoProductos" id="">

                </div>
            </div>
        </div>
    </section>

    <ul class="pagination justify-content-center" id="pagination">

    </ul>

    <div id="resultado"></div>

    <?php require_once('../../includes/footer.php') ?>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <!-- JS-Bootstrap -->
    <script src="../../asset/js/jquery.min.js"></script>
    <script src="../../asset/js/bootstrap.min.js"></script>
    <script src="../../asset/js/jquery.sticky.js"></script>
    <!-- <script src="../../asset/js/click-scroll.js"></script> -->
    <!-- <script src="./asset/js/counter.js"></script>
    <script src="./asset/js/custom.js"></script> -->
    <!-- JS -->
    <script type="text/javascript" src="../../asset/js/app.js"></script>
    <script type="text/javascript" src="../../asset/js/productos/app-videovig.js"></script>
</body>

</html>